<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrebuildCheckoutPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prebuild_checkout_payment', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_gender');
            $table->string('email')->nullable();
            $table->string('order_id')->default('hysan_001');
            $table->string('amount');
            $table->string('birth');
            $table->string('cis');
            $table->string('grade');
            $table->string('phone');
            $table->string('name1');
            $table->string('nrc1');
            $table->string('name2');
            $table->string('nrc2');
            $table->string('occupation');
            $table->string('sibling_num');
            $table->string('sibling');
            $table->string('guardian');
            $table->string('viber');
            $table->string('states');
            $table->string('address');
            $table->string('total_amount');
            $table->text('remark')->nullable();
            $table->string('transaction_status')->default('PENDING');
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
        Schema::dropIfExists('prebuild_checkout_payment');
    }
}
