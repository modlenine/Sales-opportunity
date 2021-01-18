<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Customer Visit Report</title>

</head>

<body>



    <?php

    // create new PDF document

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



    // set document information

    $pdf->SetCreator(PDF_CREATOR);

    $pdf->SetAuthor('IT Dept');

    $pdf->SetTitle('Customer Visit Report');

    $pdf->SetSubject('Customer Visit Report');

    $pdf->SetKeywords('Customer Visit Report');



    // set default header data

    // $pdf->SetHeaderData('Document Library');



    $pdf->setPrintHeader(false);

    $pdf->setPrintFooter(false);



    // set header and footer fonts

    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));



    // set default monospaced font

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);



    // set margins

    // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

    // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

    // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetMargins(10, 15, 10, true);



    // set auto page breaks

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);



    // set image scale factor

    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



    // set some language-dependent strings (optional)

    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {

        require_once(dirname(__FILE__) . '/lang/eng.php');

        $pdf->setLanguageArray($l);
    }



    // ---------------------------------------------------------



    // set font

    $pdf->SetFont('thsarabun', '', 14);





    // Print a table



    // add a page

    $pdf->AddPage();



    // create some HTML content



    $html = '
    
    ';

    $html .='
        <h2 style="text-align:center;">CUSTOMER VISIT REPORT</h2>
            <div class="" style="border:1px solid #000;">
            <table id="customers">

                <tr>
                    <td><span><b>Customer Name : </b>'.$csvr_cusname.'</span></td>
                    <td><span><b>Country : </b>'.$csvr_country.'</span></td>
                </tr>

                <tr>
                    <td><span><b>Business Type : </b>'.$csvr_business.'</span></td>
                    <td><span><b>Date/Time : </b>'.$csvr_datetime.'</span></td>
                </tr>

                <tr>
                    <td><span><b>Contact Persons / Position : </b>'.$csvr_contact.'</span></td>
                    <td><span><b>Salee participants : </b>'.$csvr_salee.'</span></td>
                </tr>

                <tr>
                    <td><span><b>Tel No : </b>'.$csvr_tel.'</span></td>
                    <td><span><b>Fax No : </b>'.$csvr_fax.'</span></td>
                </tr>

                <tr>
                    <td><span><b>Email : </b>'.$csvr_email.'</span></td>
                    <td></td>
                </tr>

            </table>
            </div>
    ';

    $html .='
        <h3>1.Customer Information / Competitor Product Usage: ข้อมูลของลูกค้า สินค้าที่ลูกค้าใช้อยู่</h3>
        <table id="cusViDetailV" style="width:100%;">
            <thead>
                <tr>
                    <th width="10%" style="border:1px solid #000;text-align:center;"><b>Type</b></th>
                    <th width="25%" style="border:1px solid #000;text-align:center;"><b>Salee Products</b></th>
                    <th width="10%" style="border:1px solid #000;text-align:center;"><b>Qty(mt/year)</b></th>
                    <th width="25%" style="border:1px solid #000;text-align:center;"><b>Competition Products</b></th>
                    <th width="10%" style="border:1px solid #000;text-align:center;"><b>Qty(mt/year)</b></th>
                    <th width="20%" style="border:1px solid #000;text-align:center;"><b>Remark</b></th>
                </tr>
            </thead>
            <tbody>';
             
                foreach(getSubCus($cvno)->result() as $rss){
                    $html .='
                    <tr>
                    <td width="10%" style="border:1px solid #000;">'.$rss->csvrs_type.'</td>
                    <td width="25%" style="border:1px solid #000;">'.$rss->csvrs_type.'</td>
                    <td width="10%" style="border:1px solid #000;">'.$rss->csvrs_type.'</td>
                    <td width="25%" style="border:1px solid #000;">'.$rss->csvrs_type.'</td>
                    <td width="10%" style="border:1px solid #000;">'.$rss->csvrs_type.'</td>
                    <td width="20%" style="border:1px solid #000;">'.$rss->csvrs_type.'</td>
                    </tr>
                    ';
                }

        $html .='
            </tbody>
        </table><br>
    ';


    $html .='
        <div style="font-size:20px;"><b>2.Discussion : รายละเอียด หรือ บทสรุปที่คุยกับลูกค้า</b></div>
        <span>'.$csvr_discussion.'</span><br>
    ';


    $html .='
    <div style="font-size:20px;"><b>3.Action Plan and Follow up : สิ่งที่ต้องทำต่อ และ กำหนดติดตามงาน</b></div>
    <span>'.$csvr_action.'</span>
';
   

$html .='';
    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // reset pointer to the last page
    $pdf->lastPage();


    // Print all HTML colors
    ob_end_clean();


    $filename = 'Customer Visit Report.pdf';

    //Close and output PDF document
    $pdf->Output($filename, 'I');



    //============================================================+

    // END OF FILE

    //============================================================+





    ?>





</body>

</html>