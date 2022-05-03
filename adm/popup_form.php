<?php
    include_once('./head.php');
    include_once('./default.php');

    $type = $_GET['type'];
    $id = $_GET['id'];

    $today = date("Y-m-d");

    $timestamp = strtotime("+1 week");
    $seven_day = date("Y-m-d", $timestamp);

    if($type=='modify'){
        // 리스트에 출력하기 위한 sql문
        $admin_sql = "select * from popup_tbl where id = $id";
        $admin_stt=$db_conn->prepare($admin_sql);
        $admin_stt->execute();
        $row = $admin_stt -> fetch();

        $file = '/data/popup/' .$row[6];
    }
 
?>

<link rel="stylesheet" type="text/css" href="./css/popup_form.css" rel="stylesheet" />	

    <div class="page-header">
        <h4 class="page-title">팝업 설정</h4> 
        <form name="popup_form" id="popup_form" method="post" enctype="multipart/form-data" action="./ajax/popup_setting.php">
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="hidden" name="type" value="<?= $type ?>" />
            <div>
                <div class="input-wrap">
                    <p class="label-name">시작일시*</p>
                    <input type="text" name="start_date" id="start_date" class="form-control" value="<?= $row[2] ?>" placeholder="ex) 2021-01-01 00:00:00" required>
                    <label>
                        <input type="checkbox" name="today_chk" onclick="if (this.checked == true) this.form.start_date.value=this.form.today_chk.value; else this.form.start_date.value = this.form.start_date.defaultValue;" value="<?= $today ?> 00:00:00">
                        시작일시를 오늘로
                    </label>
                </div>
                <div class="input-wrap">
                    <p class="label-name">종료일시*</p>
                    <input type="text" name="end_date" id="end_date" class="form-control" value="<?= $row[3] ?>" placeholder="ex) 2021-01-01 23:59:59" required>
                    <label>
                        <input type="checkbox" name="seven_chk" onclick="if (this.checked == true) this.form.end_date.value=this.form.seven_chk.value; else this.form.end_date.value = this.form.end_date.defaultValue;" value="<?= $seven_day ?> 23:59:59" >
                        종료일시를 오늘로
                    </label>
                </div>
                <hr>
                <div class="input-wrap">
                    <p class="label-name">팝업레이어 넓이(px)*</p>
                    <input type="text" name="width" class="form-control" value="<?= $row[4] ?>">
                </div>
                <div class="input-wrap">
                    <p class="label-name">팝업레이어 높이(px)*</p>
                    <input type="text" name="height" class="form-control" value="<?= $row[5] ?>">
                </div>
                <hr>
                <div class="input-wrap">
                    <p class="label-name">팝업 제목*</p>
                    <input type="text" name="popup_name" class="form-control" value="<?= $row[1] ?>">
                </div>
                <hr>
                <div class="input-wrap input-file">
                    <p class="label-name">팝업 이미지 업로드*</p>
                    <input type="file" id="img_upload" name="img_upload" class="form-control"> 
                    <small>5MB 이하의 파일만 업로드 가능합니다.</small>
                    <div class="img-preview">
                        <img src="<?= $file ?>" id="preview">
                    </div>
                </div>
            </div>
                <div class="btn-wrap">
                    <input type="submit" class="submit" value="확인" required />
                    <a href="./popup_list.php" class="go-back">목록</a>
                </div>                
        </form>
    </div>
    <!-- box end -->
</div>
<!-- content-box-wrap end -->

<script type="text/javascript">
        
    var sel_file;

    $(document).ready(function() {
        $("#img_upload").on("change", handleImgFileSelect);
    }); 

    function handleImgFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);

        filesArr.forEach(function(f) {
            if(!f.type.match("image.*")) {
                alert("확장자는 이미지 확장자만 가능합니다.");
                return;
            }
            sel_file = f;

            var reader = new FileReader();
            reader.onload = function(e) {
                $("#preview").attr("src", e.target.result);
            }
            reader.readAsDataURL(f);
        });
    }

</script>