<?php
require_once('view.php');

session_start();
file_put_contents('../'. $_SESSION['aaa'], $_SESSION['data']);
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

<form name="input" action="../htmleditor.php" method="get">
<input type="submit" value="top">
</form>

<p>保存しました&nbsp;&nbsp;<?php echo $_SESSION['aaa']; ?></p>
<hr>
<div id="saveView">
<?php echo $_SESSION["data"]; ?>
</div>
</body>
</html>
