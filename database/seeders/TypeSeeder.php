<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tipi = [
            "fullStack" => [
                "task" => 'Full Stack',
                "icon" => 'Full Stack'
            ],
            "backEnd" => [
                "task" => 'backEnd',
                "icon" => 'backEnd'
            ],
            "frontEnd" => [
                "task" => 'frontEnd',
                "icon" => 'frontEnd'
            ],
            "design" => [
                "task" => 'design',
                "icon" => 'design'
            ],
        ];
        foreach ($tipi as $key => $type) {
            $newType = new Type();
            $newType->task = $tipi[$key]['task'];
            $newType->icon = $tipi[$key]['icon'];
            $newType->save();
        }
    }
}
