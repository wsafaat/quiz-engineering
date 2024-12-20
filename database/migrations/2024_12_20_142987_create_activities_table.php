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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->enum('activity_type', ['guidance', 'vacancy', 'class', 'session', 'event'])->index();
            $table->string('activity_name');
            $table->text('activity_description');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->text('location')->nullable();
            $table->foreignId('company_user_role_id')->constrained('company_user_roles');
            $table->foreignId('company_id')->constrained('companies');
            $table->boolean('is_published')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
