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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');                
            $table->string('host');                
            $table->text('description')->nullable(); 
            $table->date('date');
            $table->time('start_time')->nullable(); 
            $table->time('end_time')->nullable();   
            $table->string('location');            
            $table->decimal('latitude', 10, 7)->nullable();  
            $table->decimal('longitude', 10, 7)->nullable(); 
            $table->string('image_path')->nullable(); 
            $table->foreignId('user_id')           
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
