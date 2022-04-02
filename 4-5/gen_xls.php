<?php
require_once 'connect1.php';
require_once('php_excel/Classes/PHPExcel.php');
require_once('php_excel/Classes/PHPExcel/Writer/Excel2007.php');

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno){
    echo "Не удалось подключиться к БД";
}

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

$xls = new PHPExcel();
// Устанавливаем индекс активного листа
$xls->setActiveSheetIndex(0);
// Получаем активный лист
$sheet = $xls->getActiveSheet();
// Подписываем лист
$sheet->setTitle('Киносеансы');
// Вставляем текст в ячейку A1
$sheet->setCellValue("A1", 'Киносеансы');
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
// Объединяем ячейки
$sheet->mergeCells('A1:I1');
// Выравнивание текста
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$c = 0;

$header = array("п/п", "Название фильма", "Жанр", "Год", "Кинозал", "Категория", "Дата и время", "Свободных мест");
foreach ($header as $h){
    $sheet->setCellValueByColumnAndRow($c,2,$h);
    // Применяем выравнивание
    $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
    $c++;
}

if ($result){
    $r = 3;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()){
        $c = 0;

        $sheet->setCellValueByColumnAndRow($c,$r,$r-2);
        $c++;

        foreach ($row as $cell){
            if ($c==6){
                    $cell = date('d-m-Y H:i:s', strtotime($cell));
                }
            $sheet->setCellValueByColumnAndRow($c,$r,$cell);
            $c++;
        }
        $r++;
    }
}

header('Content-Type: application/xls');
header('Content-Disposition: inline; filename=films.xls');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

$objWriter = new PHPExcel_Writer_Excel5($xls);
$objWriter->save('php://output');
?>