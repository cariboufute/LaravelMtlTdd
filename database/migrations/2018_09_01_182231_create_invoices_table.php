<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->text('client_address')->nullable();
            $table->date('invoiced_at')->nullable();
            $table->date('due_at')->nullable();
            $table->unsignedTinyInteger('tax_display')->nullable();
            $table->text('lines')->nullable();
            $table->text('invoice_message')->nullable();
            $table->text('statement_message')->nullable();
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
}
