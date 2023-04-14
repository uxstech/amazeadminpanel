<?php
require('invoice.php');
session_start();
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM amd_student_registered WHERE id = '$id'";
    $data = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($data);
}

// Instanciation of inherited class
$pdf = new PDF_Invoice('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->addSociete(
    "Amaze Motor Driving School",
    "Head Office:\n224,\n2nd Floor, Gala Magnus,\nSafal Parisar Rd,\nSouth Bopal,\nAhmedabad, Gujarat 380058"
);
$pdf->fact_dev("Branch", str_replace("_", " ", $_SESSION['branch_name']));
$pdf->temporaire("Amaze Motor Driving");
$pdf->addDate(date("d M Y", strtotime($row['registration_date'])));
$pdf->addClientAdresse("Contact Details:\n\n+91 92275755667\n+91 7016003600\ninfoamazemotor@gmail.com\nwww.amazemotordriving.com");

$pdf->addReference($row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name']);
$cols = array(
    "SR NO"             => 16,
    "SELECTED CAR"      => 46,
    "SESSION TIME"      => 46,
    "GENDER"            => 22,
    "AGE"               => 20,
    "PAID"              => 20,
    "TOTAL"             => 20
);
$pdf->addCols($cols);
$cols = array(
    "SR NO"         => "C",
    "SELECTED CAR"  => "C",
    "SESSION TIME"  => "C",
    "GENDER"        => "C",
    "AGE"        => "C",
    "PAID"          => "C",
    "TOTAL"         => "C"
);
$pdf->addLineFormat($cols);
$pdf->addLineFormat($cols);

$y    = 115;
$line = array(
    "SR NO"         => "1",
    "SELECTED CAR"  => $row['selected_car'],
    "SESSION TIME"  => date("g:i a", strtotime($row['session_start_time'])) . " to " . date("g:i a", strtotime($row['session_end_time'])),
    "GENDER"        => $row['gender'],
    "AGE"           => $row['age'],
    "PAID"          => number_format($row['fees_paid']) . ".00",
    "TOTAL"         => number_format($row['total_fees']) . ".00"
);
$size = $pdf->addLine($y, $line);
$y   += $size + 2;
$pdf->addRemarque("Thank you for being part of Amaze Motor Driving Family");
$pdf->addCadreEurosFrancs();
$pdf->Output();
