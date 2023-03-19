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
$delimiter = ",";
$filename = strtolower($branchName) . "_training_data_" . date('d-M-Y') . ".csv"; // Create file name

if (mysqli_num_rows($result) > 0) {
    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array(
        'Id',
        'First Name',
        'Middle Name',
        'Last Name',
        'Mobile Number',
        'Email',
        'Address',
        'Registration Date',
        'Fees Paid',
        'Total Fees',
        'Selected Car',
        'Session Start Time',
        'Session End Time',
        'Any Customized Note',
        'Gender',
        'Age',
        'Status'
    );
    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    while ($row = mysqli_fetch_array($result)) {
        $lineData = array(
            $row["id"],
            $row["first_name"],
            $row["middle_name"],
            $row["last_name"],
            "+91 " . $row["phone_number"],
            $row["email_id"],
            $row["address"],
            $row["registration_date"],
            $row["fees_paid"],
            $row["total_fees"],
            $row["selected_car"],
            $row["session_start_time"],
            $row["session_end_time"],
            $row["any_customized_request"],
            $row["gender"],
            $row["age"],
            $row["status"]
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
