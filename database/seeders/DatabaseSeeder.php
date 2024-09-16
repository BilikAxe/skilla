<?php

namespace Database\Seeders;

use App\Models\Partnership;
use App\Models\User;
use App\Models\Worker;
use App\Models\WorkerExOrderType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         Worker::factory(10)->create();
         Partnership::factory(10)->create();
         WorkerExOrderType::factory(10)->create();
    }
}
