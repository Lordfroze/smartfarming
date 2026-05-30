<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('email')
                ->unique();

            $table->string('password');

            $table->enum('role', [
                'admin',
                'worker',
            ])->default('worker');

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | PLANT TYPES
        |--------------------------------------------------------------------------
        */
        Schema::create('plant_types', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('category')
                ->nullable();

            $table->text('description')
                ->nullable();

            $table->integer('estimated_harvest_days')
                ->nullable();

            $table->string('status')
                ->default('active');

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | LOCATIONS
        |--------------------------------------------------------------------------
        */
        Schema::create('locations', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('type')
                ->nullable();

            $table->text('description')
                ->nullable();

            $table->string('status')
                ->default('active');

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | PLANT BATCHES
        |--------------------------------------------------------------------------
        */
        Schema::create('plant_batches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plant_type_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('location_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('batch_code')
                ->unique();

            $table->date('start_date');

            $table->date('estimated_harvest_date')
                ->nullable();

            $table->date('actual_harvest_date')
                ->nullable();

            $table->integer('total_seed')
                ->default(0);

            $table->string('status')
                ->default('active');

            $table->text('notes')
                ->nullable();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | CARE TEMPLATES
        |--------------------------------------------------------------------------
        */
        Schema::create('care_templates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plant_type_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('day_offset');

            $table->string('activity_type');

            $table->string('title');

            $table->text('description')
                ->nullable();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | CARE SCHEDULES
        |--------------------------------------------------------------------------
        */
        Schema::create('care_schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plant_batch_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('care_template_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->date('scheduled_date');

            $table->date('completed_date')
                ->nullable();

            $table->string('status')
                ->default('pending');

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | ACTIVITY LOGS
        |--------------------------------------------------------------------------
        */
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plant_batch_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('care_schedule_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('activity_type');

            $table->dateTime('activity_date');

            $table->string('title');

            $table->text('notes')
                ->nullable();

            $table->decimal('quantity', 10, 2)
                ->nullable();

            $table->string('unit')
                ->nullable();

            $table->string('status')
                ->default('completed');

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | HARVESTS
        |--------------------------------------------------------------------------
        */
        Schema::create('harvests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plant_batch_id')
                ->constrained()
                ->restrictOnDelete();

            $table->date('harvest_date');

            $table->decimal('quantity', 10, 2);

            $table->string('unit')
                ->default('ikat');

            $table->string('quality_grade')
                ->nullable();

            $table->text('notes')
                ->nullable();

            $table->string('status')
                ->default('recorded');

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | ATTACHMENTS
        |--------------------------------------------------------------------------
        */
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('activity_log_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('file_path');

            $table->string('file_type')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attachments');
        Schema::dropIfExists('harvests');
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('care_schedules');
        Schema::dropIfExists('care_templates');
        Schema::dropIfExists('plant_batches');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('plant_types');
        Schema::dropIfExists('users');
    }
};
