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
    <div class="navbar-header"><a class="navbar-brand" href="select.php">書籍一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="select_non.php">書籍一覧(非会員向け)</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="register_insert.php">
  <div class="jumbotron">
  <fieldset>
    <legend>新規会員登録フォーム</legend>
    <div id="block1">
     <label>氏名：<input type="text" name="lname"></label><br>
     <label>ID：<input type="text" name="lid"></label><br>
     <label>パスワード：<input type="password" name="lpw"></label><br>
     <input type="submit" value="送信">
     </div>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>