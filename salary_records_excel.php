<?php
session_start();
include("db_connection.php");
$branchName = $_SESSION['branch_name'];
if (isset($_POST['fromdate']) && isset($_POST['todate'])) {
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $query = "SELECT * FROM amd_salary_records  WHERE created_by ='" . $branchName . "'  AND salary_date between '$fromdate' AND '$todate' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM amd_salary_records  WHERE created_by ='" . $branchName . "'  ORDER BY id DESC";
}
$result = mysqli_query($conn, $query);
$delimiter = ",";
$filename = strtolower($branchName) . "_salary_data_" . date('d-M-Y') . ".csv"; // Create file name

if (mysqli_num_rows($result) > 0) {
    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array(
        'Id',
        'Staff Name',
        'Salary Date',
        'Salary Amount',
        'Staff Present Days',
        'Staff Contact',
        'Staff Address'
    );
    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    while ($row = mysqli_fetch_array($result)) {
        $lineData = array(
            $row["id"],
            $row["staff_name"],
            $row["salary_date"],
            $row["salary_amount"],
            $row["staff_present_days"],
            $row["staff_contact"],
            $row["staff_address"]
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
