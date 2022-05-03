<?
    include_once('../head.php');

    $posted = date("Y-m-d H:i:s");

    $id = $_POST['id'];
    $type = $_POST['type'];
    $login_id = $_POST['login_id'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $login_name = $_POST['login_name'];

    //비밀번호 암호화
    $encrypted_password = password_hash($password , PASSWORD_DEFAULT );

     //입력
    if($type == 'insert'){

          $insert_sql = "insert into admin_tbl
                              (login_id, password, phone, 
                              login_name, reg_date)
                         value
                              (?, ?, ?,
                              ?,?)";

          var_dump($insert_sql);

          $db_conn->prepare($insert_sql)->execute(
               [$login_id, $password, $phone,
                $login_name, $posted]);

          echo "<script type='text/javascript'>";
          echo "alert('등록 되었습니다.'); location.href='../manager_list.php?menu=4&'";
          echo "</script>";
     }

    //수정
    if($type == 'modify'){

          $modify_sql = "update admin_tbl
               set 
          login_id = '$login_id',
          password = '$encrypted_password',
          phone = '$phone',
          login_name = '$login_name'
               where
          id = $id";

          $updateStmt = $db_conn->prepare($modify_sql);
          $updateStmt->execute();

          $count = $updateStmt->rowCount();


          echo "<script type='text/javascript'>";
          echo "alert('수정을 완료했습니다.'); location.href='../manager_form.php?menu=4&type=modify&id=$id'";
          echo "</script>";

    }


?>
