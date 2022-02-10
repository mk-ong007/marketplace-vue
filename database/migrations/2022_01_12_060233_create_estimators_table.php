<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimators', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->text('address');
            $table->string('company_name', 255);
            $table->string('cnt_no', 255);
            $table->dateTime('dob', $precision = 0);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('zip', 255);
            $table->string('country', 255);
            $table->string('bank _account_name', 255);
            $table->string('account_number', 255);
            $table->string('bank_name', 255);
            $table->string('bank_swift', 255);
            $table->string('bank_address', 255);
            $table->string('currency', 255);
            $table->tinyInteger('is_user_login' );
            $table->longText('brand');
            $table->longText('year_of_production');
            $table->string('commission', 255);
            $table->tinyInteger('active');
            $table->integer('email_verified');
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
        Schema::dropIfExists('estimators');
    }
}
