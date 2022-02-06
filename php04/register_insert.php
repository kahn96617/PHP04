<?php
//1. POSTデータ取得
$lname=$_POST['lname'];
$lid=$_POST['lid'];
$lpw= password_hash($_POST['lpw'],PASSWORD_DEFAULT);

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
  "INSERT INTO gs_bmuser_table(id,name,lid,lpw,kanri_flg,life_flg)
   VALUES(NULL,:lname,:lid,:lpw,0,0)"
);

// 4. バインド変数を用意
$stmt->bindValue(':lname', $lname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("login.php");
}
?>