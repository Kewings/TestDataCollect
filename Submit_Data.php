<?php
/**
 * Created by PhpStorm.
 * User: e567802
 * Date: 6/27/2017
 * Time: 18:18
 */
require "Define.php";

$T_Project_Name = $_POST["T_Project_Name"];
$T_Build_Name = $_POST["T_Build_Name"];
$T_Build_Start_Time = $_POST["T_Build_Start_Time"];
$T_Build_End_Time = $_POST["T_Build_End_Time"];
$T_Regular_NO = $_POST["T_Regular_NO"];
$T_Regular_AVG_WH = $_POST["T_Regular_AVG_WH"];
$T_Intern_NO = $_POST["T_Intern_NO"];
$T_Intern_AVG_WH = $_POST["T_Intern_AVG_WH"];
$T_Case_Plan = $_POST["T_Case_Plan"];
$T_Case_Run = $_POST["T_Case_Run"];
$T_Defect_Sumbit = $_POST["T_Defect_Sumbit"];
$T_Defect_Critical = $_POST["T_Defect_Critical"];
$T_Defect_Major = $_POST["T_Defect_Major"];
$T_Defect_Minor = $_POST["T_Defect_Minor"];
$T_Defect_Verified = $_POST["T_Defect_Verified"];
$T_Defect_Reopen = $_POST["T_Defect_Reopen"];
$T_Defect_Closed = $_POST["T_Defect_Closed"];
$T_Defect_Rejected= $_POST["T_Defect_Rejected"];
$T_Notes= $_POST["T_Notes"];
$T_Data_Inputer= $_POST["T_Data_Inputer"];

if ($T_Build_Name == null) {
    header("refresh:3;url=Submit_Data_Table.php");
    echo "Please input Build Name!";
    exit;
}

$Get_ProjectId = "select id from project where Project_Name= '$T_Project_Name'";
$S_Project_Id = mysqli_query($dbc, $Get_ProjectId);
$R_Project_Id = mysqli_fetch_assoc($S_Project_Id);
$T_Project_Id = $R_Project_Id["id"];

$Insert_Build_Version = "INSERT INTO `build`(`Project_Id`, `Build_Name`) 
VALUES ('$T_Project_Id','$T_Build_Name')";
if (!mysqli_query($dbc, $Insert_Build_Version)) {
    printf ("Error Message:%s\n",mysqli_error($dbc));
    mysqli_close($dbc);
    exit;
}
$Get_Build_Id = "select Id from build where Build_Name='$T_Build_Name' and Project_Id='$T_Project_Id'";
$S_Build_Id = mysqli_query($dbc,$Get_Build_Id);
$R_Build_Id = mysqli_fetch_assoc($S_Build_Id);
$T_Build_Id = $R_Build_Id["Id"];


$Insert_Build_Data = "insert into `Build_Data`(
                          `Build_Id`,
                          `Start_Time`, 
                          `End_Time`,
                          `Regular`, 
                          `Regular_Work_Hour_AVG`, 
                          `Intern`, 
                          `Intern_Work_Hour_AVG`, 
                          `Case_Plan`, 
                          `Case_Run`, 
                          `Defect_Submit`, 
                          `Defect_Critical`,
                          `Defect_Major`,
                          `Defect_Minor`,
                          `Defect_Verified`, 
                          `Defect_Reopen`, 
                          `Defect_Closed`, 
                          `Defect_Rejected`,
                          `Notes`,
                          `Data_Inputer`) 
                          VALUES (
                          '$T_Build_Id',
                          '$T_Build_Start_Time',
                          '$T_Build_End_Time',
                          '$T_Regular_NO', 
                          '$T_Regular_AVG_WH', 
                          '$T_Intern_NO', 
                          '$T_Intern_AVG_WH', 
                          '$T_Case_Plan', 
                          '$T_Case_Run', 
                          '$T_Defect_Sumbit', 
                          '$T_Defect_Critical',
                          '$T_Defect_Major',
                          '$T_Defect_Minor',
                          '$T_Defect_Verified', 
                          '$T_Defect_Reopen', 
                          '$T_Defect_Closed', 
                          '$T_Defect_Rejected',
                          '$T_Notes',
                          '$T_Data_Inputer')";

if (!mysqli_query($dbc,$Insert_Build_Data)) {
    printf ("Error Message:%s\n",mysqli_error($dbc));
    $Delete_Build_Version="delete from `build` where Project_Id='$T_Project_Id' and Build_Name='$T_Build_Name'";
    mysqli_query($dbc, $Delete_Build_Version);
    mysqli_close($dbc);
    exit;
}
header("refresh:0;url=SelectData.php");


?>