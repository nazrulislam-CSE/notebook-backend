<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notebook;
class NotebookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notebooks = [
            ['title' => 'Notebook 1', 'description' => 'This is the first notebook description.'],
            ['title' => 'Notebook 2', 'description' => 'This is the second notebook description.'],
            ['title' => 'Notebook 3', 'description' => 'This is the third notebook description.'],
            ['title' => 'Notebook 4', 'description' => 'This is the fourth notebook description.'],
            ['title' => 'Notebook 5', 'description' => 'This is the fifth notebook description.'],
            ['title' => 'Notebook 6', 'description' => 'This is the sixth notebook description.'],
            ['title' => 'Notebook 7', 'description' => 'This is the seventh notebook description.'],
            ['title' => 'Notebook 8', 'description' => 'This is the eighth notebook description.'],
            ['title' => 'Notebook 9', 'description' => 'This is the ninth notebook description.'],
            ['title' => 'Notebook 10', 'description' => 'This is the tenth notebook description.'],
        ];

        foreach ($notebooks as $notebook) {
            Notebook::updateOrCreate(
                ['title' => $notebook['title']],  
                ['description' => $notebook['description']]  
            );
        }
    }
}
