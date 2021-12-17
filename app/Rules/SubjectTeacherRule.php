<?php

namespace App\Rules;

use App\Models\teacher;
use App\Models\teacherSubject;
use Illuminate\Contracts\Validation\Rule;

class SubjectTeacherRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    /**
     * @var string
     */
    private $user_email;
    public function __construct($user_email)
    {
        //
        $this->email = $user_email;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $teacher_id = teacher::where('email', $this->email)->first();
        if($teacher_id) {
            $check = teacherSubject::where('teacher_id', $teacher_id->id)->where('subject', $value)->first();
            if($check) {
                return true;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This teacher does not belongs to this subject.';
    }
}
