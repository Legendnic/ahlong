<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitcoinKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitcoin_keys', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('company_id')
            ->constrained('companies')
            ->onDelete('cascade');
            $table->string('private_key');
            $table->string('wallet_address');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['company_id']);
        Schema::dropIfExists('bitcoin_keys');
    }
}
