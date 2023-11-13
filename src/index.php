<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php

        $servername = "db:3306";
        $username = "user";
        $password = "secret";
        $dbname = "database";

        // MySQLiオブジェクト指向
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("接続失敗: " . $conn->connect_error);
        }

        if (isset($_POST["body"])) {
            $body = $_POST["body"];
            $result = $conn->query("INSERT INTO `posts` (`body`) VALUES ('$body')");
            if (!$result) {
                die("クエリ実行失敗: " . $conn->error);
            }
        }

        $result = $conn->query("SELECT * FROM `posts`");
        if (!$result) {
            die("クエリ実行失敗: " . $conn->error);
        }
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            echo "<li><div>ID : " . $row["id"] . "</div><div>" . $row["body"] . "</div></li>";
        }

        ?>
    </ul>
    <form action="index.php" method="post">
        <textarea type="text" name="body"></textarea>
        <input type="submit" value="送信">
    </form>
</body>
<style>
    * {
        margin: 0;
        box-sizing: border-box;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: auto;
        width: min(100%, 450px);
    }

    li {
        border-bottom: 1px solid #444;
        padding: 1rem;
    }

    li div:first-child {
        width: 50px;
        display: inline-block;
    }

    form {
        width: min(100%, 450px);
        margin: 1rem auto;
    }

    textarea {
        width: 100%;
        height: 100px;
        resize: vertical;
    }

    input {
        width: 100%;
        font-size: large;
    }
</style>

</html>