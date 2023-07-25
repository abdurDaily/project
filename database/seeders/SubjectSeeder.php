<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**1st semester courses start */
        $user = new Subject();
        $user->subject_name = 'Engineering Drawing (CE-1108)';
        $user->author = 'abdur';
        $user->semester_id = '1';
        $user->save();
        
        $user = new Subject();
        $user->subject_name = 'Electrical Circuit I DC (EEE-1103)';
        $user->author = 'abdur';
        $user->semester_id = '1';
        $user->save();
        
        $user = new Subject();
        $user->subject_name = 'Electrical Circuit I DC Sessional (EEE-1104)';
        $user->author = 'abdur';
        $user->semester_id = '1';
        $user->save();
        
        $user = new Subject();
        $user->subject_name = 'Mathematics-I (Differential and Integral Calculus) (MATH-1107)';
        $user->author = 'abdur';
        $user->semester_id = '1';
        $user->save();
        
        $user = new Subject();
        $user->subject_name = 'Physics I (PHY-1101)';
        $user->author = 'abdur';
        $user->semester_id = '1';
        $user->save();
        
        $user = new Subject();
        $user->subject_name = 'Advanced English (UREL-1106)';
        $user->author = 'abdur';
        $user->semester_id = '1';
        $user->save();
        
        $user = new Subject();
        $user->subject_name = 'Text of Ethics and Morality (UREM-1101)';
        $user->author = 'abdur';
        $user->semester_id = '1';
        $user->save();
        /**1st semester courses end */
    }
}