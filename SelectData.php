<!DOCTYPE html>
<html lang="en" style="overflow: auto">
<head>
    <meta charset="UTF-8">
    <title>TestCOE Site</title>
    <link rel="stylesheet" href="css/w3.css">
    <!-- <link rel="stylesheet" href="css/my.css"> -->
</head>
<body>
<?php
    $Filter_Project_Name = isset($_POST['select']) ? $_POST['select'] : '';
?>
<div>
    <table>
        <tr>
        <form action="#" method="post">
        <th>
            <select name="select">
                <option value='All' <?php echo $Filter_Project_Name == 'All' ? 'selected' : '' ?>> All Projects </option>
                <?php
                require "Define.php";
                $Project_Name = "select Project_Name from project";
                $Project_Result = mysqli_query($dbc, $Project_Name);
                while ($result = mysqli_fetch_row($Project_Result)) {
                    $S_Project_Name = $result[0];
                    echo "<option value='$S_Project_Name' ". ($Filter_Project_Name == $S_Project_Name ? 'selected' : ''). " >".$S_Project_Name ."</option>";
                }
                ?>
            </select>
        </th>
        <th><input type="submit" name="submit" value="Filter"></th>
        </form>
    </tr>
    </table>
</div>

<?php

if ($Filter_Project_Name == "All" or $Filter_Project_Name == null) {
    $Build_Data = "SELECT    Project_Name, 
                          Build_Name,Start_Time,End_Time,
                          Regular, 
                          Regular_Work_Hour_AVG, 
                          Intern, 
                          Intern_Work_Hour_AVG, 
                          Case_Plan, 
                          Case_Run, 
                          Defect_Submit, 
                          Defect_Critical,
                          Defect_Major,
                          Defect_Minor,
                          Defect_Verified, 
                          Defect_Reopen, 
                          Defect_Closed, 
                          Defect_Rejected,
                          Notes,
                          Data_Inputer,
                          Build_Id FROM
                          project a, build b, Build_Data c 
                          where a.id = b.Project_Id and c.Build_Id=b.Id 
                          ORDER by Build_Name, Project_Name DESC 
                          ";
    $Build_Result = mysqli_query($dbc, $Build_Data);
}
else{
    $Build_Data = "SELECT    Project_Name, 
                          Build_Name,Start_Time,End_Time,
                          Regular, 
                          Regular_Work_Hour_AVG, 
                          Intern, 
                          Intern_Work_Hour_AVG, 
                          Case_Plan, 
                          Case_Run, 
                          Defect_Submit, 
                          Defect_Critical,
                          Defect_Major,
                          Defect_Minor,
                          Defect_Verified, 
                          Defect_Reopen, 
                          Defect_Closed, 
                          Defect_Rejected,
                          Notes,
                          Data_Inputer,
                          Build_Id FROM
                          project a, build b, Build_Data c 
                          where a.id = b.Project_Id and c.Build_Id=b.Id and a.Project_Name='$Filter_Project_Name'
                          ORDER by Build_Name, Project_Name DESC 
                          ";
    $Build_Result = mysqli_query($dbc, $Build_Data);
}
if(!$Build_Result){
    echo "No data";
    exit;
}
echo "<div id='data'>";
echo "<table class=\"w3-table-all w3-hoverable w3-card-4\">";
echo "<tr id='title'>";
echo "<th style=\"display:none;\">ID</th>";
echo "<th >Project Name</th>";
echo "<th >Build Name</th>";
echo "<th width='120'>Build Started Time</th>";
echo "<th width='120'>Build End Time</th>";
echo "<th>Regular No.</th>";
echo "<th>Regular Average Spend Hours</th>";
echo "<th>Intern NO.</th>";
echo "<th>Intern Average Spend Hours</th>";
echo "<th>Planned Cases</th>";
echo "<th>Actual Executed Cases</th>";
echo "<th>Submitted Defects</th>";
echo "<th>Critical Defects</th>";
echo "<th>Major Defects</th>";
echo "<th>Minor Defects</th>";
echo "<th>Planned to Verify Defects</th>";
echo "<th>Reopen Defects</th>";
echo "<th>Closed Defects</th>";
echo "<th>Rejected Defects</th>";
echo "<th>Notes</th>";
echo "<th>Data Owner</th>";
echo "</tr>";

while ($result = mysqli_fetch_row($Build_Result)) {
    $T_Project_Name = $result[0];
    $T_Build_Name = $result[1];
    $T_Build_Start_Time = $result[2];
    $T_Build_End_Time = $result[3];
    $T_Regular_NO = $result[4];
    $T_Regular_AVG_WH = $result[5];
    $T_Intern_NO = $result[6];
    $T_Intern_AVG_WH = $result[7];
    $T_Case_Plan = $result[8];
    $T_Case_Run = $result[9];
    $T_Defect_Sumbit = $result[10];
    $T_Defect_Critical = $result[11];
    $T_Defect_Major = $result[12];
    $T_Defect_Minor = $result[13];
    $T_Defect_Verified = $result[14];
    $T_Defect_Reopen = $result[15];
    $T_Defect_Closed = $result[16];
    $T_Defect_Rejected = $result[17];
    $T_Notes = $result[18];
    $T_Data_Inputer = $result[19];
    $T_Build_Id = $result[20];

    echo "<tr>";
    echo "<th style=\"display:none;\">".$T_Build_Id."</th>";
    echo "<th >".$T_Project_Name."</th>";
    echo "<th >".$T_Build_Name."</th>";
    echo "<td class='edit' width='120' id='Start_Time'>".$T_Build_Start_Time."</td>";
    echo "<td class='edit' width='120' id='End_Time'>".$T_Build_End_Time."</td>";
    echo "<td class='edit' id='Regular'>".$T_Regular_NO."</td>";
    echo "<td class='edit' id='Regular_Work_Hour_AVG'>".$T_Regular_AVG_WH."</td>";
    echo "<td class='edit' id='Intern'>".$T_Intern_NO."</td>";
    echo "<td class='edit' id='Intern_Work_Hour_AVG'>".$T_Intern_AVG_WH."</td>";
    echo "<td class='edit' id='Case_Plan'>".$T_Case_Plan."</td>";
    echo "<td class='edit' id='Case_Run'>".$T_Case_Run."</td>";
    echo "<td class='edit' id='Defect_Sumbit'>".$T_Defect_Sumbit."</td>";
    echo "<td class='edit' id='Defect_Critical'>".$T_Defect_Critical."</td>";
    echo "<td class='edit' id='Defect_Major'>".$T_Defect_Major."</td>";
    echo "<td class='edit' id='Defect_Minor'>".$T_Defect_Minor."</td>";
    echo "<td class='edit' id='Defect_Verified'>".$T_Defect_Verified."</td>";
    echo "<td class='edit' id='Defect_Reopen'>".$T_Defect_Reopen."</td>";
    echo "<td class='edit' id='Defect_Closed'>".$T_Defect_Closed."</td>";
    echo "<td class='edit' id='Defect_Rejected'>".$T_Defect_Rejected."</td>";
    echo "<td class='edit' id='Notes'>".$T_Notes."</td>";
    echo "<td class='edit' id='Data_Inputer'>".$T_Data_Inputer."</td>";
    echo "</tr>";

    #mysqli_free_result($result);
}

echo "</table>";

echo "<table align='center'>";
echo "<tr><th><a href='Submit_Data_Table.php'>Add One More</a></th></tr>";
echo "<tr><th><a href='index.php'>Back To Home</a></th></tr>";
echo "</table>";
echo "</div>";

mysqli_close($dbc);

?>


<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script type="text/javascript">

    function refresh() {
        self.location.reload();
    }
    $(function(){
        $('table td.edit').dblclick(function(){
            if(!$(this).is('.input')){
                $(this).addClass('input').html('<form><input type="text" value="'+ $(this).text() +'" autofocus /><input type="submit" value="Save" /><input type="button" onclick="refresh()" value="Cancel"></form>').find('form').click().submit(function(){
                        var thisid = $(this).parent().siblings("th:eq(0)").text();
                        var thisvalue=$(this).find('input').val();
                        var thisclass = $(this).parent().attr("id");

                        $.ajax({
                            type: 'POST',
                            url: 'Update.php',
                            data: "thisid="+thisid+"&thisclass="+thisclass+"&thisvalue="+thisvalue
                        });
                    $(this).parent().removeClass('input').html($(this).find('input').val() || 0);
                });
            }
        }).hover(function(){
            $(this).addClass('hover');
        },function(){
            $(this).removeClass('hover');
        });
    });
</script>

</body>
</html>