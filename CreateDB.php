<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--	<meta charset="UTF-8">-->
<!--	<title>DB Init</title>-->
<!--</head>-->
<!--<body>-->
<!--<table>-->
<!--	<tr>-->
<!--		<td>-->
<!--			Start initializing DB. Are you sure?-->
<!--		</td>-->
<!--		<td>-->
<!--		<button onclick="confirm()">Confirm</button>-->
<!--		</td>-->
<!--	</tr>-->
<!--	<tr>-->
<!--		<td>-->
<!---->
<!--		</td>-->
<!--	</tr>-->
<!--</table>-->
<!---->
<!---->
<!---->
<!--</body>-->
<!--</html>-->
<?php

	define('DB_HOST', 'localhost');
	define('DB_USER', 'testcoe');
	define('DB_PASS', 'testcoe');
	define('DB_NAME', 'testcoe');

	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($dbc,"set names utf8");

//$T_Project_Name = project;
$T_Project_Query = "select Project_Name from `project`";
//$T_Project_Results = mysqli_query($dbc, $T_Project_Query);

if (!mysqli_query($dbc, $T_Project_Query)) {
    echo "It Seems some data in DB, are you sure to init them?";

} else {
	//$T_Build_Name = build;
	//$T_Build_Data = Build_Data;
    $T_Project_Drop = "DROP TABLE IF EXISTS `project`";
    $T_Build_Drop = "DROP TABLE IF EXISTS `build`";
	$T_Build_Data_Drop = "DROP TABLE IF EXISTS `Build_Data`";
	mysqli_query($dbc, $T_Project_Drop);
    mysqli_query($dbc, $T_Build_Drop);
    mysqli_query($dbc, $T_Build_Data_Drop);
    $T_Project_Create = "CREATE TABLE `project` (
                          `Id` int(11) NOT NULL,
                          `Project_Name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $T_Build_Create ="CREATE TABLE `build` (
                          `Id` int(11) NOT NULL,
                          `Project_Id` int(11) NOT NULL,
                          `Build_Name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $T_Build_Data_Create = "CREATE TABLE `Build_Data` (
  							  `Id` int(11) NOT NULL,
                              `Build_Id` int(11) NOT NULL,
                              `Start_Time` date NOT NULL,
                              `End_Time` date NOT NULL,
                              `Regular` int(11) DEFAULT '0',
                              `Regular_Work_Hour_AVG` float DEFAULT '0',
                              `Intern` int(11) DEFAULT '0',
                              `Intern_Work_Hour_AVG` float DEFAULT '0',
                              `Case_Plan` int(11) DEFAULT '0',
                              `Case_Run` int(11) DEFAULT '0',
                              `Defect_Submit` int(11) DEFAULT '0',
                              `Defect_Critical` int(11) DEFAULT '0',
                              `Defect_Major` int(11) DEFAULT '0',
                              `Defect_Minor` int(11) DEFAULT '0',
                              `Defect_Verified` int(11) DEFAULT '0',
                              `Defect_Reopen` int(11) DEFAULT '0',
                              `Defect_Closed` int(11) DEFAULT '0',
                              `Defect_Rejected` int(11) DEFAULT '0',
                              `Notes` text,
                              `Data_Inputer` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
							  PRIMARY KEY (`Id`),
							  KEY `Build_Id` (`Build_Id`)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $T_Project_Index = "ALTER TABLE `project`
                          ADD PRIMARY KEY (`Id`),
                          ADD UNIQUE KEY `Project_Name` (`Project_Name`);
                          ALTER TABLE `project`
                          MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
                          COMMIT;";
    $T_Build_Index = "ALTER TABLE `build`
                          ADD PRIMARY KEY (`Id`),
                          ADD UNIQUE KEY `Project_Id` (`Project_Id`,`Build_Name`);
                          ALTER TABLE `build`
                          MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
                          COMMIT;";
    $T_Build_Data_Index ="ALTER TABLE `build_data`
                              ADD PRIMARY KEY (`Id`),
                              ADD KEY `Build_Id` (`Build_Id`);
                              ALTER TABLE `build_data`
                              MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
                              COMMIT;";

    mysqli_query($dbc, $T_Project_Create);
    mysqli_query($dbc, $T_Build_Create);
    mysqli_query($dbc, $T_Build_Data_Create);
    mysqli_query($dbc, $T_Project_Index);
    mysqli_query($dbc, $T_Build_Index);
    mysqli_query($dbc, $T_Build_Data_Index);

};
mysqli_close($dbc);
echo "DB init finished";

?>