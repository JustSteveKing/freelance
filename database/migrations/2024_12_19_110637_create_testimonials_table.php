<?php

declare(strict_types=1);

use App\Enums\Testimonials\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('testimonials', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('name')->comment('Laravel Jutsu');
            $table->string('role')->comment('YouTuber');
            $table->string('company')->comment('Laravel Jutsu');
            $table->string('avatar')->comment('https://laraveljutsu.com');
            $table->string('status')->default(Status::Pending);

            $table->text('content');


            $table
                ->foreignUlid('user_id')
                ->index()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
