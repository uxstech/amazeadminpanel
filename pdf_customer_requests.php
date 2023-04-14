<?php
require('invoice.php');
session_start();
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM amd_customer_requests WHERE id = '$id'";
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
$pdf->addDate(date("d M Y", strtotime($row['request_date'])));
$pdf->addClientAdresse("Contact Details:\n\n+91 92275755667\n+91 7016003600\ninfoamazemotor@gmail.com\nwww.amazemotordriving.com");

$pdf->addReference($row['customer_name']);
$cols = array(
    "SR NO"             => 16,
    "WORK DESCRIPTION"  => 76,
    "CONTACT"           => 36,
    "AMOUNT PAID"       => 32,
    "TOTAL AMOUNT"      => 30
);
$pdf->addCols($cols);
$cols = array(
    "SR NO"             => "C",
    "WORK DESCRIPTION"  => "L",
    "CONTACT"           => "C",
    "AMOUNT PAID"       => "C",
    "TOTAL AMOUNT"      => "C"
);
$pdf->addLineFormat($cols);
$pdf->addLineFormat($cols);

$y    = 109;
$line = array(
    "SR NO"             => "1",
    "WORK DESCRIPTION"  => $row['work_description'],
    "CONTACT"           => "+91 " . $row['mobile_number'],
    "AMOUNT PAID"       => number_format($row['fees_paid']) . ".00",
    "TOTAL AMOUNT"      => number_format($row['total_fees']) . ".00"
);
$size = $pdf->addLine($y, $line);
$y   += $size + 2;
$pdf->addRemarque("Copyright 2023 Amaze Motor Driving School");
$pdf->addCadreEurosFrancs();
$pdf->Output();
