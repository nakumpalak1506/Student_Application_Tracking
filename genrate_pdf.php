<?php
session_start();

require("connection.php");
require("vendor/autoload.php");

// Start output buffering
ob_start();

class MYPDF extends TCPDF
{
    // Page header
    public function Header()
    {
        $this->SetFont('helvetica', 'B', 20);
        $this->Cell(0, 15, 'Student I-card', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
    }

    // Page footer
    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// Create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Student Application Tracking');
$pdf->SetTitle('Student I-Card');
$pdf->SetSubject('Icard');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Add a page
$pdf->AddPage();

// Set some content to print
$conn = mysqli_connect($servar, $username, $pass, $database);
$enr_no = $_SESSION['enr_no'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `photo`,`Enr_no`,`Department_id`,`Name`,`Date_of_birth`,`Phone_no`,`Blood_group`,
`Address`,`Status` FROM `icard` WHERE Enr_no = $enr_no";
//$sql ="SELECT `photo`FROM `icard` WHERE Enr_no = $enr_no";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the data and write it to the PDF
    while ($row = $result->fetch_assoc()) {
        $pdf->writeHTML('<br><br>');
        $pdf->writeHTML('<hr>');
        $imagePath = $row['photo'];
        $imageData = base64_encode(file_get_contents($imagePath));
        //$_SESSION['image_data'] = $imageData;
        //$imageData = base64_decode($_SESSION['image_data']);
        $tempImage = 'temp_image.jpeg';
        file_put_contents($tempImage, $imageData);
        $pdf->Image($tempImage, 80, 30, 60, 50, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

        $html = '<br><br><br><br><br><br><br><br><br><br><br><br>
        <style> 
            table { 
                padding-top: 12px;
                width: 100%; 
                border-collapse: collapse; 
                table-layout: fixed;
            } 
            tr, td { 
                border: 1px solid #000;
                padding: 10px;
                text-align: center;
                font-size: 12px;
                line-height: 2;
            } 
        </style>
        <table>
            <tr>
                <td><b>Enrollment No:</b></td>
                <td>' . $row['Enr_no'] . '</td>
            </tr>
            <tr>
                <td><b>Department:</b></td>
                <td>' . $row['Department_id'] . '</td>
            </tr>
            <tr>
                <td><b>Name:</b></td>
                <td>' . $row['Name'] . '</td>
            </tr>
            <tr>
                <td><b>Date of Birth:</b></td>
                <td>' . $row['Date_of_birth'] . '</td>
            </tr>
            <tr>
                <td><b>Phone No:</b></td>
                <td>' . $row['Phone_no'] . '</td>
            </tr>
            <tr>
                <td><b>Blood Group:</b></td>
                <td>' . $row['Blood_group'] . '</td>
            </tr>
            <tr>
                <td><b>Address:</b></td>
                <td>' . $row['Address'] . '</td>
            </tr>
            <tr>
                <td><b>Status:</b></td>
                <td>' . $row['Status'] . '</td>
            </tr> 
        </table>';
        unlink($tempImage);
    }
} else {
    $pdf->writeHTML('<p>No data found</p>');
}

$conn->close();
// Print text using writeHTML method
$pdf->writeHTML($html, true, false, true, false, '');

// Clear output buffer 
ob_end_clean();

// Close and output PDF document
$pdf->Output('Student_ICard.pdf', 'I');

?>