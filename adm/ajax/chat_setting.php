<?
    include_once('../head.php');

    $posted = date("Y-m-d H:i:s");

    $script = $_POST['script'];



    //수정
      $modify_sql = "update pay_service_tbl
           set 
      chatbot = '$script'
           where
      id = 1";

      $updateStmt = $db_conn->prepare($modify_sql);
      $updateStmt->execute();

      echo "<script type='text/javascript'>";
      echo "alert('저장되었습니다.'); location.href='../chat_bot_service.php'";
      echo "</script>";


?>
