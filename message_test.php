<html>
<head>
    <title>sms - php </title>
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
</head>
<body onload="loadJSON()">
<form method="post" name="smsForm" action="message_send.php">
    <input type="hidden" name="action" value="go">

    발송타입 <span><input type="radio" name="smsType" value="S">단문(SMS)</span><span><input type="radio" name="smsType" value="L">장문(LMS)</span> <br />
    제목 : <input type="text" name="subject" value="제목"> 장문(LMS)인 경우(한글30자이내)<br />
    전송메세지 <textarea name="msg" cols="30" rows="10" style="width:455px;">내용입력</textarea>
    <br /><br /><p>단문(SMS) : 최대 90byte까지 전송할 수 있으며, 잔여건수 1건이 차감됩니다. <br />
        장문(LMS) : 한번에 최대 2,000byte까지 전송할 수 있으며 1회 발송당 잔여건수 3건이 차감됩니다.
    </p>
    <br />받는 번호 <input type="text" name="rphone" value="010-2231-4816"> 예) 011-011-111 , '-' 포함해서 입력.
    <br />

    <br />return url <input type="text" name="returnurl" maxlength="64" value="" >
    <br /> test flag <input type="text" name="testflag" maxlength="1" value="Y"> 예) 테스트시: Y

    <br>
    <input type="submit" value="전송">
    <br/>이통사 정책에 따라 발신번호와 수신번호가 같은 경우 발송되지 않습니다.
</form>
</body>
</html>

<input type="hidden" name="action" value="go">
<input type="hidden" name="smsType" value="S">
<input type="hidden" name="subject" value="새로운 문의가 등록되었습니다.">
<input type="hidden" name="msg" value="">

