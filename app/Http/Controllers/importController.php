<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class importController extends Controller
{
    public function import()
    {
        $success = request()->file('file_upload')->store('public');
        $piece = explode("/", $success);
        $fileName = $piece[1];
        $dataFile = '../storage/app/public/' . $fileName;
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::load($dataFile);
        $sheet = $reader->getActiveSheet();
        $title = $sheet->getCellByColumnAndRow(3,1)->getValue();
        $semester = $sheet->getCellByColumnAndRow(3,2)->getValue();
        $timetable = array($title, $semester);
        $dataArray = $sheet->rangeToArray('B4:F12', null);
        $days = array("Mon", "Tue", "Wed", "Thu", "Fri");
        $times = array(0, 1, 2, 3, 4, 5 ,6 ,7, 8);
        $event = array();

        foreach ($dataArray as $val)
        {
            for ($i = 0; $i < count($val); $i++)
            {
                array_push($event, $val[$i]);
            }
        }
        $i = 0;
        $j = 0;
        $content = array();
        foreach ($event as $val)
        {
            if ($val != null)
            {
                array_push($content, $val . "-" . $days[$i] . "-" . $times[$j] );
            }
            $i++;
            if ( $i == 5)
            {
                $j++;
                $i = 0;
            }
            if ($j == 9)
            {
                $j = 0;
            }
        }
        $result = array($timetable, $content);

        return $result;
    }
}
