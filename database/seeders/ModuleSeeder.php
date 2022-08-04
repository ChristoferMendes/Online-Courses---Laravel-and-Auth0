<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'title' => 'Basic conections',
                'descriptions' => 'Hot to set up a server with XAMPP and start to using it',
                'course_id' => '1'
            ],
            [
                'title' => 'First Querys',
                'descriptions' => 'Learn how to create a database and tables',
                'course_id' => '1',
            ],
            [
                'title' => 'Math, relational and logical operators',
                'descriptions' => 'Learn how operators work in MySQL',
                'course_id' => '1',
            ],
            [
                'title' => 'Order By, Join, and more!',
                'descriptions' => 'How to order tables with SELECT and join another table',
                'course_id' => '1',
            ],
            [
                'title' => 'Terminal',
                'descriptions' => 'Getting familliar with the terminal interface',
                'course_id' => '1',
            ],
            [
                'title' => 'Introduction',
                'descriptions' => 'Meet Laravel, a PHP Framework!',
                'course_id' => '2',
            ],
            [
                'title' => 'Routes and Views',
                'descriptions' => 'Learn how routes and views are created in Laravel in a easy way!',
                'course_id' => '2',
            ],
            [
                'title' => 'Database and Controller',
                'descriptions' => 'Meet Eloquent, a ORM and how to deal with Controllers',
                'course_id' => '2',
            ],
            [
                'title' => 'Intro',
                'descriptions' => 'What is Node?',
                'course_id' => '3',
            ],
            [
                'title' => 'Async Node',
                'descriptions' => 'Commands asynchronous in NodeJS!',
                'course_id' => '3',
            ]
        ];

        foreach ($modules as $module){
            Module::create(array(
                'title' => $module['title'],
                'descriptions' => $module['descriptions'],
                'course_id' => $module['course_id']
            ));
        }
        
    }
}
