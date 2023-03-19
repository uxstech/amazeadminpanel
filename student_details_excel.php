<?php
session_start();
include("db_connection.php");
$branchName = $_SESSION['branch_name'];
if (isset($_POST['fromdate']) && isset($_POST['todate'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $query = "SELECT * FROM amd_student_registered  WHERE created_by ='" . $branchName . "'  AND registration_date between '$fromdate' AND '$todate' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM amd_student_registered  WHERE created_by ='" . $branchName . "'  ORDER BY id DESC";
}
$result = mysqli_query($conn, $query);
$fileName = "$branchName training_details_data_" . date('Y-m-d') . ".xls";
if (mysqli_num_rows($result) > 0) {
    $output .= '
         <table border= "1">
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Registration Date</th>
                <th>Fees Paid</th>
                <th>Total Fees</th>
                <th>Selected Car</th>
                <th>Session Start Time</th>
                <th>Session End Time</th>
                <th>Any Customized Note</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Status</th>
            </tr>
    ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
            <tr>
                <td>' . $row["id"] . '</td>
                <td>' . $row["first_name"] . '</td>
                <td>' . $row["middle_name"] . '</td>
                <td>' . $row["last_name"] . '</td>
                <td>' . $row["phone_number"] . '</td>
                <td>' . $row["email_id"] . '</td>
                <td>' . $row["address"] . '</td>
                <td>' . $row["registration_date"] . '</td>
                <td>' . $row["fees_paid"] . '</td>
                <td>' . $row["total_fees"] . '</td>
                <td>' . $row["selected_car"] . '</td>
                <td>' . $row["session_start_time"] . '</td>
                <td>' . $row["session_end_time"] . '</td>
                <td>' . $row["any_customized_request"] . '</td>
                <td>' . $row["gender"] . '</td>
                <td>' . $row["age"] . '</td>
                <td>' . $row["status"] . '</td>
            </tr>
    ';
    }
    $output .= '</table>';
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment;filename=$fileName.xls");
    echo $output;
} else {
    echo "No records found within given date";
}
