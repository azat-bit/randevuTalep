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
                $table->bigIncrements('id');            // Kullanıcı ID'si (primary key)
                $table->string('name');                 // Kullanıcının adı
                $table->string('email')->unique();      // Kullanıcının email adresi
                $table->timestamp('email_verified_at')->nullable(); // Email doğrulama zamanı
                $table->string('password');             // Kullanıcının şifresi
                $table->rememberToken();                // Oturum hatırlama tokenı
                $table->timestamps();                   // created_at ve updated_at
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
    

