<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = [
            [
                'title' => 'Workbench and Xamp',
                'content' => 'Learn what is the MySQL Workbench and how to start it with XAMPP',
                'module_id' => '1',
            ],
            [
                'title' => 'Basic commands CREATE TABLE, SELECT, etc',
                'content' => 'Learn how to create a database, tables and rows, and see it',
                'module_id' => '2',

            ],
            [
                'title' => '< > = <= >= and much more!',
                'content' => 'In this content, you will learn how operators work in MySQL!',
                'module_id' => '3',
            ],
            [
                'title' => 'Installing Laravel',
                'content' => 'With the best documentation you will ever see, we can install Laravel easyly',
                'module_id' => '6',
            ],
            [
                'title' => 'Routes',
                'content' => 'Learn how to create Routes',
                'module_id' => '7',
            ],
            [
                'title' => 'Views',
                'content' => 'What is views? Learn to create templates, and use @extends and @sections',
                'module_id' => '7',
            ],
            [
                'title' => 'Database',
                'content' => 'With Eloquent we can connect our database in a fast and great way',
                'module_id' => '8',
            ],
            [
                'title' => 'Controllers',
                'content' => 'Learn to manage our first Controller!',
                'module_id' => '8',
            ],
            [
                'title' => 'A Javascript runtime!',
                'content' => 'Why Node?',
                'module_id' => '9',
            ],
            [
                'title' => 'EventLoop',
                'content' => 'Learn how EventLoop works',
                'module_id' => '9',
            ],
            [
                'title' => 'Async examples',
                'content' => 'Few examples on how async works',
                'module_id' => '10',
            ],
            [
                'title' => 'Async functions in the code',
                'content' => 'Putting all the theory on paper! (or, in this case, computer)',
                'module_id' => '10',
            ]
        ];

        foreach ($contents as $content){
            Content::create(array(
                'title' => $content['title'],
                'content' => $content['content'],
                'module_id' => $content['module_id']
            ));
        }
    }
}
