<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$serverName = "183.111.175.242";
$connectionOptions = array(
    "database" => "isbfdb", // 데이터베이스명
    "uid" => "channeltalk",   // 유저 아이디
    "pwd" => "channel123!"    // 유저 비번
);

// DB커넥션 연결
$dbconn = sqlsrv_connect($serverName, $connectionOptions);



//// 쿼리
//
//$query = "SELECT name, age FROM test";
//
//// 쿼리를 실행하여 statement 를 얻어온다
//
//$stmt = sqlsrv_query($dbconn, $query);
//
//
//
//// statement 를 돌면서 필드값을 가져온다
//
//while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
//
//{
//
//    echo $row['name'];
//
//    echo $row['age'];
//
//    echo "<br>";
//
//}
//
//
//
//// 데이터 출력후 statement 를 해제한다
//
//sqlsrv_free_stmt($stmt);
//
//
//
//// 데이터베이스 접속을 해제한다
//
//sqlsrv_close($dbconn);
//

?>
