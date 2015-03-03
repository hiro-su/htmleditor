<?php 
if(!file_exists('./htmleditor/style.css')){
	$style_sheet = './style.css';
}else{
	$style_sheet = './htmleditor/style.css';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<link href="<?= $style_sheet; ?>" rel="stylesheet" type="text/css">
</head>
<body>
