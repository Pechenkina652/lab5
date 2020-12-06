<?require_once 'connection.php';?>
<!doctype html>
<html>
	<head>
        <meta charset="utf-8">
        <title>
            Печенкина А.В.
        </title>
	</head>
</html>
<?require_once 'connection.php';?>
<?ob_end_clean();ob_clean();?>
<?require_once 'engine/library/tcpdf/tcpdf.php';?>
<?$array = array("№ п/п", "Название сети", "ИНН", "Адрес точки родажи", "Объём продаж", "Торговый баланс", "ФИО директора");
    ob_clean();
    error_reporting(E_ALL);
    ob_start();
    $pdf = new TCPDF();
    $pdf->setPrintHeader(false);
    
    $pdf->SetAuthor('Печенкина А.В.');
    $pdf->SetTitle('Сети магазинов');
    $pdf->SetMargins(10, 1, 10);
    $pdf->SetFont('Arial', '', 8, '', true);
    $pdf->AddPage();
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetTextColor(000, 0, 0);
    $html = '<br><h1>Сети магазинов</h1>';
    $html .= "<table>";
    $html .= "<tr>";
    for($i = 0; $i < count($array); $i++){
        $html .= "<th>$array[$i]</th>";
    }
    $html .= "</tr>";
    $queryTab = "shop_pdf";
    $query = "SELECT * FROM $database.$queryTab";
    $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
    while ($row=mysqli_fetch_array($result)){
         $html .= "<tr align='center'>";
        for($i = 0; $i < count($row)/2; $i++){
            $text = $row[$i];
             $html .= "<td>$text</td>";
        }
		 $html .= "</tr>";
    }
    $html .= "</table>";
    $pdf->SetFillColor(255, 235, 232);
    $pdf->writeHTMLCell(0, 0, '', '', $html, 1, 0, 1, true, '', true);
    $pdf->Output('Сети магазинов.pdf', 'I');?>