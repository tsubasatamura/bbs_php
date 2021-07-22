<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>新規投稿</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
	rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
	crossorigin="anonymous">
	<?php require_once __DIR__.'/dbmanager.php'; ?>
</head>
<body class="bg-light">
<div class="container w-50 text-center">
	<h1 class="text-secondary my-4">新規投稿</h1>
	<div class="table-responsive">
	<table class="table table-bordered border-secondary align-middle text-nowrap" >
		<tbody>
		<form action="insert_process.php" method="post">
		<tr><th class="bg-info">タイトル</th><td><input class="form-control" type="text" name="title" required></td></tr>
		<tr><th class="bg-info">名前</th><td><input class="form-control" type="text" name="name" required></td></tr>
		<tr><th class="bg-info">編集用パスワード</th><td><input class="form-control" type="password" name="pass" required></td></tr>
		<tr><th class="bg-info">内容</th><td><textarea class="form-control" name="text" cols="30" rows="10" required></textarea></td></tr>
		<tr><td colspan="2"><input type="submit" value="新規投稿"><input type="reset" value="消去"></td></tr>
		<tr><td colspan="2"><a href="index.php">掲示板に戻る</a></td></tr>
		</form>
		</tbody>
	</table>
	</div>
</div>	
</body>
</html>