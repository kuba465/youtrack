<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->name = 'Open';
        $status->save();

        $status = new Status();
        $status->name = 'In Progress';
        $status->save();

        $status = new Status();
        $status->name = 'To be discussed';
        $status->save();

        $status = new Status();
        $status->name = 'Reopened';
        $status->save();

        $status = new Status();
        $status->name = 'Duplicate';
        $status->save();

        $status = new Status();
        $status->name = 'Fixed';
        $status->save();

        $status = new Status();
        $status->name = 'Incompleted';
        $status->save();

        $status = new Status();
        $status->name = 'Verified';
        $status->save();

        $status = new Status();
        $status->name = 'Suspended';
        $status->save();
    }
}
