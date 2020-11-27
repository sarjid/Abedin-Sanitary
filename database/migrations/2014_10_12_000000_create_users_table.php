<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('image')->nullable();
            $table->integer('category')->nullable();
            $table->integer('delar')->nullable();
            $table->integer('products')->nullable();
            $table->integer('employee')->nullable();
            $table->integer('our_service')->nullable();
            $table->integer('customer_review')->nullable();
            $table->integer('about_us')->nullable();
            $table->integer('contact')->nullable();
            $table->integer('message')->nullable();
            $table->integer('settings')->nullable();
            $table->integer('admin_create')->nullable();
            $table->integer('role')->default(1);
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
