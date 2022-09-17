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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('to')
                ->index()
                ->comment('it will store person or organization who make transaction with user');
            $table->bigInteger('base_price')
                ->comment('it will stores price per selected unit');
            $table->double('amount');
            $table->string('unit');
            $table->string('type');
            $table->bigInteger('total_price')
                ->comment('it will stores result from base_price multiply by amount');
            $table->timestamp('transaction_date')->index();           
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
        Schema::dropIfExists('invoices');
    }
};
