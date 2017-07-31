<?php
/**
 * Created by PhpStorm.
 * User: e567802
 * Date: 6/27/2017
 * Time: 13:19
 */
    require "Define.php";

    $Project_Name = $_POST["Project_Name"];
    if ($Project_Name == null) {
 #       echo "please input a project name";
        header("refresh:2;url=SubmitProject.php");
        print("please input a project name");
        exit;
    }

    $Check_Project = "select * from project where Project_Name = '$Project_Name' ";
    $SQL_Check = mysqli_query($dbc, $Check_Project);
    if (mysqli_num_rows($SQL_Check) > 0) {
        header("refresh:2;url=SubmitProject.php");
        echo "This project already existed.";
        exit;
    }
    else {
        $Insert_Project = "INSERT INTO `project`(`Project_Name`) VALUES ('$Project_Name')";
        if (!mysqli_query($dbc, $Insert_Project)) {
            printf ("Error Message: %s\n", mysqli_error($dbc));
            mysqli_close($dbc);
            exit;
        }
    }
    mysqli_close($dbc);

    header("refresh:0;url=SelectProject.php");
?>