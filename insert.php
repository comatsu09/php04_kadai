<?php
//1. POSTデータ取得
$name = $_POST["bookname"];
$email = $_POST["bookurl"];
$naiyou = $_POST["bookcoment"];
$age = $_POST["age"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_table(bookname,bookurl,bookcoment,indate)VALUES(:bookname,:bookurl,:bookcoment,sysdate(),)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('book:name', $bookname, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookcoment', $bookcoment, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':age', $age, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    redirect("index.php");
}
