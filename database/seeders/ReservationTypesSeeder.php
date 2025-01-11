<?php

namespace Database\Seeders;

use App\Models\ReservationType;
use Illuminate\Database\Seeder;

class ReservationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(ReservationType::count() == 0) {
            ReservationType::create([
                'name' => 'مراجعة',
            ]);
            ReservationType::create([
                'name' => 'استشارة أولية',
            ]);
        }
    }
}
