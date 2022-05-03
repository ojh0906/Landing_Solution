<?php
    include_once('head.php');    

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $posted = date("Y-m-d H:i:s");
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $location = $_POST["location"];
    $desc = $_POST["desc"];

    $writer_ip = $_POST["writer_ip"];

    $sql="
        insert into contact_tbl
            (name, phone, location, contact_desc, result_status,
             consult_fk, manager_fk, writer_ip, write_date)
        value
            (?, ?, ?, ?, ?,
            ?, ?, ?, ?)";

    $db_conn->prepare($sql)->execute(
        [$name, $phone, $location, $desc, '대기',
        0, 0, $writer_ip, $posted]);


    echo "<script type='text/javascript'>";
    echo "alert('등록 되었습니다.');";
    echo "try{";
    echo "setTimeout(function(){";
    echo "location.href = '/index.php';";
    echo "}, 500);";
    echo "}catch(e){}";
    echo "</script>";


?>
