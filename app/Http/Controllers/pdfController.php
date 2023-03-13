<?php

namespace App\Http\Controllers;

use App\Models\timetable;
use App\Models\event;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class pdfController extends Controller
{
    public function pdf(Timetable $id)
    {   
        $timetableInfo = new timetableController;
        $timetable = $timetableInfo->retrieve($id);
        $data["title"] = $timetable[0]->title;
        $data["semester"] = $timetable[0]->semester;
        $days = array("Mon", "Tue", "Wed", "Thu", "Fri");
        $times = array(0, 1, 2, 3, 4, 5 ,6 ,7, 8);
        foreach($days as $day)
        {
            foreach($times as $time)
            {
                foreach($timetable as $tt){
                    $dataDay = $tt->day;
                    $dataTime = $tt->time;
                    if($day == $dataDay && $time == $dataTime)
                    {
                        $data[$day . "_" . $time] =  $tt->name;
                        break;
                    }
                    elseif (!isset($data[$day . "_" . $time]))
                    {
                        $data[$day . "_" . $time] = "";
                    }
                }
            }
        }
        $pdf = PDF::loadView('pdf', $data);
        $result =  $pdf->stream('document.pdf');
        return $result;
    }

    public function excel(Timetable $id)
    {
        $timetableInfo = new timetableController;
        $timetable = $timetableInfo->retrieve($id);
        $data["title"] = $timetable[0]->title;
        $data["semester"] = $timetable[0]->semester;
        $days = array("Mon", "Tue", "Wed", "Thu", "Fri");
        $times = array(0, 1, 2, 3, 4, 5 ,6 ,7, 8);
        foreach($days as $day)
        {
            foreach($times as $time)
            {
                foreach($timetable as $tt){
                    $dataDay = $tt->day;
                    $dataTime = $tt->time;
                    if($day == $dataDay && $time == $dataTime)
                    {
                        $data[$day . "_" . $time] =  $tt->name;
                        break;
                    }
                    elseif (!isset($data[$day . "_" . $time]))
                    {
                        $data[$day . "_" . $time] = "";
                    }
                }
            }
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $arrayTimetable = [
            ['title: ', $data["title"]],
            ['semester: ', $data["semester"]]
        ];

        $sheet->fromArray($arrayTimetable, "", 'B1');
        $arrayEvent = [
            ["Time\Day", "Mon", "Tue", "Wed", "Thu", "Fri"],
            ["08.00-09.00", $data["Mon_0"], $data["Tue_0"], $data["Wed_0"], $data["Thu_0"], $data["Fri_0"]],
            ["09.00-10.00", $data["Mon_1"], $data["Tue_1"], $data["Wed_1"], $data["Thu_1"], $data["Fri_1"]],
            ["10.00-11.00", $data["Mon_2"], $data["Tue_2"], $data["Wed_2"], $data["Thu_2"], $data["Fri_2"]],
            ["11.00-12.00", $data["Mon_3"], $data["Tue_3"], $data["Wed_3"], $data["Thu_3"], $data["Fri_3"]],
            ["12.00-13.00", $data["Mon_4"], $data["Tue_4"], $data["Wed_4"], $data["Thu_4"], $data["Fri_4"]],
            ["13.00-14.00", $data["Mon_5"], $data["Tue_5"], $data["Wed_5"], $data["Thu_5"], $data["Fri_5"]],
            ["14.00-15.00", $data["Mon_6"], $data["Tue_6"], $data["Wed_6"], $data["Thu_6"], $data["Fri_6"]],
            ["15.00-16.00", $data["Mon_7"], $data["Tue_7"], $data["Wed_7"], $data["Thu_7"], $data["Fri_7"]],
            ["16.00-17.00", $data["Mon_8"], $data["Tue_8"], $data["Wed_8"], $data["Thu_8"], $data["Fri_8"]]
        ];
        $sheet->fromArray($arrayEvent, "", 'A3');
        $writer = new Xlsx($spreadsheet);
        $writer->save('../storage/app/public/Your Timetable.xlsx');
        return redirect('storage/Your Timetable.xlsx');
    }
}
