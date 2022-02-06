<?php
session_start();
require_once('funcs.php');
loginCheck();

$id = $_GET['id'];
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id=:id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ブックマーク登録</legend>
                <label>本の名前：<input type="text" name="book_name" value="<?= $row['book_name'] ?>"></label><br>
                <label>本のURL：<input type="text" name="book_URL" value="<?= $row['book_URL'] ?>"></label><br>
                <label><textArea name="coment" rows="4" cols="40"><?= $row['coment'] ?></textArea></label><br>
                <input type="submit" value="送信">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
