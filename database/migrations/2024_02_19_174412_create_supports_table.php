<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\SupportStatus;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supports', function (Blueprint $table) {
            // Type uuid(GUID) AND Primary Key
            $table->uuid('id')->primary();
            // FK of table Users
            $table->uuid('user_id')->index();
            $table->string('subject');
            $table->enum('status', array_column(SupportStatus::cases(), 'name'));
            $table->text('body');
            $table->timestamps();
            // FK of table Users

            // FK | PK | PRIMARY TABLE
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
