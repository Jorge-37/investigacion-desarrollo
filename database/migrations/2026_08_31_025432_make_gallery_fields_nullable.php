<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {

            $table->string('type')
                ->nullable()
                ->change();

            $table->string('title')
                ->nullable()
                ->change();

            $table->text('description')
                ->nullable()
                ->change();

            $table->string('image')
                ->nullable()
                ->change();

        });
    }


    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {

            $table->string('type')
                ->nullable(false)
                ->change();

            $table->string('title')
                ->nullable(false)
                ->change();

            $table->text('description')
                ->nullable(false)
                ->change();

            $table->string('image')
                ->nullable(false)
                ->change();

        });
    }
};