<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div bgcolor="#ffffff">
	<div class="adM">
</div>
<table width="750" cellspacing="0" cellpadding="0" style="BORDER-BOTTOM:#0a5aaa 2px solid">
<tbody>
<tr valign="bottom" align="left">
<td width="" height="62"><a target="_blank" name="" href="<?php echo $url.CHtml::normalizeUrl(array('/home/index')) ?>"><img src="<?php echo $baseUrl ?>/asset/images/logo-dv-comp.png"></a></td>
<td width="" style="PADDING-BOTTOM:7px">&nbsp;</td>
</tr>
</tbody>
</table>
<font face="tahoma, arial"> 
<h2>Hello <?php echo $email ?></h2>

<p>We have recently a request to reset your password. if it wasn't you, please ignore this email. <br>
To reset your password, please click this link below</p>
<p><a href="<?php echo $url.CHtml::normalizeUrl(array('/member/changepass', 'hash'=>$hash)) ?>"><?php echo $url.CHtml::normalizeUrl(array('/member/changepass', 'hash'=>$hash)) ?></a></p>
<p>&nbsp;</p>
<p>Regards, <br>
<?php echo Yii::app()->name ?></p>
<table width="750" height="90" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="left" style="FONT-SIZE:11px">Copyright <?php echo Yii::app()->name ?> - <?php echo date("Y") ?>. </td>
</tr>
</tbody>
</table>
</div>