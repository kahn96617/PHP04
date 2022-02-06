<?php

session_start();

require_once('funcs.php');

loginCheck();


$pdo = db_conn();

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id=:id');


$stmt->bindValue(':id',$id,PDO::PARAM_INT);

$status = $stmt->execute();

//4．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    $result = $stmt->fetch();
}


?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍ブックマークアプリ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">書籍データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>[編集]</legend>
     <label>書籍名：<input type="text" name="name" value="<?=$result['name']?>"></label><br>
     <label>URL：<input type="text" name="URL" value="<?=$result['url']?>"></label><br>
     <label>備考：<textArea name="comment" rows="4" cols="40"><?=$result['comment']?></textArea></label><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?= $result['id']?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
