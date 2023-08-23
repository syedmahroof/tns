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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('first_name')->nullable();
            $table->text('last_name')->nullable();
            $table->text('designation')->nullable();
            $table->text('department')->nullable();
            $table->text('phone_work')->nullable();
            $table->text('phone_personal')->nullable();
            $table->text('email_work')->nullable();
            $table->text('email_personal')->nullable();
            $table->text('website')->nullable();
            
            $table->text('status')->nullable();
            $table->text('fax')->nullable();
            $table->text('photo')->nullable();
            $table->text('Address')->nullable();
            $table->text('employee_number')->nullable();
            $table->text('UUID')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
