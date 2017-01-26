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
            $table->string('main_contact');
            $table->string('main_number');
            $table->string('alt_number')->nullable()->default(null);
            $table->string('age')->nullable()->default(null);
            $table->text('other_names');
            $table->string('address');
            $table->string('zip');
            $table->float('lat', 10, 6);
            $table->float('lng', 10, 6);
            $table->boolean('home_is_damaged')->default(false);
            $table->enum('owner_renter', ['own', 'rent'])->default('own');
            $table->integer('number_of_stories')->nullable()->default(null);
            $table->integer('sq_ft')->nullable()->default(null);
            $table->boolean('is_primary_home')->default(false);
            $table->string('insurance_agency')->nullable()->default(null);
            $table->boolean('is_staying_home')->default(false);
            $table->enum('home_damage', ['destroyed', 'unlivable', 'damaged']);
            $table->boolean('has_power')->default(false);

            $table->boolean('needs_medical')->default(false);
            $table->boolean('has_baby')->default(false);
            $table->string('diaper_size')->nullable()->default(null);
            $table->boolean('needs_formula')->default(false);
            $table->string('formula_type')->nullable()->default(null);
            $table->boolean('needs_milk')->default(false);
            $table->text('over_counter_meds')->nullable()->default(null);
            $table->text('clothing_needs')->nullable()->default(null);
            $table->boolean('needs_transportation')->default(false);
            $table->boolean('needs_home_repair')->default(false);
            $table->boolean('needs_trees_cut')->default(false);
            $table->boolean('needs_tarp')->default(false);
            $table->boolean('needs_debris_cleaned')->default(false);
            $table->text('repair_comments')->nullable()->default(null);
            $table->integer('physical_health_scale')->unsigned()->nullable()->default(null);
            $table->integer('emotional_health_scale')->unsigned()->nullable()->default(null);
            $table->text('what_to_pray')->nullable()->default(null);
            $table->boolean('attends_local_church')->default(false);
            $table->string('church_attended')->nullable()->default(null);
            $table->boolean('applied_for_disaster_assistance')->default(false);
            $table->boolean('applied_for_fema_food_stamps')->default(false);
            $table->boolean('agrees_to_terms')->default(false);
            $table->string('digital_signature');
            $table->text('volunteers_that_visited');
            $table->text('resources_provided')->nullable()->default(null);
            $table->text('additional_notes')->nullable()->default(null);
            $table->boolean('wants_to_help_long_term')->default(false);
            $table->text('needs_to_be_provided')->nullable()->default(null);
            $table->string('member_name');
            $table->string('member_phone');
            $table->string('member_email');
            $table->string('member_facebook');
            $table->boolean('is_associated_with_church')->default(false);
            $table->string('church_association')->nullable()->default(null);
            $table->boolean('can_contact')->default(false);
            $table->boolean('is_completed')->default(false);
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
