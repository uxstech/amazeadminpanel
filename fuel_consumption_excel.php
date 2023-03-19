<?php
session_start();
include("db_connection.php");
$branchName = $_SESSION['branch_name'];
if (isset($_POST['fromdate']) && isset($_POST['todate'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $query = "SELECT * FROM amd_fuel_consumption_records  WHERE created_by ='" . $branchName . "'  AND on_date between '$fromdate' AND '$todate' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM amd_fuel_consumption_records  WHERE created_by ='" . $branchName . "'  ORDER BY id DESC";
}
$result = mysqli_query($conn, $query);
$delimiter = ",";
$filename = strtolower($branchName) . "_customer_requests_" . date('d-M-Y') . ".csv"; // Create file name

if (mysqli_num_rows($result) > 0) {
    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array(
        'Id',
        'Car',
        'Fuel Type',
        'Fuel Ltr/Kg',
        'Amount Paid',
        'On Date',
        'Meter Reading Before',
        'Meter Reading After',
        'Fuel Filled By'
    );
    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    while ($row = mysqli_fetch_array($result)) {
        $lineData = array(
            $row["id"],
            $row["car"],
            $row["fuel_type"],
            $row["filled_fuel_in_ltr_or_kg"],
            $row["amount"],
            $row["on_date"],
            $row["meter_before"],
            $row["meter_after"],
            $row["fueled_by_coach"]
        );
        fputcsv($f, $lineData, $delimiter);
    }

    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
} else {
    echo "No records found within given date";
}
