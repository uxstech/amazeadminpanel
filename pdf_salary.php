<?php
require('invoice.php');
session_start();
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM amd_salary_records WHERE id = '$id'";
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
$pdf->addDate(date("d M Y", strtotime($row['salary_date'])));
$pdf->addClientAdresse("Contact Details:\n\n+91 92275755667\n+91 7016003600\ninfoamazemotor@gmail.com\nwww.amazemotordriving.com");

$pdf->addReference($row['staff_name']);
$cols = array(
    "SR NO"          => 16,
    "STAFF ADDRESS"  => 76,
    "PRESENT DAYS"   => 32,
    "CONTACT"        => 36,
    "SALARY"         => 30
);
$pdf->addCols($cols);
$cols = array(
    "SR NO"          => "C",
    "STAFF ADDRESS"  => "L",
    "PRESENT DAYS"   => "C",
    "CONTACT"        => "C",
    "SALARY"         => "C"
);
$pdf->addLineFormat($cols);
$pdf->addLineFormat($cols);

$y    = 109;
$line = array(
    "SR NO"             => "1",
    "STAFF ADDRESS"     => $row['staff_address'],
    "PRESENT DAYS"      => $row['staff_present_days'] . " Days",
    "CONTACT"           => "+91 " . $row['staff_contact'],
    "SALARY"            => number_format($row['salary_amount']) . ".00"
);
$size = $pdf->addLine($y, $line);
$y   += $size + 2;
$pdf->addRemarque("Copyright 2023 Amaze Motor Driving School");
$pdf->addCadreEurosFrancs();
$pdf->Output();
