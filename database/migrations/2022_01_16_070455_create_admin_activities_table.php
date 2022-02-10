<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_activities', function (Blueprint $table) {
            $table->id();
            $table->string('admin_group', 255);
            $table->integer('user1_id');
            $table->integer('user2_id');
            $table->string('staff_watch_unique_id', 255);
            $table->string('type', 255);
            $table->longText('watch_details');
            $table->string('watch_id', 255);
            $table->string('watch_status', 255);
            $table->longText('watch_pic');
            $table->text('message');
            $table->tinyInteger('is_read');
            $table->integer('seller_is_read');
            $table->tinyInteger('admin_msg_read');
            $table->tinyInteger('seller_msg_read');
            $table->dateTime('quot_receive_date');
            $table->string('approve_uniques_id', 80);
            $table->string('actions', 30);
            $table->tinyInteger('star_selected_flag_seller');
            $table->tinyInteger('star_selected_flag_admin');
            $table->tinyInteger('forget_pass_req');
            $table->tinyInteger('admin_msg_received');
            $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_activities');
    }
}
