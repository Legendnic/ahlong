<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('loaner_user')
            ->constrained('users')
            ->onDelete('cascade');
            $table->foreignId('loaner_company')
            ->constrained('companies')
            ->onDelete('cascade');
            $table->foreignId('loanee_user')
            ->constrained('users')
            ->onDelete('cascade');
            $table->foreignId('loanee_company')
            ->constrained('companies')
            ->onDelete('cascade');
            $table->string('bitcoin_receiver');
            $table->float('bitcoin_value');
            $table->foreignId('bitcoin_key',8,2)
            ->constrained('bitcoin_keys')
            ->onDelete('cascade');
            $table->date('date_start');
            $table->date('due_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['loaner_user']);
        $table->dropForeign(['loaner_company']);
        $table->dropForeign(['loanee_user']);
        $table->dropForeign(['loanee_company']);
        $table->dropForeign(['bitcoin_key']);

        Schema::dropIfExists('contracts');
    }
}
