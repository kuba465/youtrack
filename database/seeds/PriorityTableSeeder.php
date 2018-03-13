<?php

use App\Priority;
use Illuminate\Database\Seeder;

class PriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priority = new Priority();
        $priority->name = 'Minor';
        $priority->save();

        $priority = new Priority();
        $priority->name = 'Normal';
        $priority->save();

        $priority = new Priority();
        $priority->name = 'Major';
        $priority->save();

        $priority = new Priority();
        $priority->name = 'Critical';
        $priority->save();

        $priority = new Priority();
        $priority->name = 'Show-stopper';
        $priority->save();
    }
}
