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
    }


    // 팝업 출력하기 위한 sql문
    $popup_sql = "select * from popup_tbl order by id";
    $popup_stt=$db_conn->prepare($popup_sql);
    $popup_stt->execute();
?>
<link rel="stylesheet" type="text/css" href="/css/index.css" rel="stylesheet" />	
<link rel="stylesheet" type="text/css" href="/css/reset.css" rel="stylesheet" />	


    <!-- layer popup -->
    <?
        while($popup=$popup_stt->fetch()){
    ?>
    <div class="layer-popup popup<?= $popup['id'] ?>" id="popup<?= $popup['id'] ?>" style="display: block; width: <?= $popup['width'] ?>px; height: <?= $popup['height'] ?>px;">
		<button type="button" class="close-popup" onclick="hidePopup('<?= $popup['id'] ?>');"><i class="fas fa-times"></i></button>
			<img src="/data/popup/<?= $popup['file_name'] ?>" style="height:calc(<?= $popup['height'] ?>px - 36px);" alt="<?= $popup['popup_name'] ?>">
		<div class="show-chk-wrap">
			<input id="show-chk-<?= $popup['id'] ?>" type="checkbox">
			<label for="show-chk-<?= $popup['id'] ?>">24시간동안 보지않기</label>
		</div>
	</div>
    <? } ?>

    <div class="page1 container-fluid">
        <img src="/img/page1_text.png">
    </div>
    <div class="page2">
        <img src="/img/page2_img.png">
    </div>
    <div class="page3">
        <img class="mobile" src="/img/page3_img_mo.png">
    </div>
    <!-- slide -->
    <div class="page4">
        <img class="title-img" src="/img/page4_title.png">
        <div class="slide-area">
            <div class="reaction-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/img/reaction_slide1.png"></div>
                    <div class="swiper-slide"><img src="/img/reaction_slide2.png"></div>
                    <div class="swiper-slide"><img src="/img/reaction_slide3.png"></div>
                    <div class="swiper-slide"><img src="/img/reaction_slide4.png"></div>
                    <div class="swiper-slide"><img src="/img/reaction_slide5.png"></div>
                </div>
                <div class="swiper-button-next reaction-next"></div>
	            <div class="swiper-button-prev reaction-prev"></div>
            </div>
        </div>
    </div>
    <!-- slide -->
    <div class="page5">
        <img class="title-img" src="/img/page5_title.png">
        <div class="slide-area">
            <div class="me-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/img/page5_slide1.png"></div>
                    <div class="swiper-slide"><img src="/img/page5_slide2.png"></div>
                    <div class="swiper-slide"><img src="/img/page5_slide3.png"></div>
                </div>
                <div class="swiper-button-next me-next"></div>
	            <div class="swiper-button-prev me-prev"></div>
            </div>
        </div>
    </div>
    <div class="page6">
        <img src="/img/page6_img.png">
    </div>
    
    <div class="page7">
        <div class="slide">
            <div class="slide-area">
                <div class="slide-container brand-story1-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="/img/brand_story_slide1.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide2.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide3.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide4.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide5.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide6.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide7.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide8.png"></div>
                    </div>
                </div>
                <div class="slide-container brand-story2-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="/img/brand_story_slide9.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide10.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide11.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide12.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide13.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide14.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide15.png"></div>
                        <div class="swiper-slide"><img src="/img/brand_story_slide16.png"></div>
                    </div>
                </div>
                <div class="swiper-button-next brand-story-next"></div>
                <div class="swiper-button-prev brand-story-prev"></div>
            </div>
        </div>
    </div>
    <div class="page8">
        <img class="title-img" src="/img/page8_text_img.png"> 
        <div class="slide-area">
            <div class="brand-page-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/img/brand-page-slide1.png"></div>
                    <div class="swiper-slide"><img src="/img/brand-page-slide2.png"></div>
                    <div class="swiper-slide"><img src="/img/brand-page-slide3.png"></div>
                    <div class="swiper-slide"><img src="/img/brand-page-slide4.png"></div>
                    <div class="swiper-slide"><img src="/img/brand-page-slide5.png"></div>
                    <div class="swiper-slide"><img src="/img/brand-page-slide6.png"></div>
                    <div class="swiper-slide"><img src="/img/brand-page-slide7.png"></div>
                    <div class="swiper-slide"><img src="/img/brand-page-slide8.png"></div>
                    <div class="swiper-slide"><img src="/img/brand-page-slide9.png"></div>
                </div>
                <div class="swiper-button-next brand-page-next"></div>
	            <div class="swiper-button-prev brand-page-prev"></div>
            </div>
        </div>
    </div>
    <div class="page9">
        <img class="title" src="img/page9_title_img.png">
        <div class="na-wrap">
            <div class="img-wrap">
                <img src="/img/page9_text1_img.png">
            </div>
        </div>
        <img class="mobile" src="/img/page9_na_img_mo.png">
        <div class="da-wrap">
            <div class="img-wrap">
                <img src="/img/page9_text2_img.png">
            </div>
        </div>
        <img class="mobile" src="/img/page9_da_img_mo.png">
    </div>
    <div class="page10">
        <img src="/img/page10_img.png"> 
    </div>
    <div class="page11">
        <div class="line-wrap">
            <img src="/img/page11_line.png">
        </div>
        <div class="content-wrap">
            <img src="/img/page11_text.png">
        </div>
    </div>
    <div class="page12">
        <img class="tilte-img" src="/img/page12_title.png"> 

        <!-- rolling banner -->
        <ul class="infiniteslide">
            <li>
                <img src="/img/brand-rolling.png" alt="" />
            </li>
            <li>
                <img src="/img/brand-rolling.png" alt="" />
            </li>
        </ul>
    </div>
    <div class="contact-wrap">
        <img src="/img/contact-title.png">

        <form name="contact_form" id="contact_form" method="post" action="/contact_write.php">
            <input type="hidden" name="writer_ip" value="<?= get_client_ip() ?>" />
            <div class="input-wrap">
                <input type="text" name="name" placeholder="업체명" required>
            </div>
            <div class="input-wrap">
                <input type="text" name="phone" placeholder="전화번호" required>
            </div>
            <div class="check-wrap">
                <label class="float-left">
                    <input type="checkbox" name="contact_type" value="1">
                    무료 상담
                </label>
                <label class="float-right">
                    <input type="checkbox" name="contact_type" value="2">
                    유료 컨설팅(가격협의)
                </label>
            </div>
            <div class="submit-wrap">
                <input type="submit" value="상담신청" />
            </div>
        </form>
    </div>

    <!-- floating -->
    <div class="floating-container">
        <div class="floating-wrap">
            <div class="floating-left">
                <img src="/img/floating-text.png">
            </div>
            <div class="floating-contact">
                <img src="/img/floating-icon.png">
                <form name="contact_form" id="contact_form" method="post" action="/contact_write.php">
                    <input type="hidden" name="writer_ip" value="<?= get_client_ip() ?>" />
                    <div class="form-wrap">
                        <div class="input-wrap">
                            <input type="text" name="name" placeholder="업체명" required>
                        </div>
                        <div class="input-wrap">
                            <input type="text" name="phone" placeholder="전화번호" required>
                        </div>
                        <div class="check-wrap">
                            <label class="float-left">
                                <input type="checkbox" name="contact_type" value="1">
                                무료 상담
                            </label>
                            <label class="float-right">
                                <input type="checkbox" name="contact_type" value="2">
                                유료 컨설팅(가격협의)
                            </label>
                        </div>
                        <div class="submit-wrap">
                            <input type="submit" value="상담신청" />
                        </div>
                    </div>
                </form>
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
    });
    $(function(){

        $('.infiniteslide').infiniteslide({
            pauseonhover: false,
            speed: 100,
            direction: 'right'
        });

        var reactionSlide = new Swiper(".reaction-container", {
            slidesPerView: 3,
            spaceBetween: 20,
            navigation : {
                nextEl : '.reaction-next', // 다음 버튼 클래스명
                prevEl : '.reaction-prev', // 이번 버튼 클래스명
            },
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0:{
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                768:{
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                1024:{
                    slidesPerView: 3,
                    spaceBetween: 20
                },
            }     
        });

        var meSlide = new Swiper(".me-container", {
            slidesPerView: 3,
            navigation : {
                nextEl : '.me-next', // 다음 버튼 클래스명
                prevEl : '.me-prev', // 이번 버튼 클래스명
            },
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0:{
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                768:{
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                1024:{
                    slidesPerView: 3
                },
            }     
        });

        var brandPageSlide = new Swiper(".brand-page-container", {
            slidesPerView: 6,
            spaceBetween: 20,
            navigation : {
                nextEl : '.brand-page-next', // 다음 버튼 클래스명
                prevEl : '.brand-page-prev', // 이번 버튼 클래스명
            },
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0:{
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                600:{
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                768:{
                    slidesPerView: 4,
                    spaceBetween: 10
                },
                1100:{
                    slidesPerView: 5,
                    spaceBetween: 20
                },
                1400:{
                    slidesPerView: 6,
                    spaceBetween: 20
                }
            }     
        });
        var meSlide = new Swiper(".brand-story1-container", {
            slidesPerView: 4,
            navigation : {
                nextEl : '.brand-story-next', // 다음 버튼 클래스명
                prevEl : '.brand-story-prev', // 이번 버튼 클래스명
            },
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0:{
                    slidesPerView: 2,
                },
                768:{
                    slidesPerView: 3,
                },
                1024:{
                    slidesPerView: 4
                },
            }     
        });
        var meSlide = new Swiper(".brand-story2-container", {
            slidesPerView: 4,
            navigation : {
                nextEl : '.brand-story-next', // 다음 버튼 클래스명
                prevEl : '.brand-story-prev', // 이번 버튼 클래스명
            },
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0:{
                    slidesPerView: 2,
                },
                768:{
                    slidesPerView: 3,
                },
                1024:{
                    slidesPerView: 4
                },
            }     
        });
    });

    //popup
    //쿠키설정    
    function setCookie( name, value, expiredays ) {
        var todayDate = new Date();
        todayDate.setDate( todayDate.getDate() + expiredays );
        document.cookie = name + '=' + escape( value ) + '; path=/; expires=' + todayDate.toGMTString() + ';'
    }
    //쿠키 불러오기
    function getCookie(name) 
    { 
        var obj = name + "="; 
        var x = 0; 
        while ( x <= document.cookie.length ) 
        { 
            var y = (x+obj.length); 
            if ( document.cookie.substring( x, y ) == obj ) 
            { 
                if ((endOfCookie=document.cookie.indexOf( ";", y )) == -1 ) 
                    endOfCookie = document.cookie.length;
                return unescape( document.cookie.substring( y, endOfCookie ) ); 
            } 
            x = document.cookie.indexOf( " ", x ) + 1; 
            
            if ( x == 0 ) break; 
        } 
        return ""; 
    }

    // close layer popup
    function hidePopup(popupType) {
        var showChk = $('#show-chk-' + popupType).is(':checked');
        if (showChk) {
            setCookie('popup'+popupType, 'Y' , 1 );
        }
            $('.popup' + popupType).fadeOut();
        }


</script>



<?php
    include_once('tale.php');
?>