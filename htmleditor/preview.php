<?php
require_once('view.php');
session_start();
$_SESSION['data'] = $_POST["text"];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="back">
<form name="input" action="./edit.php" method="get">
<input type="submit" value="back">
</form>
</div>

<div id="save">
<form name="input" action="./save.php" method="POST">
<input type="submit" value="save">
<p>確認画面です。保存しますか？　 <?php echo $_SESSION['aaa']; ?></p>
</form>
</div>

<hr>
<div id="saveView">
<?php echo @$_POST["text"]; ?>
</div>
</body>
</html>
