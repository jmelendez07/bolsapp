<?php

use App\Models\Candidate;
use App\Models\Job;
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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Pendiente', 'Aprovada', 'Rechazada'])->default('Pendiente');
            $table->foreignIdFor(Candidate::class, 'candidate_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Job::class, 'job_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
