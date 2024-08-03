<?php

namespace Database\Seeders;

use App\Models\Dos\DosVessel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CommonSystem\Status;
use Illuminate\Support\Facades\File;
use App\Models\Dos\DosCertificateType;
use Illuminate\Support\Facades\Config;
use App\Models\TrainingCenter\InstituteType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LookupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * @var mixed
         * Seeder for Dos status
         */
        $statuses = json_decode(File::get(resource_path('data/default/setting.json')), true);
        DB::table('settings')->insert($statuses);

    }
}
