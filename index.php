<?php
include_once('head.php');

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
    opcache_reset();
}


//팝업 출력하기 위한 sql문
$popup_sql = "select * from popup_tbl order by id";
$popup_stt=$db_conn->prepare($popup_sql);
$popup_stt->execute();

?>
<link rel="stylesheet" type="text/css" href="css/index.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/reset.css" rel="stylesheet" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src='https://www.google.com/recaptcha/api.js'></script>




<!-- layer popup -->
<?
while($popup=$popup_stt->fetch()){
    ?>
    <div class="layer-popup popup<?= $popup['id'] ?>" id="popup<?= $popup['id'] ?>" style="display: block; width: <?= $popup['width'] ?>px; height: <?= $popup['height'] ?>px;">
        <button type="button" class="close-popup" onclick="hidePopup('<?= $popup['id'] ?>');"><i class="fas fa-times"></i></button>
        <img src="/data/popup/<?= $popup['file_name'] ?>" style="height:calc(<?= $popup['height'] ?>px - 36px);" alt="<?= $popup['popup_name'] ?>">
        <div class="show-chk-wrap">
            <input class="pid" value="<?= $popup['id'] ?>" type="hidden">
            <span class="modal-today-close">24시간동안 보지않기</span>
        </div>
    </div>
<? } ?>

<audio id="audio" autoplay type="audio/mp3">
    <source src="bgm.mp3">
</audio>
<!-- Menu Navi    -->
<div class="nav-wrap">
    <img class="logo" src="img/logo-top.png">
    <div class="pc-menu-wrap">
        <ul>
            <li><a href="#menu1">브랜드</a></li>
            <li><a href="#menu2">경쟁력</a></li>
            <li><a href="#menu3">상권안내</a></li>
            <li><a href="#menu4">성공전략</a></li>
            <li><a href="#menu5">문의하기</a></li>
        </ul>
    </div>
    <i class="fas fa-bars menu-open"></i>
</div>
<div class="sidebar-wrap">
    <div class="menu-container">
        <div class="close-wrap">
            <i class="far fa-times-circle menu-close"></i>
        </div>
        <div class="menu-wrap">
            <a href="#menu1">브랜드</a>
        </div>
        <div class="menu-wrap">
            <a href="#menu2">경쟁력</a>
        </div>
        <div class="menu-wrap">
            <a href="#menu3">상권안내</a>
        </div>
        <div class="menu-wrap">
            <a href="#menu4">성공전략</a>
        </div>
        <div class="menu-wrap">
            <a href="#menu5">문의하기</a>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('.menu-open').click(function (){
            $(".sidebar-wrap").animate({
                width: 500
            });
        });
        $('.menu-close').click(function (){
            $(".sidebar-wrap").animate({
                width: 0
            });
        });

    });
</script>


<div class="content page1" id="menu1">
    <img class="logo" src="img/page1-top-logo.png">
    <img class="tit" src="img/page1-tit.png">
    <img class="bottom" src="img/page1-bottom.png">
    <img class="left" src="img/page1-logo.png">
    <img class="right" src="img/page1-right.png">
</div>
<div class="content page1-1"">
<img class="bg" src="img/veg-bg.png">
<img class="tit" src="img/page1-1-tit.png">
<div class="content-wrap">
    <img class="content-tit" src="img/page1-1-tit1.png">
    <div class="kit-wrap">
        <img class="" src="img/kit01.png">
        <img class="" src="img/kit02.png">
        <img class="" src="img/kit03.png">
        <img class="" src="img/kit04.png">
        <img class="" src="img/kit05.png">
        <img class="" src="img/kit06.png">
        <img class="" src="img/kit07.png">
        <img class="" src="img/kit08.png">
    </div>
</div>
<div class="content-wrap">
    <img class="content-tit" src="img/page1-1-tit2.png">
</div>
<div class="banchan-slide-wrap">
    <div class="banchan-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="img/banchan1.png"></div>
            <div class="swiper-slide"><img src="img/banchan2.png"></div>
            <div class="swiper-slide"><img src="img/banchan3.png"></div>
            <div class="swiper-slide"><img src="img/banchan4.png"></div>
            <div class="swiper-slide"><img src="img/banchan5.png"></div>
            <div class="swiper-slide"><img src="img/banchan6.png"></div>
            <div class="swiper-slide"><img src="img/banchan7.png"></div>
            <div class="swiper-slide"><img src="img/banchan9.png"></div>
            <div class="swiper-slide"><img src="img/banchan10.png"></div>
            <div class="swiper-slide"><img src="img/banchan11.png"></div>
        </div>
    </div>
</div>

<img class="sub-tit" src="img/page1-1-sub-tit.png">

<div class="content-wrap">
    <img class="content-tit" src="img/page1-1-tit3.png">
    <div class="cafe-wrap">
        <img class="" src="img/page1-1-cafe1.png">
        <img class="" src="img/page1-1-cafe2.png">
        <img class="" src="img/page1-1-cafe3.png">
        <img class="" src="img/page1-1-cafe4.png">
    </div>
</div>
<img class="bottom" src="img/page1-1-bottom-tit.png">
</div>
<div class="content page2" id="menu2">
    <div class="receipt-slide-wrap">
        <div class="receipt-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="img/phone-01.png"></div>
                <div class="swiper-slide"><img src="img/phone-02.png"></div>
                <div class="swiper-slide"><img src="img/phone-03.png"></div>
                <div class="swiper-slide"><img src="img/phone-04.png"></div>
                <div class="swiper-slide"><img src="img/phone-05.png"></div>
                <div class="swiper-slide"><img src="img/phone-06.png"></div>
            </div>
        </div>
    </div>
    <img class="tit" src="img/page2-tit.png">
    <div class="flex-container">
        <div class="flex-wrap">
            <img src="img/page2-img1.png">
            <img src="img/page2-img2.png">
        </div>
        <div class="flex-wrap">
            <img src="img/page2-img3.png">
            <img src="img/page2-img4.png">
        </div>
    </div>
    <img class="mt-icon" src="img/page2-mt.png">
</div>
<div class="content page3">
    <img class="tit" src="img/page3-tit.png">
    <img class="chart" src="img/page3-chart.png">
    <div class="flex-wrap">
        <img class="" src="img/page3-img1.png">
        <img class="" src="img/page3-img2.png">
        <img class="" src="img/page3-img3.png">
    </div>
    <div class="video-container">
        <div class="video-wrap">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/jIb_Lz8K6gU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <img class="cb-icon" src="img/page3-cb.png">
</div>
<div class="content page4">
    <img class="tit" src="img/page4-tit.png">
    <div class="menu-slide-wrap">
        <div class="menu-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="img/menu1.png"></div>
                <div class="swiper-slide"><img src="img/menu2.png"></div>
                <div class="swiper-slide"><img src="img/menu3.png"></div>
                <div class="swiper-slide"><img src="img/menu4.png"></div>
            </div>
        </div>
    </div>
    <img class="sub-tit" src="img/page4-tit2.png">
    <div class="review-slide-wrap">
        <div class="review-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="img/recipt0.png"></div>
                <div class="swiper-slide"><img src="img/recipt1.png"></div>
                <div class="swiper-slide"><img src="img/recipt2.png"></div>
                <div class="swiper-slide"><img src="img/recipt3.png"></div>
                <div class="swiper-slide"><img src="img/recipt4.png"></div>
            </div>
        </div>
    </div>
    <div class="flex-wrap">
        <img src="img/page4-naver1.png">
        <img src="img/page4-naver2.png">
    </div>
</div>
<div class="content page5" id="menu3">
    <img class="tit" src="img/page5-tit.png">

    <div class="img-wrap">
        <img class="p5-img" src="img/page5-img1.png">
        <img class="p5-img" src="img/page5-img2.png">
        <img class="p5-img" src="img/page5-img3.png">
    </div>
    <img class="bottom" src="img/page5-img4.png">
</div>
<div class="content page6">
    <div class="flex-wrap">
        <img src="img/page6-map1.png">
        <img src="img/page6-map2.png">
        <img src="img/page6-map3.png">
        <img src="img/page6-map4.png">
        <img src="img/page6-map5.png">
    </div>
    <img class="tit" src="img/page6-tit.png">
    <img class="pic" src="img/page6-pic.png"/>
</div>
<div class="content page7" id="menu4">
    <img class="tit" src="img/page7-tit.png"/>
    <img class="content-img" src="img/page7-img1.png"/>
    <img class="content-img" src="img/page7-img2.png"/>
    <img class="content-img" src="img/page7-img3.png"/>
    <img class="content-img" src="img/page7-img4.png"/>
    <img class="content-img" src="img/page7-img5.png"/>
</div>
<div class="content page8">
    <img class="tit" src="img/page8-tit.png"/>
    <img class="table" src="img/page8-table.png"/>
    <img class="chart" src="img/page8-chart.png"/>
</div>
<div class="content page9">
    <img class="tit" src="img/page9-img.png"/>
</div>

<form name="contact_form" id="contact_form" method="post" action="/contact_write.php" onsubmit="return FormSubmit();">
    <input type="hidden" name="writer_ip" value="<?= get_client_ip() ?>" />
    <input type="hidden" name="action" value="go">
    <div class="contact-container" id="menu5">
        <div class="contact-wrap">
            <div class="input-item">
                <div class="label-wrap">
                    <p>성함</p>
                </div>
                <div class="input-wrap">
                    <input type="text" name="name" required>
                </div>
            </div>
            <div class="input-item">
                <div class="label-wrap">
                    <p>연락처</p>
                </div>
                <div class="input-wrap">
                    <input type="text" name="phone" required>
                </div>
            </div>
            <div class="input-item">
                <div class="label-wrap">
                    <p>창업희망지역</p>
                </div>
                <div class="input-wrap">
                    <input type="text" name="location" required>
                </div>
            </div>
            <div class="input-item">
                <div class="label-wrap">
                    <p>희망창업비용</p>
                </div>
                <div class="input-wrap">
                    <input type="text" name="price" required>
                </div>
                <span class="sub">만원</span>
            </div>
            <div class="input-item">
                <div class="label-wrap">
                    <p>문의사항</p>
                </div>
                <div class="input-wrap">
                    <textarea name="contact_desc"></textarea>
                </div>
            </div>
        </div>
        <div class="agreement-wrap">
            <div class="agreement">
                <p class="tit">&#60;개인정보 취급방침&#62;</p>
                <p class="content">
                    작성하신 실명과 전화번호는 개인정보 보호법 제 15조 및 22조에 의거, 상담접수 및 서비스제공 용도로만 사용되며 랜딩접수가 진행되는기간 동안만 보관하게 됩니다.<br>
                    수집 개인정보는 이름 및 휴대전화 번호이며 랜딩접수 및 서비스제공의 목적으로만 사용됩니다.<br>
                    <br>
                    - 개인정보 수집, 이용 목적 : 랜딩접수 및 서비스제공<br>
                    - 수집하려는 개인정보 항목 : 이름, 휴대폰 번호<br>
                    - 개인정보의 보유 및 이용기간 : 랜딩페이지 사용 종료 후 , 서비스 안내 일주일 후 파기
                </p>
            </div>
            <div class="agree-wrap">
                <label>
                    <input type="checkbox" name="agree" required>
                    개인 정보 취급 방침에 동의
                </label>
            </div>
            <input type="submit" value="창업 문의하기" onclick="sendTo();"/>
            <div class="g-recaptcha" style="margin-top: 10px" data-sitekey="6LcsckgfAAAAANUAAKdtrsI1S-AaLZbhoPJLN41k"></div>
        </div>
    </div>
</form>

<!-- floating -->
<div class="floating-container">
    <div class="floating-wrap">
        <div class="right-wrap item">
            <div class="item-wrap" id="call" onclick="location.href='tel:031-932-2030'" onMouseDown="javascript:_PL('http://www.yevans.com/call.php');">
                <div class="icon-wrap">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="text-wrap">
                    <p>창업문의</p>
                    <p>1668-1350</p>
                </div>
            </div>
        </div>
        <div class="left-wrap item">
            <div class="item-wrap" onclick="location.href='#menu5   '">
                <div class="icon-wrap">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div class="text-wrap">
                    <p>24시간 접수</p>
                    <p>가맹상담 신청</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-container">
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="100%" height="315" src="https://www.youtube.com/embed/XcYxluLQwxE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-container">
    <div class="modal fade" id="agreeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">이용약관</h5>
                </div>
                <div class="modal-body">
                    <div>
                        [주식회사 팔공티] 이하 회사의 개인정보 수 및 활용에 관한 내용<br>
                        개인정보 수집 및 이용 개인정보 수집주체 : 주식회사 팔공티<br>
                        개인정보 수집항목 : 이름, 연락처, 창업희망지역, 문의사항, IP 등 개인을 식별할 수 있는 기타 정보 포함<br>
                        개인정보 수집 및 이용목적 : 마케팅<br>
                        개인정보 보유 및 이용기간 : 수집일로부터 3년 (고객 동의 철회 시 지체없이 파기)
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">



    $(document).ready(function(){

        var $w = $(window),
            footerHei = $('.contact-wrap').outerHeight(),
            $floating = $('.floating-container');

        $w.on('scroll', function() {

            var sT = $w.scrollTop();
            var val = $(document).height() - $w.height() - footerHei;

            if (sT >= val)
                $floating.fadeOut('600');
            else
                $floating.fadeIn('600');

        });

        // popup //
        var noticeCookie = getCookie("name");  // 쿠키 가져오기
        if (noticeCookie == "value"){
            // 팝업창 띄우기

        }


    });
    $(function(){

        var banchan = new Swiper(".banchan-container", {
            slidesPerView: 3,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0:{
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                768:{
                    slidesPerView: 5,
                    spaceBetween: 20
                },
                1024:{
                    slidesPerView: 6,
                    spaceBetween: 20
                },
            }
        });

        var receiptSlide = new Swiper(".receipt-container", {
            slidesPerView: 3,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0:{
                    slidesPerView: 2.8,
                    spaceBetween: 10
                },
                768:{
                    slidesPerView: 3.8,
                    spaceBetween: 20
                },
                1024:{
                    slidesPerView: 5.8,
                    spaceBetween: 20
                },
            }
        });

        var menuSlide = new Swiper(".menu-container", {
            slidesPerView: 3,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0:{
                    slidesPerView: 1.7,
                    spaceBetween: 10
                },
                768:{
                    slidesPerView: 2.7,
                    spaceBetween: 20
                },
                1024:{
                    slidesPerView: 3.7,
                    spaceBetween: 20
                },
            }
        });
        var reviewSlide = new Swiper(".review-container", {
            slidesPerView: 3,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0:{
                    slidesPerView: 2.7,
                    spaceBetween: 10
                },
                768:{
                    slidesPerView: 4.7,
                    spaceBetween: 20
                },
                1024:{
                    slidesPerView: 5.7,
                    spaceBetween: 20
                },
            }
        });


    });


    //리캡쳐
    function FormSubmit() {
        if (grecaptcha.getResponse() == "") {
            alert("로봇이 아닙니다를 체크해주세요.");
            return false;
        } else {
            return true;
        }
    }


    //popup
    function setCookie(name, value, expiredays){
        var today = new Date();
        today.setDate(today.getDate() + expiredays);
        document.cookie = name + '=' + escape(value) + '; expires=' + today.toGMTString();
    }

    function getCookie(name) {
        var cookie = document.cookie;
        if (document.cookie != "") {
            var cookie_array = cookie.split("; ");
            for ( var index in cookie_array) {
                var cookie_name = cookie_array[index].split("=");
                if (cookie_name[0] == "mycookie") {
                    return cookie_name[1];
                }
            }
        }
        return;
    }
    $(".modal-today-close").click(function() {
        var popupId = $(this).siblings('.pid').val();
        $(".popup"+popupId).modal("hide");
        setCookie("mycookie", 'popupEnd', 1);
    });

    var checkCookie = getCookie("mycookie");



    // close layer popup
    function hidePopup(popupType) {
        var showChk = $('#show-chk-' + popupType).is(':checked');
        if (showChk) {
            setCookie('popup'+popupType, 'Y' , 1 );
        }
        $('.popup' + popupType).fadeOut();
    }

    //유튜브 팝업
    $('.video').click(function(){
        $('#videoModal').modal('show');
    });

    //상담 내역 팝업
    $('.open-agree').click(function(){
        $('#agreeModal').modal('show');
    });

</script>

<!--문자 알림-->
<script type = "text/javascript">
    function setPhoneNumber(val){
        var numList = val.split("-");
        document.smsForm.sphone1.value=numList[0];
        document.smsForm.sphone2.value=numList[1];
        if(numList[2] != undefined){
            document.smsForm.sphone3.value=numList[2];
        }
    }
    function loadJSON(){
        var data_file = "message_send2.php";
        var http_request = new XMLHttpRequest();
        try{
            // Opera 8.0+, Firefox, Chrome, Safari
            http_request = new XMLHttpRequest();
        }catch (e){
            // Internet Explorer Browsers
            try{
                http_request = new ActiveXObject("Msxml2.XMLHTTP");

            }catch (e) {

                try{
                    http_request = new ActiveXObject("Microsoft.XMLHTTP");
                }catch (e){
                    // Eror
                    alert("지원하지 않는브라우저!");
                    return false;
                }

            }
        }
        http_request.onreadystatechange = function(){
            if (http_request.readyState == 4  ){
                // Javascript function JSON.parse to parse JSON data
                var jsonObj = JSON.parse(http_request.responseText);
                if(jsonObj['result'] == "Success"){
                    var aList = jsonObj['list'];
                    var selectHtml = "<select name=\"sendPhone\" onchange=\"setPhoneNumber(this.value)\">";
                    selectHtml += "<option value='' selected>발신번호를 선택해주세요</option>";
                    for(var i=0; i < aList.length; i++){
                        selectHtml += "<option value=\"" + aList[i] + "\">";
                        selectHtml += aList[i];
                        selectHtml += "</option>";
                    }
                    selectHtml += "</select>";
                    document.getElementById("sendPhoneList").innerHTML = selectHtml;
                }
            }
        }

        http_request.open("GET", data_file, true);
        http_request.send();
    }

</script>

<!-- 쳇봇 -->
<!-- CLOUDTURING -->
<script>
    window.dyc = {
        chatbotUid: "8a010adf4847bdbc"
    };
</script>
<script async src="https://cloudturing.chat/v1.0/chat.js"></script>
<!-- End CLOUDTURING -->

<?php
include_once('tale.php');
?>
