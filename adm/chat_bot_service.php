<?php
include_once('./head.php');
include_once('./default.php');

    // 리스트에 출력하기 위한 sql문
    $sms_sql = "select * from pay_service_tbl where id = 1";
    $sms_stt=$db_conn->prepare($sms_sql);
    $sms_stt->execute();
    $row = $sms_stt -> fetch();


?>

<link rel="stylesheet" type="text/css" href="css/sms_service.css" rel="stylesheet" />

<div class="page-header">
    <h4>챗봇 서비스 설정</h4>
    <form name="chat_form" id="chat_form" method="post" action="./ajax/chat_setting.php">
        <div class="form-container">
            <div class="input-container">
                <p class="label">스크립트를 삽입해주세요.</p>
                <input type="text" name="script" class="form-control" placeholder="" value="<?= $row[3] ?>" required>
            </div>
            <div class="input-container">
                <input type="submit" value="등록">
            </div>
        </div>
    </form>
</div>
<!-- box end -->
</div>
<!-- content-box-wrap end -->

<script type='text/javascript'>


</script>
