<?php
require_once __DIR__.'/dbmanager.php';
try{
	$bbs_id=$_POST['bbs_id'];
	$db=getDb();
	$stt=$db->prepare('DELETE FROM bbs WHERE bbs_id=:bbs_id');
	$stt->bindValue(':bbs_id',$bbs_id);
	$stt->execute();
	header('Location:http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['BBS']).'/index.php');
}catch(PDOException $e){
	die("エラーメッセージ{$e->getMessage()}");
}finally{
	$db=null;
}