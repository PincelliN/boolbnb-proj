<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\Visit;
use Carbon\Carbon;

class VisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 3000; $i++) {
            $new_visit = new Visit();
            $new_visit->ip_address = rand(1, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255);
            $new_visit->apartment_id = Apartment::inRandomOrder()->pluck('id')->first();
            $new_visit->created_at = Carbon::now()->subDays(rand(0, 365));
            $new_visit->updated_at = Carbon::now()->subDays(rand(0, 365));
            $new_visit->save();
        }
    }
}
