<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('client_id');
            $table->string('client_first_name', 100);
            $table->string('client_last_name', 100);
            $table->string('client_gander', 20);
            $table->int('client_age');
            $table->string('client_email', 100);
            $table->string('client_phone', 100);
            $table->string('client_address', 150);
            $table->int('ref_user_type_id');
            $table->int('client_status');
            $table->timestamps('client_last_login', $precision = 0);
            $table->timestamps('client_created_at', $precision = 0);
            $table->timestamps('client_edited_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
