<?
    include_once('../head.php');

    $site_title = $_POST['site_title'];
    $site_description = $_POST['site_description'];
    $google_analytics = $_POST['google_analytics'];
    $naver_webmaster = $_POST['naver_webmaster'];


    $modify_sql = "update site_setting_tbl
    set 
    site_title = '$site_title',
    site_description = '$site_description',
    google_analytics = '$google_analytics',
    naver_webmaster = '$naver_webmaster'
    where
    id = 1";

    $updateStmt = $db_conn->prepare($modify_sql);
    $updateStmt->execute();

    $count = $updateStmt->rowCount();

    echo "<script type='text/javascript'>";
    echo "alert('등록 되었습니다.'); location.href='../config_form.php?menu=2&'";
    echo "</script>";

?>

