<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>簡易掲示板forPHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
	rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
	crossorigin="anonymous">
	<?php require_once __DIR__.'/dbmanager.php'; ?>
</head>
<body class="bg-light">
<div class="container w-75 text-center">
	<h1 class="text-secondary my-4">簡易掲示板forPHP</h1>
	<a href='insert.php'>新規投稿</a>
	<div class="table-responsive">
	<?php
	try{
		$db=getDb();
		$stt=$db->query('SELECT * FROM BBS ORDER BY bbs_date DESC');
		// $stt->execute();
		while($row=$stt->fetch(PDO::FETCH_ASSOC)){
			
	?>
	<table class="table table-bordered border-secondary text-nowrap my-4">
		<tr><th class="bg-info" style="width:30%">タイトル：<?=e($row['bbs_title'])?></th><th class="bg-info" style="width:30%">投稿者：<?=e($row['bbs_name'])?></th><th class="bg-info" style="width:40%">投稿日時：<?=e($row['bbs_date'])?></th></tr>
		<tr class="bg-white text-start"><td colspan="3" ><div class="text-left"><?=nl2br(e($row['bbs_text']))?></div></td></tr>
		<tr class="bg-white text-end">
			<td colspan="2">
				<form action="update.php" method="post">
				<input type="submit" value="変更">
				<input type="hidden" name='bbs_id' value="<?=e($row['bbs_id'])?>">	
				</form>
			</td>
			<td>
				<form action="delete.php" method="post">
				<input type="submit" value="削除">
				<input type="hidden" name='bbs_id' value="<?=e($row['bbs_id'])?>">	
				</form>
			</td>
		    
		</tr>
	</table>
	<?php
		}
	}catch(PDOException $e){
		die("エラーメッセージ:{$e->getMessage()}");
	}finally{
		$db=null;
	}
	?>
	</div>
</div>	
</body>
</html>