<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin= new Profile();
        $admin->user_id=1;
        $admin->profile_link='zenith-jhony';
        $admin->save();
    }
}
