<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TestCOE Site</title>
    <link rel="stylesheet" href="css/w3.css">
</head>
<body>
<div align='center'>
    <table class="w3-table-all">
        <tr>
            <th>Project Name</th>
        </tr>
        <?php
            require "Define.php";
            $Project_Name = "select Project_Name from project";
            $Project_Result = mysqli_query($dbc, $Project_Name);
            if(!$Project_Result){
                echo "No Project";
            }
            while ($result = mysqli_fetch_row($Project_Result)) {
                $T_Project_Name = $result[0];
                echo "<tr>";
                echo "<td>". $T_Project_Name ."</td>";
                echo "</tr>";
                #mysqli_free_result($result);
            }
            mysqli_close($dbc);
        ?>
                <form action="CreateProject.php" method="post">
                    <tr>
                        <td><input type="text" name="Project_Name">&nbsp;<input type="submit" value="Add New Project"></td>
                    </tr>
                </form>
        <tr>
            <td><a href='index.php'>Back To Home</a></td>
        </tr>
    </table>
</div>

</body>
</html>