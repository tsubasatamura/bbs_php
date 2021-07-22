<?php
require_once __DIR__.'/dbmanager.php';
try{
	$bbs_id=$_POST['bbs_id'];
	$newpass=$_POST['newpass'];
	$db=getDb();
	if($newpass===""){
		$stt=$db->prepare('UPDATE bbs SET bbs_name=:bbs_name, bbs_title=:bbs_title,bbs_text=:bbs_text WHERE bbs_id=:bbs_id');
		$stt->bindValue(':bbs_name',$_POST['name']);
		$stt->bindValue(':bbs_title',$_POST['title']);
		$stt->bindValue(':bbs_text',$_POST['text']);
		$stt->bindValue(':bbs_id',$bbs_id);
	}else{
		$stt=$db->prepare('UPDATE bbs SET bbs_name=:bbs_name, bbs_title=:bbs_title,bbs_text=:bbs_text, bbs_pw=:bbs_pw WHERE bbs_id=:bbs_id');
		$stt->bindValue(':bbs_name',$_POST['name']);
		$stt->bindValue(':bbs_title',$_POST['title']);
		$stt->bindValue(':bbs_text',$_POST['text']);
		$stt->bindValue(':bbs_pw',$newpass);
		$stt->bindValue(':bbs_id',$bbs_id);
	}
	$stt->execute();
	header('Location:http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['BBS']).'/index.php');
	echo '完了';
}catch(PDOException $e){
	die("エラーメッセージ{$e->getMessage()}");
}finally{
	$db=null;
}