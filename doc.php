>>>>>>>>>> Multi Language <<<<<<<<<<<< ambil dari project design_manager controller product_category

<!-- Untuk Select Language -->
<div class="multilang pj-form-langbar">
	<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
	<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
	<?php endforeach ?>
</div>
<div class="divider5"></div>

<!-- Untuk menampilkan Form -->
<?php
foreach ($categoryModelDesc as $key => $value) {
	$lang = Language::model()->getName($key);
	?>
	<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

	<?php
	echo $form->labelEx($value, '['.$lang->code.']name');
    echo $form->textField($value,'['.$lang->code.']name',array('class'=>'span8', 'maxlength'=>100));
    ?>
    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
	</div>
    <?php
}
?>

<!-- javascript taruh paling bawah -->
<script type="text/javascript">
	jQuery(function( $ ) {
		$('.multilang').multiLang({
		});
	})
</script>


<!-- di controler -->
$categoryModel = new PrdCategory;
$categoryModelDesc = array();
foreach (Language::model()->getLanguage() as $key => $value){
	$categoryModelDesc[$value->code] = new PrdCategoryDescription;
}


>>>>>>>>>> Ajax Multi Language <<<<<<<<<<<<
<!-- Untuk Error dan Success -->
<div id="<?php echo $form->id ?>_s_" class="alert alert-success" style="display: none;">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<span>Data Saved</span>
</div>
<div id="<?php echo $form->id ?>_es_" class="alert alert-error" style="display: none;">
    <ul>
        <li>Dummy</li>
    </ul>
</div>

<!-- Untuk menampilkan Form -->
<?php
foreach ($categoryModelDesc as $key => $value) {
	$lang = Language::model()->getName($key);
	?>
	<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

	<?php
	echo $form->labelEx($value, '['.$lang->code.']name');
    echo $form->textField($value,'['.$lang->code.']name',array('class'=>'span10', 'maxlength'=>100));
    ?>
    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
	</div>
    <?php
}
?>

<!-- javascript taruh paling bawah -->
$('#category-form').validationAjax({
    success: function(){ //gunakan this untuk selector
    }
});

<!-- di controler validasi ajax -->
unset($categoryModelDesc);
$valid=true;
foreach ($_POST['PrdCategoryDescription'] as $j => $mod) {
    if (isset($_POST['PrdCategoryDescription'][$j])) {
        $categoryModelDesc[$j]=new PrdCategoryDescription;
        $categoryModelDesc[$j]->attributes=$mod;
        $lang = Language::model()->getName($j);
		$categoryModelDesc[$j]->language_id = $lang->id;
        $valid=$categoryModelDesc[$j]->validate() && $valid;
    }
}
if (isset($_POST['ajax']) && $_POST['ajax']==='category-form') {
	echo(json_encode(array(json_decode(CActiveForm::validate($categoryModel)), json_decode(CActiveForm::validateTabular($categoryModelDesc)))));
	Yii::app()->end();
}

<!-- di controler simpan ajax/tidak -->
PrdCategoryDescription::model()->deleteAll('category_id = :id', array(':id'=>$categoryModel->id));
foreach ($categoryModelDesc as $key => $value) {
	$value->category_id=$categoryModel->id;
	$value->save();
}

>>>>>>>>>> Menampilkan data <<<<<<<<<<<<

<!-- pasang di model dan sesuaikan nilai default -->
public function getData($setting = array(), $languageId=1)
{
	$default = array(
		'select'=>'t.*, prd_category_description.name',
		'join'=>'LEFT JOIN prd_category_description ON prd_category_description.category_id=t.id',
		'order'=>'t.sort ASC',
		/**
		 * @addCondition
		 * criteria @string
		 * operator @string default and
		 * params @array
		 */
		'addCondition'=>array(),
		'limit'=>10,
		'return'=>'all', // single or all
	);
	$setting = array_merge($default, $setting);
	$criteria=new CDbCriteria;

	$criteria->select = $setting['select'];
	$criteria->join = $setting['join'];

	$params = array();

	// set bahasa yang di pilih
	$criteria->addCondition('prd_category_description.language_id = :language_id');
	$params[':language_id'] = $languageId;
	
	/**
	 * addCondition
	 * criteria @string
	 * operator @string default and
	 * params @array
	 */
	if (count($setting['addCondition']) > 0) {
		foreach ($setting['addCondition'] as $key => $value) {
			$criteria->addCondition($value['criteria'], ($value['operator'] == '') ? 'AND' : $value['operator']);
			foreach ($value['params'] as $k => $v) {
				$params[$k] = $v;
			}
		}
	}

	$criteria->params = $params;
	
	if ($setting['order'] !== '') {
		$criteria->order = $setting['order'];
	}

	if ($setting['return'] === 'single') {
		$model = $this->model()->find($criteria);
	}else{
		$model['jml']=$this->count($criteria); // ambil jumlah data
		if ($setting['limit'] !== '') {
			$criteria->limit = $setting['limit'];

			$pages=new CPagination($model['jml']);
			$pages->pageSize=($setting['limit']==='') ? 10 : $setting['limit'];
			if ($setting['limit'] != '') {
				$pages->pageSize=$setting['limit'];
			}
	    	$pages->applyLimit($criteria);
			$model['pages'] = $pages;
		}


		$model['data'] = $this->findAll($criteria);
	}

	return $model;
}



<!-- Cara pemakaian -->
$nestedCategory = PrdCategory::model()->getData(array(
	// option letakkan di sini
), $this->languageID);


>>>>>>>>>> Build Tree Data Unlimited <<<<<<<<<<<<
private $_nestedData;
public function nested($data)
{
	foreach ($data as $key => $value) {
		$this->_nestedData[$value->parent_id][$value->id] = $value->attributes;
	}
	return $this->buildNested();
}

public function buildNested($parent_id = 0)
{
    // $data=array();
    $str = '';
    if (count($this->_nestedData[$parent_id]) > 0) {
        $str .= '<ol class="dd-list">';
        foreach($this->_nestedData[$parent_id] as $key=>$val){            
	        $str .= '<li class="dd-item" data-id="'.$val['id'].'">
                <div class="dd-handle">'.$val['name'].'</div>
                <div class="dd3-button">
                <a href="'.CHtml::normalizeUrl(array('/admin/category/delete', 'id'=>$val['id'])).'" class="delete"><i class="fa fa-trash-o"></i></a>
                &nbsp;
                <a href="'.CHtml::normalizeUrl(array('/admin/category/update', 'id'=>$val['id'])).'" class="update"><i class="fa fa-pencil"></i></a>
                </div>
            ';
            $str .= $this->buildNested($key);
        	$str .= '</li>';
            
            // $children=isset($this->_nestedData[$key])?$this->buildNested($key):null; 
            // // $expand=$children?true:false;                           
            // $data[]=array('id'=>$key,'title'=>$val['name'],'desc'=>$val['desc'],'slug'=>$val['slug'],'image'=>$val['image'],'children'=>$children);            
        }
        $str .= '</ol>';
    }
    return $str;
}


>>>>>>>>>> Tambah Data Javascript Bukan Ajax <<<<<<<<<<<<

<table class="table table-bordered responsive">
    <thead>
        <tr>
            <th>Option</th>
            <th>Stock</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="option-tempel"></tbody>
    <tbody class="option-add">
        <tr>
            <td><input type="text" class="input-block-level"></td>
            <td><input type="text" class="input-block-level"></td>
            <td><input type="text" class="input-block-level"></td>
            <td><button type="button" class="btn btn-danger delete-option"><i class="fa fa-trash-o"></i> Delete</button></td>
        </tr>
    </tbody>
</table>
<div class="divider5"></div>
<button type="button" class="btn btn-primary tambah-option">Tambah Option</button>
<script type="text/javascript">
jQuery(function( $ ) {
	$('.tambah-option').tambahData({
		targetHtml: '.table tbody.option-add',
		// html: '<tr><td></td></tr>',
		tambahkan: '.table tbody.option-tempel',
	});
	$(document).on('click', '.delete-option',function( e ) {
		$(this).parent().parent().remove();
		return false;
	})
})

</script>

>>>>>>>>>> Cara passang dual bahasa di setting <<<<<<<<<<<<
<?php $type = 'default_meta_title' ?>
<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
	<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
		<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
		<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

	    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
	    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
	</div>
<?php endforeach ?>


>>>>>>>>>> CREATE VIEW SQL <<<<<<<<<<<<

CREATE VIEW view_category as SELECT
prd_category.id,
parent_id,
sort,
image,
type,
prd_category.data,
prd_category_description.id as id2,
category_id,
language_id,
name,
prd_category_description.data as data2
FROM `prd_category` INNER JOIN prd_category_description
ON `prd_category`.`id`=`prd_category_description`.`category_id`;

CREATE VIEW view_brand as SELECT
`prd_brand`.`id`,
`image`,
`active`,
`date_input`,
`date_update`,
`insert_by`,
`last_update_by`,
prd_brand_description.`id` as `id2`,
`brand_id`,
`language_id`,
`title`,
`content`
FROM `prd_brand` INNER JOIN prd_brand_description
ON `prd_brand`.`id`=`prd_brand_description`.`brand_id`;

CREATE VIEW view_product as SELECT
`prd_product`.`id`,
`category_id`,
`brand_id`,
`image`,
`kode`,
`harga`,
`harga_coret`,
`stock`,
`berat`,
`terbaru`,
`terlaris`,
`out_stock`,
`status`,
`date`,
`date_input`,
`date_update`,
`data`,
`product_id`,
`language_id`,
`name`,
`desc`,
`meta_title`,
`meta_desc`,
`meta_key`
FROM `prd_product` INNER JOIN prd_product_description
ON `prd_product`.`id`=`prd_product_description`.`product_id`;

CREATE VIEW view_blog as SELECT
`pg_blog`.`id`,
`topik_id`,
`image`,
`active`,
`date_input`,
`date_update`,
`insert_by`,
`last_update_by`,
`writer`,
pg_blog_description.`id` as `id2`,
`blog_id`,
`language_id`,
`title`,
`content`
FROM `pg_blog` INNER JOIN pg_blog_description
ON `pg_blog`.`id`=`pg_blog_description`.`blog_id`;

CREATE VIEW view_page as SELECT
`pg_pages`.id as `id`,
name ,
type ,
`group`,
`pg_pages_description`.id as `id2`,
page_id,
language_id,
page_name,
content,
meta_title,
meta_keyword,
meta_description
FROM `pg_pages` INNER JOIN pg_pages_description
ON `pg_pages`.`id`=`pg_pages_description`.`page_id`;

CREATE VIEW view_slide as SELECT
`sl_slide`.`id`,
`topik_id`,
`image`,
`active`,
`date_input`,
`date_update`,
`insert_by`,
`last_update_by`,
`writer`,
`picture_text`,
`sl_slide_description`.`id` as `id2`,
`slide_id`,
`language_id`,
`title`,
`content`,
`url`
FROM `sl_slide` INNER JOIN sl_slide_description
ON `sl_slide_description`.`slide_id`=`sl_slide`.`id`;

CREATE VIEW view_bank as SELECT
`pg_bank`.`id`,
`id_bank`,
`pg_bank`.`nama` as `nama`,
`rekening`,

`pg_list_bank`.`nama` as `bank_name`,
`label`
FROM `pg_bank` INNER JOIN `pg_list_bank`
ON `pg_list_bank`.`id`=`pg_bank`.`id_bank`;

CREATE VIEW view_search as
(SELECT `name` as `name`, `deskripsi` as `deskripsi`, CONCAT('/images/game/', `image`) as `image`, 'game' as  `type`, `id` as `id` FROM jur_game)
UNION
(SELECT `name`, CONCAT('Voucher dari ', `name`), CONCAT('/images/voucher/', `image`), 'voucher', `id` FROM jur_voucher)
UNION
(SELECT `name`, `desc`, CONCAT('/images/product/', `image`), 'product', `id` FROM view_product WHERE `language_id` = 3)


INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'url_facebook', 'Facebook URL', '', 'text', 0, 'data', 'n', 1);
INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'url_twitter', 'Twitter URL', '', 'text', 0, 'data', 'n', 1);
INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'url_gplus', 'gPlus URL', '', 'text', 0, 'data', 'n', 1);
INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'url_in', 'Linked In', '', 'text', 0, 'data', 'n', 1);

INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'contact_email', 'Email', '7CCABE97', 'text', 0, 'contact', 'n', 1),
(NULL, 'contact_tol_free', 'Tol Free', '+62838 547 99858', 'text', 0, 'contact', 'n', 1),
(NULL, 'contact_phone', 'Phone', '0838 547 99858, 0859 298 60068', 'text', 0, 'contact', 'n', 1),
(NULL, 'contact_fax', 'FAX', 'juragangameonline', 'text', 0, 'contact', 'n', 1),
(NULL, 'contact_address', 'Address', 'juragangameonline@yahoo.com', 'text', 0, 'contact', 'n', 1);


INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'contact_pin', 'Pin BBM', '', 'text', 0, 'data', 'n', 1);
INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'contact_wa', 'Whats App', '', 'text', 0, 'data', 'n', 1);
INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'contact_phone', 'Phone', '', 'text', 0, 'data', 'n', 1);
INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'contact_line', 'Line ID', '', 'text', 0, 'data', 'n', 1);
INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'contact_ym', 'YM', '', 'text', 0, 'data', 'n', 1);



INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'url_twitter', 'Twitter URL', 'https://twitter.com/', 'text', 0, 'data', 'n', 1),
(NULL, 'url_gplus', 'gPlus URL', 'https://plus.google.com/getstarted?fww=1', 'text', 0, 'data', 'n', 1),
(NULL, 'url_youtube', 'Youtube URL', 'https://www.youtube.com/', 'text', 0, 'data', 'n', 1),
(NULL, 'contact_pin', 'Pin BBM', '7CCABE97', 'text', 0, 'contact', 'n', 1),
(NULL, 'contact_wa', 'Whats App', '+62838 547 99858', 'text', 0, 'contact', 'n', 1),
(NULL, 'contact_phone', 'Phone', '0838 547 99858, 0859 298 60068', 'text', 0, 'contact', 'n', 1),
(NULL, 'contact_line', 'Line ID', 'juragangameonline', 'text', 0, 'contact', 'n', 1),
(NULL, 'contact_ym', 'YM', 'juragangameonline@yahoo.com', 'text', 0, 'contact', 'n', 1);

INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'home_banner_title_1', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_subtitle_1', 'Sub Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_content_1', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_teks_url_1', 'Text URL', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_url_1', 'URL', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_title_2', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_subtitle_2', 'Sub Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_content_2', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_teks_url_2', 'Text URL', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_url_2', 'URL', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_title_3', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_subtitle_3', 'Sub Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_content_3', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_teks_url_3', 'Text URL', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_banner_url_3', 'URL', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_about_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_about_subtitle', 'Sub Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_about_content', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_about_url', 'URL', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_why_title_1', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_why_content_1', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_why_title_2', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_why_content_2', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_why_title_3', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_why_content_3', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_why_title_4', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_why_content_4', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'home_why_image', 'Image', '', 'image', 0, 'data', 'n', 1);

INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'about_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'about_image', 'Image', '', 'image', 0, 'data', 'n', 1),
(NULL, 'about_content', 'Content', '', 'text', 0, 'data', 'y', 1),

(NULL, 'about_bottom_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'about_bottom_subtitle', 'Sub Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'about_bottom_content', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'about_bottom_image_1', 'Image', '', 'image', 0, 'data', 'n', 1),
(NULL, 'about_bottom_image_2', 'Image', '', 'image', 0, 'data', 'n', 1),
(NULL, 'about_bottom_image_3', 'Image', '', 'image', 0, 'data', 'n', 1),

(NULL, 'agen_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'agen_content', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'agen_image', 'Image', '', 'image', 0, 'data', 'n', 1),

(NULL, 'product_hero_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'product_hero_subtitle', 'Sub Title', '', 'text', 0, 'data', 'y', 1),

(NULL, 'contact_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'contact_image', 'Image', '', 'image', 0, 'data', 'n', 1),
(NULL, 'contact_subtitle', 'Sub Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'contact_head_office', 'Head Office', '', 'text', 0, 'data', 'y', 1);


INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'agen_image', 'Image', '', 'image', 0, 'data', 'n', 1);

INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'cara_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'cara_content', 'Content', '', 'text', 0, 'data', 'y', 1);

INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'url_linkedin', 'URL LinkedIn', '', 'text', 0, 'data', 'n', 1);


INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'tos_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'tos_content', 'Content', '', 'text', 0, 'data', 'y', 1),

(NULL, 'contact_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'contact_content', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'contact_opening', 'Opening Hours', '', 'text', 0, 'data', 'y', 1),

(NULL, 'faq_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'faq_content', 'Content', '', 'text', 0, 'data', 'y', 1),

(NULL, 'agent_title_1', 'Title Line 1', '', 'text', 0, 'data', 'y', 1),
(NULL, 'agent_title_2', 'Title Line 2', '', 'text', 0, 'data', 'y', 1),
(NULL, 'agent_content', 'Content', '', 'text', 0, 'data', 'y', 1),

(NULL, 'pengiriman_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'pengiriman_content', 'Content', '', 'text', 0, 'data', 'y', 1),

(NULL, 'contact_whatsapp', 'Whatsapp', '', 'text', 0, 'data', 'n', 1),
(NULL, 'contact_bbm,', 'Pin BBM', '', 'text', 0, 'data', 'n', 1);


INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'product_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'product_content', 'Content', '', 'text', 0, 'data', 'y', 1),

(NULL, 'how_to_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'how_to_content', 'Content', '', 'text', 0, 'data', 'y', 1),

(NULL, 'about_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'about_subtitle', 'Sub Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'about_content', 'Content', '', 'text', 0, 'data', 'y', 1);

(NULL, 'contact_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'contact_content', 'Content', '', 'text', 0, 'data', 'y', 1);


INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'contact_name', 'Name', '', 'text', 0, 'data', 'n', 1),
(NULL, 'contact_address', 'Address', '', 'text', 0, 'data', 'n', 1),
(NULL, 'contact_city', 'City', '', 'text', 0, 'data', 'n', 1),
(NULL, 'contact_map', 'Map', '', 'text', 0, 'data', 'n', 1);

INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'about_vision', 'Vision', '', 'text', 0, 'data', 'y', 1),
(NULL, 'about_mision', 'Mision', '', 'text', 0, 'data', 'y', 1);

INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'wholeseler_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'wholeseler_subtitle', 'Sub Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'wholeseler_content', 'Content', '', 'text', 0, 'data', 'y', 1);

------------------------ Daihatsu ------------------------

---- HOMEPAGE
INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'homepage_banner_top_1', 'Banner Top 1', '', 'image', 0, 'data', 'n', 1),
(NULL, 'homepage_banner_top_2', 'Banner Top 2', '', 'image', 0, 'data', 'n', 1),
(NULL, 'homepage_banner_top_3', 'Banner Top 3', '', 'image', 0, 'data', 'n', 1),

(NULL, 'homepage_middle_image', 'Image', '', 'image', 0, 'data', 'n', 1),
(NULL, 'homepage_middle_title', 'Title', '', 'text', 0, 'data', 'y', 1),
(NULL, 'homepage_middle_content', 'Content', '', 'text', 0, 'data', 'y', 1),
(NULL, 'homepage_middle_urltext', 'Url Text', '', 'text', 0, 'data', 'y', 1);

(NULL, 'homepage_bottom_banner_1', 'Banner Bottom 1', '', 'image', 0, 'data', 'n', 1),
(NULL, 'homepage_bottom_banner_2', 'Banner Bottom 2', '', 'image', 0, 'data', 'n', 1);


---- ABOUT
INSERT INTO `setting` (`id`, `name`, `label`, `value`, `type`, `hide`, `group`, `dual_language`, `sort`) VALUES
(NULL, 'about_hero_title', 'Title', '', 'image', 0, 'data', 'n', 1),