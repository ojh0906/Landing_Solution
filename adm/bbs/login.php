<?php
    include_once('../head.php');
?>
    <link rel="stylesheet" type="text/css" href="../css/login.css" rel="stylesheet" />

<body>
    <div class="container">
        <div class="inner">
            <p class="warning">Staff Only</p>
            <div class="login-form">
                <form name="login_form" id="login_form" method="post" action="../ajax/login_check.php">
                   <p class="label">아이디</p>
                   <input type="text" name="login_id" placeholder="Staff ID" />
                   <p class="label">패스워드</p>
                   <input type="password" name="password" placeholder="Staff PW" autocomplete="off"/>
                   <input type="submit" value="로그인" />
                </form>
            </div>
        </div>
    </div>

</body>

</html>
