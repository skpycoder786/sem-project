<?php

namespace App\Exports;

use App\Models\student;
use App\Models\studentSubject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Name',
            'Email',
            'Roll No' 
        ];
    } 

    public function collection()
    {
        $subject = Session()->get('subject');
        $student_id = studentSubject::where('subject', $subject)->get()->pluck('student_id')->toArray();
        return student::select('name', 'email', 'rollNo')->whereIn('id', $student_id)->get();
    }
}
