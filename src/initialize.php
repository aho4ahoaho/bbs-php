<?php
$servername = "db:3306";
$username = "user";
$password = "secret";
$dbname = "database";

// MySQLiオブジェクト指向
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続チェック
if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

$result = $conn->query("CREATE TABLE IF NOT EXISTS `posts`( `id` INT NOT NULL AUTO_INCREMENT, `body` TEXT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;");
if (!$result) {
    die("テーブル作成失敗: " . $conn->error);
}
echo "テーブル作成成功";

$conn->close();
