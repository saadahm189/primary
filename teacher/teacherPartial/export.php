<?php
include "../../partial/connection.php";
// For specifi class collect data from teacher main
$output = '';
if (isset($_POST["export"])) {
    $query = "SELECT class, roll, name FROM student_main";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '<table class="table" bordered="1">
                    <tr style="border:0.5px solid black">
                         <th>Roll</th>
                         <th>Name</th>
                    </tr>';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<tr style="border:0.5px solid black">
                         <td>' . $row["roll"] . '</td>
                         <td>' . $row["name"] . '</td>
                    </tr>';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=classOne.xls');
        echo $output;
    }
}
