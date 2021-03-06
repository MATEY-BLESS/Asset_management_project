<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetRegistrationLinkLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_reg_link_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_registration_link_id')->unsigned()->index()->nullable();
            $table->integer('location_id')->index()->unsigned()->nullable();
            $table->integer('added_by_id')->index()->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamp('created_at')->default(date('y-m-d H:i:s', strtotime('now')));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_reg_link_locations');
    }
}
