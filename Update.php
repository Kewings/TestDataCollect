<?php
/**
 * Created by PhpStorm.
 * User: E567802
 * Date: 6/29/2017
 * Time: 18:03
 */
require "Define.php";

$id = trim($_REQUEST['thisid']);
$thisclass = trim($_REQUEST['thisclass']);
$thisvalue= trim($_REQUEST['thisvalue']);
#error_log($id."###\n" ,3 ,"sql.log");
#error_log($thisclass."###\n" ,3 ,"sql.log");
#error_log($thisvalue."###\n" ,3 ,"sql.log");
if (substr_count($thisclass," ")>0){
    $thisclass=str_replace(" ","",$thisclass);
}
if (substr_count($thisclass,"input")>0){
    $thisclass=str_replace("input","",$thisclass);
}
$update_sql = "update Build_Data set $thisclass='$thisvalue' where Build_Id='$id'";
error_log($update_sql."###\n" ,3 ,"sql.log");
if (!mysqli_query($dbc,$update_sql)) {
    printf ("Error Message: %s\n", mysqli_error($dbc));
}
#header("refresh:0;url=SelectData.php");


/*
// include_once("connect.php"); //连接数据库
$id=$_POST['id'];
$field=$_POST['field'];  //获取前端提交的字段名
$val=$_POST['value']; //获取前端提交的字段对应的内容
$val = htmlspecialchars($val, ENT_QUOTES); //过滤处理内容

// $time=date("Y-m-d H:i:s"); //获取系统当前时间
if(empty($val)){
    echo "please input a value";
}else{
    //更新字段信息
    $query=mysqli_query($dbc,"update Build_Data set $field = '$val' where id=$id");
    if(!$query){
        printf ("Error Message:%s\n",mysqli_error($dbc));
    }
}
*/

?>