<?php
include("func.php");

$name = $_POST["name"];
$occupation = $_POST["occupation"];
$interest = $_POST["interest"]
?>
<html>
<head>
<meta charset="utf-8">
<title>POST（受信）</title>
</head>
<body>
お名前：<?= h($name) ?>
<?= h($occupation) ?>
<?= var_dump($interest)?>

<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>