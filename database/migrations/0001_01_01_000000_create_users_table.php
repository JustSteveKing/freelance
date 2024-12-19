<?php

declare(strict_types=1);

use App\Enums\Identity\Provider;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('users', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('name')->comment('Users name');
            $table->string('handle')->comment('User Handle')->unique();
            $table->string('email')->comment('Users Email Address')->unique();
            $table->string('avatar')->comment('Users Avatar');
            $table->string('provider')->comment('Users OAuth Provider')->default(Provider::GitHub);

            $table->text('provider_id');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['provider', 'provider_id']);
        });

        Schema::create('password_reset_tokens', static function (Blueprint $table): void {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', static function (Blueprint $table): void {
            $table->string('id')->primary();
            $table->foreignUlid('user_id')->nullable()->index()->constrained('users')->cascadeOnDelete();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
