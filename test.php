<?php

include_once($_SERVER["DOCUMENT_ROOT"].'/yevans/test2.php');

$dsn = "mysql:host=localhost;port=3306;dbname=solution;charset=utf8";
try {
    $db = new PDO($dsn, "root", "root");
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "데이터베이스 연결 성공!!<br/>";
} catch(PDOException $e) {
    echo $e->getMessage();
    echo "안됨";
}
?>
