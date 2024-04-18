<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('a_post', function (Blueprint $table) {
            $table->id();
            $table->string("name", 20)->nullable()->comment("留言者稱呼");
            $table->string("phone", 20)->nullable()->comment("手機號碼");
            $table->string("title")->nullable()->comment("留言標題");
            $table->text("content")->nullable()->comment("留言内容");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_post');
    }
};
