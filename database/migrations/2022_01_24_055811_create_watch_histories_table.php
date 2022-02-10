<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watch_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('staff_watch_unique_id');
            $table->tinyInteger('staff_notify_flag');
            $table->tinyInteger('star_selected_flag');
            $table->tinyInteger('admin_star_selected_flag')->default(0);
            $table->string('seller_id');
            $table->string('brand');
            $table->string('model');
            $table->string('serial_no');
            $table->integer('year_of_prod');
            $table->string('watch_price');
            $table->string('counter_offer_price');
            $table->string('estimated_watch_price');
            $table->string('accepted_price');
            $table->string('email');
            $table->string('compnay_name');
            $table->string('currency');
            $table->string('watch_status');
            $table->string('watch_sold');
            $table->string('watch_unsold_date');
            $table->tinyInteger('watch_unsold_reminder');
            $table->longText('watch_pic');
            $table->string('actions');
            $table->tinyInteger('seller_action_flag');
            $table->tinyInteger('notify_flag');
            $table->tinyInteger('no_estimator_assign');
            $table->integer('counter_offer_count');
            $table->string('quot_receive_date');
            $table->string('staff_response_limit');
            $table->string('deal_completion_date');
            $table->string('seller_partnership_date');
            $table->string('admin_sell_price');
            $table->string('seller_revenue');
            $table->string('admin_rejection_deal');
            $table->tinyInteger('self_selling_flag')->default(0);
            $table->tinyInteger('confirm_payment_flag');
            $table->tinyInteger('confirm_shipping');
            $table->tinyInteger('confirm_acceptance_return_flag');
            $table->tinyInteger('payment_tier');
            $table->tinyInteger('admin_deal_done');
            $table->tinyInteger('staff_reminder_count')->default(0);
            $table->dateTime('staff_reminder_expire_time');
            $table->string('created_on');
            $table->string('updated_on');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watch_histories');
    }
}
