<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>投稿削除</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
	rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
	crossorigin="anonymous">
	<?php require_once __DIR__.'/dbmanager.php'; ?>
</head>
<body class="bg-light">
<?php
	try{
		$bbs_id=$_POST['bbs_id'];
		$db=getDb();
		$stt=$db->prepare('SELECT * FROM bbs WHERE bbs_id=:bbs_id');
		$stt->bindValue(':bbs_id',$bbs_id);
		$stt->execute();
		while($row=$stt->fetch(PDO::FETCH_ASSOC)){
	?>
<div class="container w-75 text-center">
	<h1 class="text-secondary my-4">投稿の削除</h1>
	<div class="table-responsive">
	<form name="frm1" action="delete_process.php" method="post" onsubmit="return checkPass('<?=e($row['bbs_pw'])?>')" >
	<table class="table table-bordered border-secondary align-middle text-nowrap" >
		<tbody>
		<tr class="bg-white"><th class="bg-info">タイトル</th><td class="text-start" colspan="2"><?=$row['bbs_title']?></td></tr>
		<tr class="bg-white"><th class="bg-info">名前</th><td class="text-start" colspan="2"><?=e($row['bbs_name'])?></td></tr>
		<tr class="bg-white"><th class="bg-info">内容</th><td class="text-start" colspan="2"><?=nl2br(e($row['bbs_text']))?></td></tr>
		<tr class="bg-white"><th class="bg-info">編集用パスワード</th><td><input class="form-control" type="password" name="pass" required></td><td colspan="2"><input type="submit" value="削除"></td></tr>
		<tr class="bg-white"><td colspan="3"><a href="index.php">掲示板に戻る</a></td></tr>
		<input type="hidden" name="bbs_id" value="<?=$bbs_id?>">
		</tbody>
	</table>
	</form>
	</div>
</div>	
<?php
		}
	}catch(PDOException $e){
		die("エラーメッセージ：{$e->getMessage()}");
	}finally{
		$db=null;
	}
?>
<script type="text/javascript" src="checkpassword.js"></script>
</body>
</html>