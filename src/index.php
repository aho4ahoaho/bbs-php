<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

    echo "接続成功";
    ?>
</body>

</html>