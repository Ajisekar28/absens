<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            // $table->unsignedBigInteger('jurusan_id');
            // $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade');
            // $table->unsignedBigInteger('kelas_id');
            // $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->string('pin_code')->nullable();
            $table->text('permissions')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
