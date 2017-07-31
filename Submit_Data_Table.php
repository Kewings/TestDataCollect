<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Data</title>
    <link rel="stylesheet" href="css/w3.css">
</head>
<body>
<div align="center">
<Table class="w3-table-all">
<form method="post" action="Submit_Data.php">
    <tr>
        <td>Project Name</td>
        <td>Build Name</td>
        <td>Build Started Time</td>
        <td>Build End Time</td>
    </tr>
    <tr>
        <td>
            <select name="T_Project_Name">
                <?php
                require_once "Define.php";
                $Project_Name = "select Project_Name from project";
                $Project_Result = mysqli_query($dbc, $Project_Name);
                while ($result = mysqli_fetch_row($Project_Result)) {
                    $S_Project_Name = $result[0];
                    echo "$S_Project_Name";
                    echo "<option value='$S_Project_Name'> $S_Project_Name </option>";
                }
                ?>
            </select>
        </td>
     <!-- <input type="text" name="T_Project_Name"><span class="error">*</span></td> -->
        <td><input class="w3-input w3-border" type="text" name="T_Build_Name"><span class="error">*</span></td>
        <td> <input class="w3-input w3-border" type="date" value="<?= isset($_POST['T_Build_Start_Time']) ? $_POST['T_Build_Start_Time'] : ''; ?>" name="T_Build_Start_Time"><span class="error">*</span></td>
        <td> <input class="w3-input w3-border" type="date" value="<?= isset($_POST['T_Build_End_Time']) ? $_POST['T_Build_End_Time'] : ''; ?>" name="T_Build_End_Time"><span class="error">*</span></td>
<!--        <td><input type="text" name="T_Build_Start_Time"><span class="error">*</span></td>
        <td><input type="text" name="T_Build_End_Time"><span class="error">*</span></td>
        -->
    </tr>
    <tr>
        <td>Regular No.</td>
        <td>Regular Average Spend Hours</td>
        <td>Intern NO.</td>
        <td>Intern Average Spend Hours</td>
    </tr>
    <tr>
        <td><input class="w3-input w3-border" type="text" name="T_Regular_NO"></td>
        <td><input class="w3-input w3-border" type="text" name="T_Regular_AVG_WH"></td>
        <td><input class="w3-input w3-border" type="text" name="T_Intern_NO"></td>
        <td><input class="w3-input w3-border" type="text" name="T_Intern_AVG_WH"></td>
    </tr>
    <tr>
        <td>Planned Cases</td>
        <td>Actual Executed Cases</td>
    </tr>
    <tr>
        <td><input class="w3-input w3-border" type="text" name="T_Case_Plan"></td>
        <td><input class="w3-input w3-border" type="text" name="T_Case_Run"></td>
    </tr>
    <tr>
        <td>Submitted Defects</td>
        <td>Critical Defects</td>
        <td>Major Defects</td>
        <td>Minor Defects</td>
    </tr>
    <tr>
        <td><input class="w3-input w3-border" type="text" name="T_Defect_Sumbit"></td>
        <td><input class="w3-input w3-border" type="text" name="T_Defect_Critical"></td>
        <td><input class="w3-input w3-border" type="text" name="T_Defect_Major"></td>
        <td><input class="w3-input w3-border" type="text" name="T_Defect_Minor"></td>
    </tr>
    <tr>
        <td>Planned To Verify Defects</td>
        <td>Reopen Defects</td>
        <td>Closed Defects</td>
        <td>Rejected Defects</td>
    </tr>
    <tr>
        <td><input class="w3-input w3-border" type="text" name="T_Defect_Verified"></td>
        <td><input class="w3-input w3-border" type="text" name="T_Defect_Reopen"></td>
        <td><input class="w3-input w3-border" type="text" name="T_Defect_Closed"></td>
        <td><input class="w3-input w3-border" type="text" name="T_Defect_Rejected"></td>
    </tr>
    <tr>
        <td colspan="4">Notes</td>
    </tr>
    <tr>
        <td colspan="4"><input class="w3-input w3-border" type="text" name="T_Notes"></td>
    </tr>
    <tr>
        <td>Data Owner</td>
    </tr>
    <tr>
        <td><input class="w3-input w3-border" type="text" name="T_Data_Inputer"><span class="error">*</span></td>
    </tr>
    <tr align="left"><td>
    <input type="submit" name="submit" value="Submit">
    </td></tr>
    <tr>
        <td><a href='index.php'>Back To Home</a></td>
    </tr>
</form>
</Table>
</div>
</body>
</html>