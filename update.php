<?php
//1. POSTデータ取得
$bookname   = $_POST["bookname"];
$bookurl  = $_POST["bookurl"];
$bookcoment = $_POST["bookcoment"];
// $age    = $_POST["age"];
$id     = $_POST["id"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET bookname=:bookname,bookurl=:bookurl,bookcoment=:bookcoment WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bookname', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $email, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookcoment', $naiyou, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':age', $age, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    redirect("select.php");
}
