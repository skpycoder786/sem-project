<?php

namespace App\Exports;

use App\Models\attendance;
use App\Models\student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use Ramsey\Collection\Collection;

class TodayReportExport implements FromCollection,WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Name',
            'Roll No',
            'Status' 
        ];
    } 


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $totalStudents = student::get();
        $presentees = attendance::whereDate('created_at', Carbon::today())->first()->students;
        eval('$presentees = ' . $presentees . ' ;');
        $arr = [];
        foreach($totalStudents as $student) {
            if(in_array($student->rollNo, $presentees)) {
                $arr[] = array(
                    $student->name,
                    $student->rollNo,
                    'present'   
                );
            } else {
                $arr[] = array(
                    $student->name,
                    $student->rollNo,
                    'absent'
                );
            }
        }
        return collect($arr);
    }
}
