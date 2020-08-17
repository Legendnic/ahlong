<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade');
            $table->string('block_hash');
            $table->string('consensus');
            $table->foreignId('contract_id')
            ->constrained('contracts')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['contract_id']);
        $table->dropForeign(['user_id']);
        Schema::dropIfExists('block_logs');
    }
}
