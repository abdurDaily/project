<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new Teacher();
        $teacher->name = 'Engr. Syed Zahidur Rashid';
        $teacher->slug = uniqid(Str::slug('Syed-Zahidur-Rashid'));
        $teacher->designation = 'Assistant Professor & Chairman';
        $teacher->phone = '+8802334461900';
        $teacher->email = 'szrashidcce@yahoo.com';
        $teacher->image = 'ZahidurRashid.jpg';
        $teacher->website = 'https://www.facebook.com/szrashid';
        $teacher->edu_info = '<ul>
        <li>M.Sc. in Computer Science and Engineering</li>
        <li>Major in Advanced Optical Communication Systems and Networks</li>
        <li>B.Sc. in Computer and Communication Engineering</li>
        <li>H.S.C. Science, Chittagong College</li>
      </ul>';
        $teacher->biography = ''; 
        $teacher->research = '<ul>
        <li>Wireless and Mobile Networks</li>
        <li>IoT and M2M Communications</li>
        <li>Optical Networks</li>
        <li>Computer Networks</li>
        <li>Antenna Technology</li>
        <li>RF and Microwave</li>
        <li>Network Security</li>
        <li>Deep Learning</li>
      </ul>'; 
      $teacher->teaching_sub = '<ul>
      <li>Computer Networks</li>
      </ul>';
      $teacher->save();
    }
}