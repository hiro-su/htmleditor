<?php
require_once('view.php');
session_start();
$fileName = htmlspecialchars(@$_REQUEST["fileName"], ENT_QUOTES, 'UTF-8');
if($fileName != null){
$text = file_get_contents('../' . $fileName);
$_SESSION['aaa'] = $fileName;
}else{
	header('Location: ../htmleditor.php');
}
?>
<?php include('./header.php'); ?>

<div id="header_wrapper">
<div id="header">
<p>編集画面です  <?php echo $fileName; ?></p>
<div id="back">
<form name="input" action="../htmleditor.php" method="get">
<input type="submit" value="Back">
</form>
</div>

<div id="save">
<form name="input" action="preview.php" method="post">
<input type="submit" value="Preview">
</div>
</div>

<div id="wapper">
<div id="container"><textarea name="text" rows="40" cols="110"><?php echo $text; ?></textarea></div>
</div>
</form>
</div>


</body>
</html>
