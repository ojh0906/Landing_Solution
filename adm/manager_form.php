₩<?php
    include_once('./head.php');
    include_once('./default.php');

    $type = $_GET['type'];
    $id = $_GET['id'];

    if($type=='modify'){
        // 리스트에 출력하기 위한 sql문
        $admin_sql = "select * from admin_tbl where id = $id";
        $admin_stt=$db_conn->prepare($admin_sql);
        $admin_stt->execute();
        $row = $admin_stt -> fetch();
    }

?>

<link rel="stylesheet" type="text/css" href="./css/manager_form.css" rel="stylesheet" />

    <div class="page-header">
        <h4 class="page-title">담당자 설정</h4>
        <form name="manager_form" id="manager_form" method="post" action="./ajax/manager_setting.php">
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="hidden" name="type" value="<?= $type ?>" />
            </div>
                <div class="input-wrap">
                    <p class="label-name">아이디*</p>
                    <input type="text" name="login_id" class="form-control" value="<?=$row[1]?>">
                </div>
                <div class="input-wrap">
                    <p class="label-name">비밀번호*</p>
                    <input type="password" id="password" name="password" class="form-control" value="" required>
                </div>
                <div class="input-wrap">
                    <p class="label-name">이름*</p>
                    <input type="text" name="login_name" class="form-control" value="<?=$row[4]?>">
                </div>
                <div class="input-wrap">
                    <p class="label-name">연락처</p>
                    <input type="text" name="phone" class="form-control" value="<?=$row[3]?>">
                </div>
            </div>
                <div class="btn-wrap">
                    <input type="submit" class="submit" value="확인" />
                    <a href="./manager_list.php" class="go-back">목록</a>
                </div>
        </form>
    </div>
    <!-- box end -->
</div>
<!-- content-box-wrap end -->

<script type='text/javascript'>
    $( document ).ready(function() {
        $('#password').val('');
    });

</script>
