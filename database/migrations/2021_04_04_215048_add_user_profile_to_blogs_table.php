<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserProfileToBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();
        Schema::table('blogs', function (Blueprint $table) use ($driver) {

            if ('sqlite' === $driver) {
                $table->bigInteger('profile_user_id')->unsigned()->index()->default(0);
            } else {
                $table->bigInteger('profile_user_id')->unsigned()->index();
            }
            
            $table->foreign('profile_user_id')->references('user_id')->on('profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('blogs', function (Blueprint $table) {
            //
            $table->dropForeign('profile_user_id');
            $table->dropColumn('profile_user_id');
        });
    }
}
