<?php
    include_once('./head.php');
    include_once('./default.php');

    $sname = "";
    $sid = "";
    $sid = $_GET['sid'];

    switch ($sid){
        case 1:
            $sname =  "마케팅 신청";
            break;
        case 2:
            $sname =  "챗봇 서비스 신청";
            break;
        case 3:
            $sname =  "알림 문자 서비스 신청";
            break;
        case 4:
            $sname =  "기타 오류 문의";
            break;
        case 5:
            $sname =  "서비스 커스텀 신청";
            break;
        case 6:
            $sname =  "법적의무교육 신청";
            break;
        case 7:
            $sname =  "임직원 역량강화 교육 및 컨설팅";
            break;
    }
?>

<link rel="stylesheet" type="text/css" href="css/service_send.css" rel="stylesheet" />

    <div class="page-header">
        <h4><?php echo $sname ?></h4>
        <form>
           <div class="form-container">
               <div class="input-container">
                    <div class="label">
                        <p>업체명</p>
                    </div>
                   <div class="input-wrap">
                       <input type="text" name="name" class="form-control" placeholder="업체명을 적어주세요." required>
                   </div>
               </div>
               <div class="input-container">
                   <div class="label">
                       <p>전화번호</p>
                   </div>
                   <div class="input-wrap">
                       <input type="text" name="phone" class="form-control" placeholder="ex) 02-1234-1234" required>
                   </div>
               </div>
               <div class="input-container">
                   <div class="label">
                       <p>문의사항</p>
                   </div>
                   <div class="input-wrap">
                        <textarea name="desc" class="form-control"></textarea>
                   </div>
               </div>
               <?php if($sid == 1){ ?>
               <div class="input-container">
                   <div class="label">
                       <p></p>
                   </div>
                   <div class="input-wrap chk-wrap">
                       <label>
                           <input type="checkbox" name="type" required>
                           무료 컨설팅
                       </label>
                       <label>
                           <input type="checkbox" name="type" required>
                           유료 컨설팅(가격 협의)
                       </label>
                   </div>
               </div>
                <?php } ?>
               <div class="input-container text-center">
                <input type="submit" value="상담신청">
               </div>
           </div>
        </form>
    </div>
    <!-- box end -->
</div>
<!-- content-box-wrap end -->

<script type='text/javascript'>


</script>
