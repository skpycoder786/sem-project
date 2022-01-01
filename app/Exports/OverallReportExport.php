<?php

namespace App\Exports;

use App\Models\attendance;
use App\Models\student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OverallReportExport implements FromCollection,WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Name',
            'Roll No',
            'Total Attendance count',
            'Total Attendance (%)'
        ];
    } 


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $totalStudents = student::get();
        $allRecords = attendance::get();
        $arr = [];
        $presentees = [];
        for($i=0; $i<sizeof($allRecords); $i++) {
            eval('$presentees = ' . $allRecords[$i]->students . ' ;');
            foreach($totalStudents as $student) {
                if(in_array($student->rollNo, $presentees) && !array_key_exists($student->rollNo, $arr)) {
                    $arr[$student->rollNo] = 1;
                } else if(in_array($student->rollNo, $presentees) && array_key_exists($student->rollNo, $arr)) {
                    $arr[$student->rollNo] += 1;
                }
            }
        }

        $final_arr = [];
        $classes = count($allRecords);
        foreach($totalStudents as $student) {
            if(array_key_exists($student->rollNo, $arr)) {
                $attn_pert = ($arr[$student->rollNo] / $classes) * 100;
                $attn_pert = (int)$attn_pert;
                $final_arr[] = array(
                    $student->name,
                    $student->rollNo,
                    $arr[$student->rollNo],
                    $attn_pert
                );
            } else {
                $final_arr[] = array(
                    $student->name,
                    $student->rollNo,
                    '0',
                    '0'
                );
            }
        }
        
        return collect($final_arr);
    }
}
