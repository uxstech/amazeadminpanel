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
$pdf->Image('assets/amazevisitingcard.jpg', 10, 5, 70, 35);
$pdf->addSociete(
    "Head Office:\n224,\n2nd Floor, Gala Magnus,\nSafal Parisar Rd,\nSouth Bopal,\nAhmedabad, Gujarat 380058"
);
$pdf->temporaire("Amaze Motor Driving");
$pdf->addClientAdresse("Contact Details:\n\n+91 92275755667\n+91 7016003600\ninfoamazemotor@gmail.com\nwww.amazemotordriving.com");

$pdf->addReference($row['staff_name']);
$pdf->addInvoiceNo(str_pad($row['id'], 10, "0", STR_PAD_LEFT));

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

$y    = 140;
$line = array(
    "SR NO"             => "1",
    "STAFF ADDRESS"     => $row['staff_address'],
    "PRESENT DAYS"      => $row['staff_present_days'] . " Days",
    "CONTACT"           => "+91 " . $row['staff_contact'],
    "SALARY"            => number_format($row['salary_amount']) . ".00"
);
$size = $pdf->addLine($y, $line);
$y   += $size + 2;
$pdf->addCadreEurosFrancs();
$pdf->addDateText(date('m/d/Y', time()));
$pdf->addFooter();
$pdf->addGratitude();
$pdf->Output('', "ss_" . str_replace(" ", "_", strtolower($row['staff_name'])) . "_" . str_pad($row['id'], 10, "0", STR_PAD_LEFT) . ".pdf");
