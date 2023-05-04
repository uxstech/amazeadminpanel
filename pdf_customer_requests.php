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

if (isset($_GET['selectmop'])) {
    $mop = $_GET['selectmop'];
}

if (isset($_GET['otdesc'])) {
    $otdesc = $_GET['otdesc'];
}

// Instanciation of inherited class
$pdf = new PDF_Invoice('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->addSociete(
    "Amaze Motor Driving School",
    "Head Office:\n224,\n2nd Floor, Gala Magnus,\nSafal Parisar Rd,\nSouth Bopal,\nAhmedabad, Gujarat 380058"
);
//$pdf->fact_dev("Branch", str_replace("_", " ", $_SESSION['branch_name']));
$pdf->temporaire("Amaze Motor Driving");
//$pdf->addDate(date("d M Y", strtotime($row['request_date'])));
$pdf->addClientAdresse("Contact Details:\n\n+91 92275755667\n+91 7016003600\ninfoamazemotor@gmail.com\nwww.amazemotordriving.com");

$pdf->addReference($row['customer_name']);
$pdf->addMOP($mop);
$pdf->addInvoiceNo(str_pad($row['id'], 10, "0", STR_PAD_LEFT));
$cols = array(
    "Sr No"             => 16,
    "Work Description"  => 76,
    "Contact"           => 36,
    "Amount Paid"       => 32,
    "Total Amount"      => 30
);
$pdf->addCols($cols);
$cols = array(
    "Sr No"             => "C",
    "Work Description"  => "C",
    "Contact"           => "C",
    "Amount Paid"       => "C",
    "Total Amount"      => "C"
);
$pdf->addLineFormat($cols);
$pdf->addLineFormat($cols);

$y    = 100;
$line = array(
    "Sr No"             => "1",
    "Work Description"  => $row['work_description'],
    "Contact"           => "+91 " . $row['mobile_number'],
    "Amount Paid"       => number_format($row['fees_paid']) . ".00",
    "Total Amount"      => number_format($row['total_fees']) . ".00"
);
$size = $pdf->addLine($y, $line);
$y   += $size + 2;
$pdf->addOtherDescTitle("Other Input");
$pdf->addRemarque($otdesc);
$pdf->addCadreEurosFrancs();
$pdf->addDateText(date("d M Y", strtotime($row['request_date'])));
$pdf->addFooter();
$pdf->addGratitude();
$pdf->Output();
