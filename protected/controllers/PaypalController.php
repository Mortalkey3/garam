<?php

class PaypalController extends Controller
{
	public function actionCreatepayment($nota)
	{
		$session = new CHttpSession;
		$session->open();
		$modelOrder = OrOrder::model()->find('CONCAT(`invoice_prefix`, "-", `invoice_no`) = :nota AND email  = :email ', array(':nota'=>$nota, ':email'=>$session['login_member']['email']));

		if (is_null($modelOrder))
			throw new CHttpException(404,'The requested page does not exist.');

		$e=new ExpressCheckout;
		$products = array();
		$products[] = array(
			'NAME'=>'Payment for '.$nota,
			'AMOUNT'=>$modelOrder->total+$modelOrder->delivery_price,
			'QTY'=>1
		);
		// $e->setShippingInfo($shipping_address); // set Shipping info Optional
		$e->setCurrencyCode("AUD");//set Currency (USD,HKD,GBP,EUR,JPY,CAD,AUD)
		$e->setProducts($products); /* Set array of products*/
		// $e->setShippingCost($modelOrder->delivery_price);/* Set Shipping cost(Optional) */
		$e->returnURL=Yii::app()->createAbsoluteUrl("/paypal/return", array('nota'=>$nota));
		$e->cancelURL=Yii::app()->createAbsoluteUrl("/paypal/cancel", array('nota'=>$nota));
		$result=$e->requestPayment(); 
        if(strtoupper($result["ACK"])=="SUCCESS")
		{
			$modelOrder->token = $result['TOKEN'];
			$modelOrder->save(false);
			/*redirect to the paypal gateway with the given token */
			header("location:".$e->PAYPAL_URL.$result["TOKEN"]);
		} 

	}

	public function actionPay()
	{
		$modelOrder = OrOrder::model()->findByPk($_GET['id']);
		if (is_null($modelOrder))
			throw new CHttpException(404,'The requested page does not exist.');
		$data = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$modelOrder->id));

		$e=new ExpressCheckout;
		$products = array();
		foreach ($data as $key => $value){
			$products[] = array(
				'NAME'=>$value['name'],
				'AMOUNT'=>round($value['price'], 2),
				'QTY'=>$value['qty']
			);
		}
		// $products[] = array(
		// 	'NAME'=>'Tax',
		// 	'AMOUNT'=>round($modelOrder->tax, 2),
		// 	'QTY'=>1
		// );

		// Optional
        $shipping_address=array(
			'FIRST_NAME'=>$modelOrder->shipping_first_name,
			'LAST_NAME'=>$modelOrder->shipping_last_name,
			'MOB'=>$modelOrder->phone,
			'EMAIL'=>$modelOrder->email,
			'ADDRESS'=>$modelOrder->shipping_address_1, 
			'SHIPTOSTREET'=>$modelOrder->shipping_address_1,
			'SHIPTOCITY'=>$modelOrder->shipping_city,
			'SHIPTOSTATE'=>$modelOrder->shipping_zone,
			'SHIPTOCOUNTRYCODE'=>'AU',
			'SHIPTOZIP'=>$modelOrder->shipping_postcode
		);
		// print_r($shipping_address);
		// exit;

		$e->setShippingInfo($shipping_address); // set Shipping info Optional
		$e->setCurrencyCode("AUD");//set Currency (USD,HKD,GBP,EUR,JPY,CAD,AUD)
		$e->setProducts($products); /* Set array of products*/
		$e->setShippingCost($modelOrder->delivery_price);/* Set Shipping cost(Optional) */
		$e->returnURL=Yii::app()->createAbsoluteUrl("paypal/return");
		$e->cancelURL=Yii::app()->createAbsoluteUrl("paypal/cancel");
		$result=$e->requestPayment(); 

        if(strtoupper($result["ACK"])=="SUCCESS")
		{
			$modelOrder->token = $result['TOKEN'];
			$modelOrder->save(false);
			/*redirect to the paypal gateway with the given token */
			header("location:".$e->PAYPAL_URL.$result["TOKEN"]);
		} 
	}

	public function actionReturn()
	{
		/*
		here paypal will send you the following 2 parameters
		$_REQUEST[token] => EC-59C81234SW941750C
		$_REQUEST[PayerID] => ZW3KSL2H557XC

		*/   
		/*
		You need to do 2 more final steps to complete the user payment. ie 
		1.get the payment details from payment &
		2.make doPayment api call to paypal to complete the payment 
		*/
        $e=new ExpressCheckout;
		
		$modelOrder = OrOrder::model()->find('token = :token', array(':token'=>$_REQUEST['token']));
		if (is_null($modelOrder))
			throw new CHttpException(404,'The requested page does not exist.');

        $paymentDetails=$e->getPaymentDetails($_REQUEST['token']); //1.get payment details by using the given token
 		// print_r($paymentDetails);
        if($paymentDetails['ACK']=="Success")
        {
        	if ($paymentDetails['CHECKOUTSTATUS'] == 'PaymentActionNotInitiated') {
	        	$ack=$e->doPayment($paymentDetails);  //2.Do payment

	        	$modelOrder->order_status_id = 2;
	        	$modelOrder->save(false);

				// // save history
				// $modelHistory = new OrOrderHistory;
				// $modelHistory->member_id = $modelOrder->customer_id;
				// $modelHistory->order_id = $modelOrder->id;
				// $modelHistory->order_status_id = 17;
				// $modelHistory->notify = '';
				// $modelHistory->comment =  'Payment by paypal no '.$modelOrder->invoice_prefix.'-'.$modelOrder->invoice_no.' successfully';
				// $modelHistory->date_add = date("Y-m-d H:i:s");
				// $modelHistory->save(false);

			    $order = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$modelOrder->id));
			    $bank = Bank::model()->findAll();
				
				$mail = $this->renderPartial('//mail/cart-paypal', array(
					'bank'=>$bank,
					'data' => $order,
					'modelOrder' => $modelOrder,
				), true);
				// echo $mail;
				// exit;

				$config = array(
					'to'=>array($modelOrder->email, $this->setting['email']),
					// 'to'=>array($model->email),
					'subject'=>'['.Yii::app()->name.'] Pay With Paypal Successfully',
					'message'=>$mail,
				);
				// kirim email
				Common::mail($config);


        	}
        }

		// $data = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$modelOrder->id));
		$this->render('return', array(
			// 'data' => $data,
			// 'modelOrder' => $modelOrder,
			// 'paymentDetails'=>$paymentDetails,
		));
 
	}

	public function actionCancel($nota)
	{
		// $modelOrder = OrOrder::model()->find('token = :token', array(':token'=>$_REQUEST['token']));
		// if ($modelOrder->order_status_id != 7) {
	 //    	$modelOrder->order_status_id = 7;
	 //    	$modelOrder->save(false);

		// 	// save history
		// 	$modelHistory = new OrOrderHistory;
		// 	$modelHistory->member_id = $modelOrder->customer_id;
		// 	$modelHistory->order_id = $modelOrder->id;
		// 	$modelHistory->order_status_id = 7;
		// 	$modelHistory->notify = '';
		// 	$modelHistory->comment =  'Payment no '.$modelOrder->invoice_prefix.'-'.$modelOrder->invoice_no.' canceled';
		// 	$modelHistory->date_add = date("Y-m-d H:i:s");
		// 	$modelHistory->save(false);
		// }

		$this->pageTitle = 'Payment Canceled - '.$this->pageTitle;
		$this->layout='//layouts/column2';
		$this->render('cancel', array(
		));
	}
}

