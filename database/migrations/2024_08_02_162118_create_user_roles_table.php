<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('user_type');
            $table->integer('status');
            $table->timestamps();
        });
        Schema::create('game', function (Blueprint $table) {
            $table->id(); // Tạo trường 'id' với kiểu INT, tự động tăng và khóa chính
            $table->string('name', 255)->notNull(); // Trường 'name' với kiểu VARCHAR(255) và không cho phép NULL
            $table->text('description')->nullable(); // Trường 'description' với kiểu TEXT và có thể NULL
            $table->text('cover_img')->nullable(); // Trường 'cover_img' với kiểu TEXT và có thể NULL
            $table->foreignId('topic_id')->constrained('topic')->onDelete('cascade'); // Khóa ngoại 'topic_id' tham chiếu đến trường 'id' của bảng 'topic'
            $table->foreignId('created_by')->constrained('user')->onDelete('cascade'); // Khóa ngoại 'created_by' tham chiếu đến trường 'id' của bảng 'user'
            $table->timestamps(); // Trường 'created_at' và 'updated_at' tự động tạo timestamp, 'updated_at' sẽ tự động cập nhật khi có thay đổi
            $table->timestamp('end_time')->nullable(); // Trường 'end_time' với kiểu TIMESTAMP và có thể NULL
        });
        Schema::create('question', function (Blueprint $table) {
            $table->id(); // Tạo trường 'id' với kiểu INT, tự động tăng và khóa chính
            $table->foreignId('game_id')->constrained('game')->onDelete('cascade'); // Khóa ngoại 'game_id' tham chiếu đến trường 'id' của bảng 'game'
            $table->text('content')->notNull(); // Trường 'content', kiểu TEXT và không được null
            $table->integer('countdown_time')->notNull(); // Trường 'countdown_time', kiểu INTEGER và không được null
            $table->foreignId('question_type_id')->constrained('question_type')->onDelete('cascade'); // Khóa ngoại 'question_type_id' tham chiếu đến trường 'id' của bảng 'question_type'
            $table->timestamps(); // Trường 'created_at' và 'updated_at' tự động tạo timestamp, 'updated_at' sẽ tự động cập nhật khi có thay đổi
        });
        Schema::create('answer', function (Blueprint $table) {
            $table->id(); // Tạo trường 'id' với kiểu INT, tự động tăng và khóa chính
            $table->foreignId('question_id')->constrained('question')->onDelete('cascade'); // Khóa ngoại 'question_id' tham chiếu đến trường 'id' của bảng 'question'
            $table->json('answer_content'); // Trường 'answer_content' với kiểu JSON
            $table->json('correct_answer'); // Trường 'correct_answer' với kiểu JSON
            $table->timestamps(); // Trường 'created_at' và 'updated_at' tự động tạo timestamp, 'updated_at' sẽ tự động cập nhật khi có thay đổi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('game');
        Schema::dropIfExists('answer');
        Schema::dropIfExists('question');
    }
};
