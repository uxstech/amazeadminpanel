<?php
session_start();
include("db_connection.php");
$branchName = $_SESSION['branch_name'];

if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$result_of_training = mysqli_query($conn, "SELECT SUM(fees_paid) AS value_sum_of_training FROM amd_student_registered WHERE registration_date between '$fromdate' AND '$todate' AND created_by ='$branchName'");
} else {
$result_of_training = mysqli_query($conn, "SELECT SUM(fees_paid) AS value_sum_of_training FROM amd_student_registered WHERE created_by ='$branchName'");
}
$row_of_training = mysqli_fetch_assoc($result_of_training);
$sum_of_training = $row_of_training['value_sum_of_training'];


if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$result_of_requests = mysqli_query($conn, "SELECT SUM(fees_paid) AS value_sum_of_requests FROM amd_customer_requests WHERE request_date between '$fromdate' AND '$todate' AND created_by ='$branchName'");
} else {
$result_of_requests = mysqli_query($conn, "SELECT SUM(fees_paid) AS value_sum_of_requests FROM amd_customer_requests WHERE created_by ='$branchName'");
}
$row_of_requests = mysqli_fetch_assoc($result_of_requests);
$sum_of_requests = $row_of_requests['value_sum_of_requests'];


if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$result_of_fuel = mysqli_query($conn, "SELECT SUM(amount) AS value_sum_of_fuel FROM amd_fuel_consumption_records WHERE on_date between '$fromdate' AND '$todate' AND created_by ='$branchName'");
} else {
$result_of_fuel = mysqli_query($conn, "SELECT SUM(amount) AS value_sum_of_fuel FROM amd_fuel_consumption_records WHERE created_by ='$branchName'");
}
$row_of_fuel = mysqli_fetch_assoc($result_of_fuel);
$sum_of_fuel = $row_of_fuel['value_sum_of_fuel'];


if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$result_of_maintainence = mysqli_query($conn, "SELECT SUM(bill_amount) AS value_sum_of_maintainence FROM amd_car_maintainence_record WHERE servicing_date between '$fromdate' AND '$todate' AND created_by ='$branchName'");
} else {
$result_of_maintainence = mysqli_query($conn, "SELECT SUM(bill_amount) AS value_sum_of_maintainence FROM amd_car_maintainence_record WHERE created_by ='$branchName'");
}
$row_of_maintainence = mysqli_fetch_assoc($result_of_maintainence);
$sum_of_maintainence = $row_of_maintainence['value_sum_of_maintainence'];


if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$result_of_salary = mysqli_query($conn, "SELECT SUM(salary_amount) AS value_sum_of_salary FROM amd_salary_records WHERE salary_date between '$fromdate' AND '$todate' AND created_by ='$branchName'");
} else {
$result_of_salary = mysqli_query($conn, "SELECT SUM(salary_amount) AS value_sum_of_salary FROM amd_salary_records WHERE created_by ='$branchName'");
}
$row_of_salary = mysqli_fetch_assoc($result_of_salary);
$sum_of_salary = $row_of_salary['value_sum_of_salary'];



if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$result_of_credited_transactions = mysqli_query($conn, "SELECT SUM(transaction_amount) AS value_sum_of_credited_transactions FROM amd_transaction_records WHERE transaction_date between '$fromdate' AND '$todate' AND transaction_type = 'CREDIT' AND created_by ='$branchName'");
} else {
$result_of_credited_transactions = mysqli_query($conn, "SELECT SUM(transaction_amount) AS value_sum_of_credited_transactions FROM amd_transaction_records WHERE transaction_type = 'CREDIT' AND created_by ='$branchName'");
}
$row_of_credited_transactions = mysqli_fetch_assoc($result_of_credited_transactions);
$sum_of_credited_transactions = $row_of_credited_transactions['value_sum_of_credited_transactions'];


if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$result_of_debited_transactions = mysqli_query($conn, "SELECT SUM(transaction_amount) AS value_sum_of_debited_transactions FROM amd_transaction_records WHERE transaction_date between '$fromdate' AND '$todate' AND transaction_type = 'DEBIT' AND created_by ='$branchName'");
} else {
$result_of_debited_transactions = mysqli_query($conn, "SELECT SUM(transaction_amount) AS value_sum_of_debited_transactions FROM amd_transaction_records WHERE transaction_type = 'DEBIT' AND created_by ='$branchName'");
}
$row_of_debited_transactions = mysqli_fetch_assoc($result_of_debited_transactions);
$sum_of_debited_transactions = $row_of_debited_transactions['value_sum_of_debited_transactions'];

$overall_profit = ($sum_of_training + $sum_of_requests + $sum_of_credited_transactions) - ($sum_of_fuel + $sum_of_maintainence + $sum_of_salary + $sum_of_debited_transactions);
