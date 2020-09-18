<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bodys =['瞑想する','筋トレをする','読書をする'];
        foreach ($bodys as $body) {
            DB::table('tasks')->insert([
                'body' => $body,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ]);
        }
    }
}
