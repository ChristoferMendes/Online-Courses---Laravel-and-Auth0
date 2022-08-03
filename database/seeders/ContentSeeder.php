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
                'title' => 'test',
                'content' => 'test for module 1',
                'module_id' => '1'
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
