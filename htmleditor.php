<?php
require_once('htmleditor/view.php');
session_start();
//$fileName = htmlspecialchars(@$_REQUEST["fileName"], ENT_QUOTES, 'UTF-8');
if(!isset($_GET['path'])){
	if(isset($_SESSION['setPath'])){
		$path = $_SESSION['setPath'];
	}else{
		$path = './';
		$_SESSION['setPath'] = $path;
	}
}else{
	$path = $_GET['path'];
	$_SESSION['setPath'] = $_GET['path'];
}

$tree = View::getDir($path);
?>
<?php include('./htmleditor/header.php'); ?>
<div id="header_wrapper">
<div id="header">
<h2>htmleditor   <small>(please set utf-8 of your edit file encoding.)</small></h2>

<div id="back">
<form name="set" action="./htmleditor.php" method="get">
<input id="set_box" type="text" value="<?= $path; ?>" name="path">
<input type="submit" value="Set">
</form>
</div>

<form name="input" action="htmleditor/edit.php" method="get">
<input type="submit" value="Edit">
</div>
</div>

<div id="wrapper">
<div id="container"><div id="current_directory"><?= $path; ?></div><?php View::showDir($tree); ?></div>
</div>
</form>
</body>
</html>
