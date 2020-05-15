<?php
try {
	$db = new PDO('mysql:dbname=mini_bbs02;host=localhost;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
	echo 'DB接続エラー：　' . $e->getMessage();
}
?>