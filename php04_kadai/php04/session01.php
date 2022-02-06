<?php

//SESSIONをスタートさせる
session_start();

$sid = session_id();

echo $sid;

$_SESSION['book＿name'] = 'ピンポン';
$_SESSION['book_URL'] = 'https://www.amazon.co.jp/%E3%83%94%E3%83%B3%E3%83%9D%E3%83%B3-Big-spirits-comics-special/dp/4091847366';
