<?php
/**
 * Created by PhpStorm.
 * User: yayak
 * Date: 18/10/2019
 * Time: 23:19
 */

include 'ChromePhp.php';


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        ChromePhp::log("tous et bon");
    } else {
        ChromePhp::log("rien ne marchr");
    }
}