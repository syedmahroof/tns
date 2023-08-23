<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title')->nullable();       // For MySQL 8.0 use string('name', 125);
            $table->string('key_words')->nullable();  
            $table->string('meta_description')->nullable(); 
            $table->string('instagram')->nullable(); 
            $table->string('facebook')->nullable(); 
            $table->string('linkedin')->nullable(); 
            $table->string('twitter')->nullable();  
            $table->string('tiktok')->nullable();  
            $table->string('youtube')->nullable();
            $table->string('footer_text')->nullable();  
            $table->string('additional_seo_code')->nullable();  
            $table->string('additional_css_code')->nullable();  
            $table->string('additional_js_code')->nullable();  
            $table->string('banner_text')->nullable();  
            $table->string('banner_image_1')->nullable();  
            $table->string('banner_image_2')->nullable();  
            $table->string('banner_image_3')->nullable();  
            $table->string('banner_image_4')->nullable();  
            $table->string('phone')->nullable();  
            $table->string('mail')->nullable();  
            $table->text('address')->nullable();  
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
        Schema::dropIfExists('profiles');
    }
};
