<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>投稿変更</title>
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
	<h1 class="text-secondary my-4">投稿の変更</h1>
	<div class="table-responsive">
	<form name="frm1" action="update_process.php" method="post" onsubmit="return checkPass('<?=e($row['bbs_pw'])?>')" >
	<table class="table table-bordered border-secondary align-middle text-nowrap" >
		<tbody>
		<tr class="bg-white"><th class="bg-info">タイトル</th><td class="text-start" colspan="2"><input class="form-control" type="text" name="title" value="<?=e($row['bbs_title'])?>"required></td></tr>
		<tr class="bg-white"><th class="bg-info">新編集用パスワード</th><td colspan="2"><input class="form-control" type="password" name="newpass"></td></tr>
		<tr class="bg-white"><th class="bg-info">名前</th><td class="text-start" colspan="2"><input class="form-control" type="text" name="name" value="<?=e($row['bbs_name'])?>" required></td></tr>
		<tr class="bg-white"><th class="bg-info">内容</th><td class="text-start" colspan="2"><textarea class="form-control" name="text" cols="30" rows="10" required><?=e($row['bbs_text'])?></textarea></td></tr>
		<tr class="bg-white"><th class="bg-info">編集用パスワード</th><td><input class="form-control" type="password" name="pass" required></td><td colspan="2"><input type="submit" value="変更"></td></tr>
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