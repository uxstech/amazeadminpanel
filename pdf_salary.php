<?php
require('fpdf/fpdf.php');
session_start();
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM amd_salary_records WHERE id = '$id'";
    $data = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($data);
}
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('assets/amazepng.png', 10, 6, 60);
    }

    // Page footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Helvetica', 'B', 12);
        $this->SetTextColor(128);
        $this->Cell(0, 10, 'Amaze Motor Driving School', 0, 0, 'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetY(50);
$pdf->SetFont('Helvetica', 'I', 12);
$pdf->Cell(0, 10, str_replace("_", " ", $_SESSION['branch_name']), 0, 1, 'L');
$pdf->Cell(0, 2, 'EMPLOYER : AMAZE MOTOR DRIVING SCHOOL', 0, 1, 'L');
$pdf->Cell(0, 20, 'This salary slip belongs to ' . $row['staff_name'] . ' working at Amaze Motor Driving School', 0, 1, 'L');
$pdf->Ln(5);

$pdf->SetFont('Helvetica', '', 14);
$pdf->Cell(90, 15, 'Info', 1, 0, 'C');
$pdf->Cell(90, 15, 'Values', 1, 1, 'C');

$pdf->Cell(90, 15, 'Name', 1, 0, 'C');
$pdf->Cell(90, 15, $row['staff_name'], 1, 1, 'C');

$pdf->Cell(90, 15, 'Date', 1, 0, 'C');
$pdf->Cell(90, 15, date("d M Y", strtotime($row['salary_date'])), 1, 1, 'C');

$pdf->Cell(90, 15, 'Salary', 1, 0, 'C');
$pdf->Cell(90, 15, "Rupees " . $row['salary_amount'], 1, 1, 'C');

$pdf->Cell(90, 15, 'Present Days', 1, 0, 'C');
$pdf->Cell(90, 15, $row['staff_present_days'] . " Days", 1, 1, 'C');

$pdf->Cell(90, 15, 'Contact No', 1, 0, 'C');
$pdf->Cell(90, 15, $row['staff_contact'], 1, 1, 'C');



$pdf->SetFont('Helvetica', 'I', 10);
$pdf->SetTextColor(255, 0, 0);
$pdf->Ln(10);
$pdf->Cell(90, 10, 'This is computer generated statement and does not require any signature or a seal', 0, 1, 'L');
$pdf->Cell(90, 0, '*This document is strictly confidential', 0, 1, 'L');
$pdf->Output();
