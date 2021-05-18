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
        $admin->avatar='https://lh3.googleusercontent.com/a-/AOh14Gg0E5VWG25VRbeBmt1hoJrnrDQoR3MH9B4ACLXllfk=s96-c';
        $admin->save();
    }
}
