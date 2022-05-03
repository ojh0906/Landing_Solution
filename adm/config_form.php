<?php
    include_once('./head.php');
    include_once('./default.php');

    // 리스트에 출력하기 위한 sql문
    $site_sql = "select * from site_setting_tbl";
    $site_stt=$db_conn->prepare($site_sql);
    $site_stt->execute();
    $row = $site_stt -> fetch();

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>
<link rel="stylesheet" type="text/css" href="./css/config_form.css" rel="stylesheet" />	

        <div class="page-header">
            <h4 class="page-title">기본 설정</h4> 

            <form name="config_form" id="config_form" method="post" action="./ajax/site_modify.php">
                <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>사이트명*</label>
                            <input type="text" name="site_title" value="<?=$row[1]?>" id="site_title" required class="required frm_input form-control" size="30">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <small class="description text-xs">사이트명은 Browser Title 로 보이게 됩니다.</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>사이트 소개*</label>
                            <input type="text" name="site_description" value="<?=$row[2]?>" id="site_description" required class="required frm_input form-control" size="30">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <small class="description text-xs">meta 태그의 og:description 에 해당됩니다.</small>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>구글 애널리틱스 코드 삽입</label>
                            <input type="text" name="google_analytics" value="<?=$row[3]?>" id="google_analytics" class="frm_input form-control" size="30">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <small class="description text-xs">&#60;script async="" src="https://www.googletagmanager.com/gtag/js?id=<strong>[해당 부분의 코드를 입력해주세요]</strong>"&#62;&#60;/script&#62;</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>네이버 웹 마스터 코드 삽입</label>
                            <input type="text" name="naver_webmaster" value="<?=$row[4]?>" id="naver_webmaster" class="frm_input form-control" size="30">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <small class="description text-xs">&#60;meta name="naver-site-verification" content="<strong>[해당 부분의 코드를 입력해주세요]</strong>"/&#62;</small>
                    </div>
                </div>
                <!-- <hr>
                <h6 class="title mb-4">알람 설정</h6>
                <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>메일 알람 사용 여부*</label>
                            <select name="cf_email_use" id="mailAlarm" class="form-control custom-select">
                                <option value="0">사용안함</option>
                                <option value="1" selected>사용함</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                            <input type="hidden" name="cf_admin_email_name" value="관리자">
                            <label>수신 받을 메일 주소*</label>
                            <input type="text" name="cf_admin_email" value="" id="cf_admin_email" required class="required email frm_input form-control" size="30">
                            <div class="text-xs mt-1" style="font-size: .75rem;">
                            , (콤마)를 통해 한번에 여러명에게 발송이 가능합니다.
                            </div>
                        </div>
                    </div>
                </div> -->
                 <!--
                <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>SMS 알람 사용 여부</label>
                            <select id="cf_sms_use" name="cf_sms_use" class="form-control custom-select">
                                <option value="">사용안함</option>
                                <option value="did" selected="selected">사용함</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>수신 받을 핸드폰번호*</label>
                            <input onkeypress='return checkNumber(event)' type="text" name="cf_8_subj" value="" id="cf_admin_phone" required class="required frm_input form-control" size="30">
                            <div class="text-xs mt-1" style="font-size: .75rem;">
                            , (콤마)를 통해 한번에 여러명에게 발송이 가능합니다.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>AccessKey</label>
                            <input type="text" name="cf_9_subj" value="" id="cf_access_key" required class="required frm_input form-control" size="30">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>SecretKey</label>
                            <input type="text" name="cf_10_subj" value="" id="cf_secret_key" required class="required frm_input form-control" size="30">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col pr-1">
                        <div class="mt-4 d-flex align-items-center">
                            <div class="flex-fill">
                               <p>보유 잔액: <strong>0</strong> 원</p>
                            </div>
                            <div class="flex-fill text-right">
                               <a href="https://www.did.kr/payment" target="_blank">충전하기</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div>
                    <input type="submit" value="확인" class="btn_submit btn btn-primary" accesskey="s">
                </div>
            </form>
        </div>
        <!-- page-header end -->
    </div>
    <!-- box end -->

</div>
<!-- content-box-wrap end -->