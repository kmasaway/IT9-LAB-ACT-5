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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('first_name', 20)->nullable();
            $table->string('last_name', 25);
            $table->string('email', 100)->unique();
            $table->string('phone_number', 20)->nullable();
            $table->date('hire_date');
            $table->foreignId('job_id')
                ->constrained('jobs', 'job_id')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->decimal('salary', 8, 2);
            $table->foreignId('manager_id')
                ->nullable()
                ->constrained('employees', 'employee_id')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('department_id')
                ->constrained('departments', 'department_id')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
