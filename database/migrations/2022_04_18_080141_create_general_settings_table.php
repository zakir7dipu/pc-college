<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('location_map')->nullable();
            $table->longText('logo')->nullable();
            $table->longText('favicon')->nullable();
            $table->longText('site_tag_image')->nullable();
            $table->boolean('info_section_show')->default(true);
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
        Schema::dropIfExists('general_settings');
    }
}
