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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('description');   
            $table->enum('status', ['Résolu', 'En cours', 'Fermé'])->default('En cours'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('software_id')->constrained()->onDelete('cascade');
            $table->enum('priority', ['Haute', 'Moyenne', 'Basse']);
            $table->text('issue_steps')->nullable(); 
            $table->string('screenshot')->nullable();
            $table->text('scenario_description')->nullable();
            $table->enum('system', ['Windows', 'MacOS', 'Linux', 'Autre']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
