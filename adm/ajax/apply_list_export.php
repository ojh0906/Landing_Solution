<?php

    header( "Content-type: application/vnd.ms-excel; charset=utf-8");
    header( "Content-Disposition: attachment; filename = 신청자DB_".date('Y-m-d H:i:s') .".xls" );     //filename = 저장되는 파일명을 설정합니다.
    header( "Content-Description: PHP4 Generated Data" );

    $type = $GET['type'];

include_once('../../db/dbconfig.php');

if($type == 'all'){
        $list_sql = "select * from contact_tbl order by id desc";
        $list_stt=$db_conn->prepare($list_sql);
        $list_stt->execute();
    } else {
        $chk =$_POST['chk'];


        $list_sql = "select * from contact_tbl
                            where
                    id IN (" . implode(',', array_map('intval', $chk)) .")
                            order by id";
        $list_stt=$db_conn->prepare($list_sql);
        $list_stt->execute();


    }



    $EXCEL_FILE = "
        <table border='1'>
            <tr>
                <td>생성일</td>
                <td>이름</td>
                <td>연락처</td>
                <td>상담종류</td>
                <td>결과</td>
                <td>담당자</td>
                <td>아이피</td>
            </tr>
            ";
    while($list_row=$list_stt->fetch()){
        $EXCEL_FILE = $EXCEL_FILE ."
            <tr>
               <td>".$list_row['write_date']."</td>
               <td>".$list_row['name']."</td>
               <td>".$list_row['phone']."</td>
               <td>".$list_row['contact_type']."</td>
               <td>".$list_row['result_status']."</td>
               <td>".$list_row['manager_fk']."</td>
               <td>".$list_row['writer_ip']."</td>
            </tr>
        ";
    }
    $EXCEL_FILE = $EXCEL_FILE ."
        </table>
    ";
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";

    echo $EXCEL_FILE;

?>
