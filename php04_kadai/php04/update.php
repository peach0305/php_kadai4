<?php
//1. POSTデータ取得
$book_name   = $_POST['book_name'];
$book_URL  = $_POST['book_URL'];
$coment = $_POST['coment'];
$id     = $_POST['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_bm_table SET book_name=:book_name,book_URL=:book_URL,coment=:coment WHERE id=:id;');
$stmt->bindValue(':book_name',   $book_name,   PDO::PARAM_STR);
$stmt->bindValue(':book_URL',  $book_URL,  PDO::PARAM_STR);
$stmt->bindValue(':coment', $coment, PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}
