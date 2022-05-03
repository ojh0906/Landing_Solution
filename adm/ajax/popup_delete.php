<?
    include_once('../head.php');

    $id = $_GET['id'];

    $file_name = $_GET['file'];
    $file_link = $_SERVER["DOCUMENT_ROOT"].'/data/popup/'.$file_name;


    $delete_sql = "delete from popup_tbl
               where
                  id = $id";

          $deleteStmt = $db_conn->prepare($delete_sql);
          $deleteStmt->execute();

          $count = $deleteStmt->rowCount();

          unlink($file_link);

          echo "<script type='text/javascript'>";
          echo "alert('삭제 되었습니다.'); location.href='../popup_list.php?menu=3&'";
          echo "</script>";
?>
