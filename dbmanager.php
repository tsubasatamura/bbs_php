<?php
function getDb():PDO{
	$dsn='mysql:dbname=test; host=127.0.0.1; charset=utf8';
	$usr='selfuser';
	$password='selfpass';
	$db=new PDO($dsn,$usr,$password);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $db;
}
function e(string $str,string $charset='UTF-8'):string{
	return htmlspecialchars($str,ENT_QUOTES|ENT_HTML5,$charset,false);
}