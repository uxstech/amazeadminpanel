<?php
session_start();
include("db_connection.php");
$branchName = $_SESSION['branch_name'];
if (isset($_POST['fromdate']) && isset($_POST['todate'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $query = "SELECT * FROM amd_customer_requests  WHERE created_by ='" . $branchName . "'  AND request_date between '$fromdate' AND '$todate' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM amd_customer_requests  WHERE created_by ='" . $branchName . "'  ORDER BY id DESC";
}
$result = mysqli_query($conn, $query);
$fileName = "customer_requests_data_" . date('Y-m-d') . ".xls";
if (mysqli_num_rows($result) > 0) {
    $output .= '
         <table border= "1">
            <tr>
                <th>Id</th>
                <th>Customer Name</th>
                <th>Work</th>
                <th>Mobile Number</th>
                <th>Amount Paid</th>
                <th>Total Amount</th>
                <th>Request Date</th>
                <th>Status</th>
            </tr>
    ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
            <tr>
                <td>' . $row["id"] . '</td>
                <td>' . $row["customer_name"] . '</td>
                <td>' . $row["work_description"] . '</td>
                <td>' . $row["mobile_number"] . '</td>
                <td>' . $row["fees_paid"] . '</td>
                <td>' . $row["total_fees"] . '</td>
                <td>' . $row["request_date"] . '</td>
                <td>' . $row["status"] . '</td>
            </tr>
    ';
    }
    $output .= '</table>';
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment;filename=$fileName.xls");
    echo $output;
} else {
    echo "No records found withing given date";
}
