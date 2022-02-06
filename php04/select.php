<?php
//SESSIONスタート
session_start();


//関数を呼び出す
require_once('funcs.php');

//ログインチェック
loginCheck();

//以下ログインユーザーのみ
$user_name = $_SESSION['name'];
$kanri_flg = $_SESSION['kanri_flg']; //if文で表示するhtmlを分岐させる


$pdo = db_conn();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($status);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<div id='block'>";
    $view .= "<p>登録日時：";
    $view .= $result['indate'];
    $view .= "</p>";
    $view .= "<p>書籍名：";
    $view .= $result['name'];
    $view .= "</p>";
    $view .= "<p>備考：";
    $view .= $result['comment'];
    $view .= "</p>";
    $view .= "<p>URL：<a href='";
    $view .= $result['url'];
    $view .= "'>";
    $view .= $result['url'];
    $view .= "</a></p>";

    $view .= "<p>";
    $view .= '<a href="detail.php?id='.$result['id'].'">';
    $view .= '  [編集]';
    $view .= '</a>';
    $view .= "</p>";

    $view .= "<p>";
    $view .= '<a href="delete.php?id=' . $result['id'] . '">';
    $view .= '  [削除]';
    $view .= '</a>';
    $view .= "</p>";

    $view .= "</div>";


  }

  

}



?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍ブックマークアプリ</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
      <p><?= $user_name ?></p>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
