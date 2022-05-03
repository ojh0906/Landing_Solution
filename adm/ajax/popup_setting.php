<?
    include_once('../head.php');

    $reg_date = date("Y-m-d H:i:s");

    $id = $_POST['id'];
    $type = $_POST['type'];
    $popup_name = $_POST['popup_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $width = $_POST['width'];
    $height = $_POST['height'];


     //입력
    if($type == 'insert'){


          if(isset($_FILES['img_upload']) && $_FILES['img_upload']['name'] != "") {
               $file = $_FILES['img_upload'];
               $upload_directory = $_SERVER["DOCUMENT_ROOT"].'/data/popup/';
               $ext_str = "jpg,gif,png";
               $allowed_extensions = explode(',', $ext_str);
               $max_file_size = 5242880;
               $ext = substr($file['name'], strrpos($file['name'], '.') + 1);

               // 확장자 체크
               if(!in_array($ext, $allowed_extensions)) {
                    echo "<script type='text/javascript'>";
                    echo "alert('이미지 파일만 업로드 하실 수 있습니다.'); history.back()";
                    echo "</script>";
               }
               // 파일 크기 체크
               if($file['size'] >= $max_file_size) {
                    echo "<script type='text/javascript'>";
                    echo "alert('5MB 이하의 파일만 업로드 가능합니다.'); history.back()";
                    echo "</script>";
               }

               if(move_uploaded_file($file['tmp_name'], $upload_directory.$file['name'])) {

                    $insert_sql = "insert into popup_tbl
                                        (popup_name, start_date, end_date, width,
                                        height, file_name, reg_date)
                                   value
                                        (?, ?, ?, ?,
                                        ?, ?, ?)";

                    $db_conn->prepare($insert_sql)->execute(
                         [$popup_name, $start_date, $end_date, $width,
                          $height, $file['name'], $reg_date]);

                    echo "<script type='text/javascript'>";
                    echo "alert('등록 되었습니다.'); location.href='../popup_list.php?menu=3&'";
                    echo "</script>";
               }

        }
     }

    //수정
    if($type == 'modify'){

          $modify_sql = "update popup_tbl
               set 
          popup_name = '$popup_name',
          start_date = '$start_date',
          end_date = '$end_date',
          width = '$width',
          height = '$height'
               where
          id = $id";

          $updateStmt = $db_conn->prepare($modify_sql);
          $updateStmt->execute();

          $count = $updateStmt->rowCount();


          echo "<script type='text/javascript'>";
          echo "alert('수정을 완료했습니다.'); location.href='../popup_form.php?menu=4&type=modify&id=$id'";
          echo "</script>";

    }


?>
