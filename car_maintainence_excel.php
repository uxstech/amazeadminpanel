<?php
session_start();
include("db_connection.php");
$branchName = $_SESSION['branch_name'];
if (isset($_POST['fromdate']) && isset($_POST['todate'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $query = "SELECT * FROM amd_car_maintainence_record  WHERE created_by ='" . $branchName . "'  AND servicing_date between '$fromdate' AND '$todate' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM amd_car_maintainence_record  WHERE created_by ='" . $branchName . "'  ORDER BY id DESC";
}
$result = mysqli_query($conn, $query);
$fileName = "$branchName car_maintainence_data_" . date('Y-m-d') . ".xls";
if (mysqli_num_rows($result) > 0) {
    $output .= '
         <table border= "1">
            <tr>
                <th>Id</th>
                <th>Service of car</th>
                <th>Service Station Name</th>
                <th>Bill Number</th>
                <th>Bill Amount</th>
                <th>Vehicle Number</th>
                <th>Servicing Date</th>
                <th>Next Servicing Date</th>
                <th>Service done at kilometers</th>
                <th>Next service at kilometers</th>
                <th>Service Station Contact Number</th>
                <th>Service Description</th>
            </tr>
    ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
            <tr>
                <td>' . $row["id"] . '</td>
                <td>' . $row["service_of_car"] . '</td>
                <td>' . $row["vendor_name"] . '</td>
                <td>' . $row["bill_number"] . '</td>
                <td>' . $row["bill_amount"] . '</td>
                <td>' . $row["vehicle_number"] . '</td>
                <td>' . $row["servicing_date"] . '</td>
                <td>' . $row["next_servicing_date"] . '</td>
                <td>' . $row["service_km"] . '</td>
                <td>' . $row["next_service_km"] . '</td>
                <td>' . $row["mobile_number"] . '</td>
                <td>' . $row["job_description"] . '</td>
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
