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
        Schema::create('cms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('website_name');
            $table->text('logo');
            $table->text('primary_color');
            $table->text('secondary_color');
            $table->timestamps();
        });

        // Insert data into the table
        DB::table('cms')->insert([
            'id' => 1,
            'website_name' => 'Maxy Kediri',
            'logo' => 'logo.jpg',
            'primary_color' => '000',
            'secondary_color' => '#CFB538',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
