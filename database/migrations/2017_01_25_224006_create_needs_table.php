<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable()->default(null);;
            $table->string('last_name')->nullable()->default(null);;
            $table->boolean('speaks_spanish')->default(false);
            $table->string('address');
            $table->string('zip');
            $table->string('phone');
            $table->string('email')->nullable()->default(null);
            $table->string('insurance_agency')->nullable()->default(null);
            $table->boolean('has_applied_for_assistance')->default(false);
            $table->boolean('is_staying_home')->default(false);
            $table->boolean('has_power')->default(false);
            $table->text('prayer_needs')->nullable()->default(null);
            $table->boolean('attends_local_church')->default(false);
            $table->string('church_attended')->nullable()->default(null);
            $table->text('additional_notes')->nullable()->default(null);
            $table->boolean('agrees_to_terms')->default(false);
            $table->string('digital_signature');
            $table->float('lat', 10, 6)->nullable()->default(null);
            $table->float('lng', 10, 6)->nullable()->default(null);
            $table->string('zone')->nullable()->default(null);
            $table->boolean('is_pending')->default(false);
            $table->boolean('is_complete')->default(false);
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
        Schema::dropIfExists('needs');
    }
}
