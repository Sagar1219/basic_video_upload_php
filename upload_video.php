<?php

include_once __DIR__.'/inc/FileUtility.php';
include_once(__DIR__.'/getid3/getid3.php');

ini_set('display_errors', 'On');
error_reporting(-1);

$error = '';
$result = '';
if(isset($_POST['submit'])){
    if(!$_FILES['file']['error']){
	$tmp_name = $_FILES['file']['tmp_name'];
        $type = $_FILES['file']['type'];
        $obj = new FileUtility();
        $result = $obj->upload($tmp_name);
        if(empty($result)){
            $error = "Error Occured While uploading File to destination. Try Again.";
        }else{
            $getID3 = new getID3;
            $fileInfo = $getID3->analyze($result['complete_path']);
            $fileSize = $fileInfo['playtime_string'];
            $format = $fileInfo['video']['dataformat'];
            unset($fileInfo);
        }
    }else{
        $error = "Error Occured While uploading File. Try again";
    }
}
require_once __DIR__.'/inc/Page.inc.php';

?>



