<?
require('fpdf/fpdf.php');
require('sendMail.php');


class PDF5 extends FPDF {
     

}


    $invoicePdf = new PDF5();
	
	if($invoicepdf->get_magic_quotes_runtime())
{
    // Deactivate
    $invoicepdf->set_magic_quotes_runtime(false);
}
	$invoicePdf->AddPage();

	 //write "invoice" as title in the middle.
	$invoicePdf->SetFont('Arial','B',14);
	$invoicePdf->MultiCell(170,7,'Flight Booking',0,'C');

     $invoicePdf->Ln(9);
   $invoicePdf->SetFontSize(10);
   
  // start and end times.
        $invoicePdf->Cell(19,5,'Start Time:',1,0,'L');
        $invoicePdf->Cell(25,5,'00',1,0,'L');    
        $invoicePdf->SetFontSize(6);
        $invoicePdf->Cell(16,5,'if applicable:',0,0,'L');
        $invoicePdf->SetFontSize(10);
        $invoicePdf->Cell(19,5,'Start Time:',1,0,'L');
        $invoicePdf->Cell(21,5,'00',1,0,'L');
	    $invoicePdf->Cell(19,5,'Start Time:',1,0,'L');
	    $invoicePdf->Cell(21,5,'00',1,1,'L');
	 
	 //end time
       $invoicePdf->Cell(19,5,'End Time:',1,0,'L');
       $invoicePdf->Cell(25,5,'00',1,0,'L');
       $invoicePdf->Cell(16,5,'',0,0,'L');
       $invoicePdf->Cell(19,5,'End Time:',1,0,'L');
       $invoicePdf->Cell(21,5,'00',1,0,'L');
	   $invoicePdf->Cell(19,5,'End Time:',1,0,'L');
	   $invoicePdf->Cell(21,5,'00',1,1,'L');
	   
	   
	   $invoiceName = "invoice/test.pdf";  //save invoice in invoiceInfo folder.
       $invoicePdf->Output($invoiceName,'F');
	

?>