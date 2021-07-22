<?php
require_once __DIR__.'/dbmanager.php';

try{
	$db=getDb();
	$stt=$db->prepare('INSERT INTO bbs VALUES(:bbs_id,:bbs_name,:bbs_title,:bbs_text,:bbs_date,:bbs_pw)');
	$stt->bindValue(':bbs_id',null);
	$stt->bindValue(':bbs_name',$_POST['name']);
	$stt->bindValue(':bbs_title',$_POST['title']);
	$stt->bindValue(':bbs_text',$_POST['text']);
	$stt->bindValue(':bbs_date',null);
	$stt->bindValue(':bbs_pw',$_POST['pass']);
	$stt->execute();
	header('Location:http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['BBS']).'/index.php');
}catch(PDOException $e){
	die("エラーメッセージ{$e->getMessage()}");
}finally{
	$db=null;
}