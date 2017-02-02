<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('affiliation')->nullable()->default(null);
            $table->boolean('debris_removal')->default(false);
            $table->boolean('home_repair')->default(false);
            $table->boolean('deliveries')->default(false);
            $table->boolean('administrative')->default(false);
            $table->boolean('sorting')->default(false);
            $table->boolean('communications')->default(false);
            $table->boolean('counseling')->default(false);
            $table->string('other')->nullable()->default(null);
            $table->text('resources_available')->nullable()->default(null);
            $table->string('time_commitment');
            $table->boolean('speaks_spanish')->default(false);
            $table->text('additional_comments')->nullable()->default(null);
            $table->date('date_available');
            $table->boolean('agrees_to_terms')->default(false);
            $table->string('digital_signature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
}
