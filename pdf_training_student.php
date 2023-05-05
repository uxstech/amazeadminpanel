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

if (isset($_GET['selectmop'])) {
    $mop = $_GET['selectmop'];
}

if (isset($_GET['otdesc'])) {
    $otdesc = $_GET['otdesc'];
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

$customer_name = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
$pdf->addReference($customer_name);
$pdf->addMOP($mop);
$pdf->addInvoiceNo(str_pad($row['id'], 10, "0", STR_PAD_LEFT));

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
    "AGE"           => "C",
    "PAID"          => "C",
    "TOTAL"         => "C"
);
$pdf->addLineFormat($cols);
$pdf->addLineFormat($cols);

$y    = 140;
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
$pdf->addOtherDescTitle("Other Input");
$pdf->addRemarque($otdesc);
$pdf->addCadreEurosFrancs();
$pdf->addDateText(date('m/d/Y', time()));
$pdf->addFooter();
$pdf->addGratitude();
$pdf->Output('', "tr_" . str_replace(" ", "_", strtolower($customer_name)) . "_" . str_pad($row['id'], 10, "0", STR_PAD_LEFT) . ".pdf");
