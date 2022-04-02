<?php
require_once 'connect1.php';
require('tfpdf/tfpdf.php');

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

$pdf = new tFPDF();
$pdf->AddFont('PDFFont', '', 'cour.ttf');
$pdf->SetFont('PDFFont', '', 12);
$pdf->AddPage();

$pdf->Cell(80);
$pdf->Cell(30, 10, 'Киносеансы', 1, 0, 'C');
$pdf->Ln(20);

$pdf->SetFillColor(200, 200, 200);
$pdf->SetFontSize(6);

$header = array("п/п", "Название фильма", "Жанр", "Год", "Кинозал", "Категория", "Дата и время", "Свободных мест");
$w = array(6, 45, 30, 10, 20, 20, 30, 20);
$h = 20;
for ($c = 0; $c < 8; $c++) {
    $pdf->Cell($w[$c], $h, $header[$c], 'LRTB', '0', '', true);
}
$pdf->Ln();

// Запрос на выборку сведений о пользователях
$result = $mysqli->query("SELECT
        films.name_film as name_film,
        films.cinema as cinema,
        films.year as `year`,
        zal.name_z as name_z,
        zal.cat_z as cat_z,
        seans.date_seans,
        seans.count_svob - seans.count_zan
        FROM seans
        LEFT JOIN films ON seans.id_film=films.id_film
        LEFT JOIN zal ON seans.id_zal=zal.id_zal"
);

if ($result) {
    $counter = 1;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()) {
        $pdf->Cell($w[0], $h, $counter, 'LRBT', '0', 'C', true);
        $pdf->Cell($w[1], $h, $row[0], 'LRB');

        for ($c = 2; $c < 8; $c++) {
            if($c == 6) {
                $row[$c - 1] = date('d-m-Y H:i:s', strtotime($row[$c - 1]));
            }
            $pdf->Cell($w[$c], $h, $row[$c - 1], 'RB');
        }
        $pdf->Ln();
        $counter++;
    }
}

$pdf->Output("I", 'films.pdf', true);
?>