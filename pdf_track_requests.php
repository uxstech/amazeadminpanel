<?php
require('invoice.php');
session_start();
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM amd_track_records WHERE id = '$id'";
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

$pdf->addReference($row['name_of_user']);
$pdf->addMOP($mop);
$pdf->addInvoiceNo(floor(microtime(true) * 1000) . "/" . str_pad($row['id'], 10, "0", STR_PAD_LEFT));
$cols = array(
    "SR NO"             => 20,
    "CAR"               => 20,
    "TIME"              => 40,
    "DATE"              => 20,
    "NAME"              => 40,
    "CONTACT"           => 30,
    "PAID"              => 20,
);
$pdf->addCols($cols);
$cols = array(
    "SR NO"         => "C",
    "CAR"           => "C",
    "TIME"          => "C",
    "DATE"          => "C",
    "NAME"          => "C",
    "CONTACT"       => "C",
    "PAID"          => "C"
);
$pdf->addLineFormat($cols);
$pdf->addLineFormat($cols);

$y    = 140;
$line = array(
    "SR NO"         => "1",
    "CAR"           => $row['car_of_user'],
    "TIME"          => date("g:i a", strtotime($row['start_time'])) . " to " . date("g:i a", strtotime($row['end_time'])),
    "DATE"          => date("d M Y", strtotime($row['registration_date'])),
    "NAME"          => $row['name_of_user'],
    "CONTACT"       => $row['phone_number'],
    "PAID"          => number_format($row['amount_paid']) . ".00"
);
$size = $pdf->addLine($y, $line);
$y   += $size + 2;
$pdf->addOtherDescTitle("Other Input");
$pdf->addRemarque($otdesc);
$pdf->addCadreEurosFrancs();
$pdf->addDateText(date('m/d/Y', time()));
$pdf->addFooter();
$pdf->addGratitude();
$pdf->Output('', "dtr_" . str_replace(" ", "_", strtolower($row['name_of_user'])) . "_" . str_pad($row['id'], 10, "0", STR_PAD_LEFT) . ".pdf");
