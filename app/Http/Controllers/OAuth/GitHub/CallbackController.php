<?php

declare(strict_types=1);

namespace App\Http\Controllers\OAuth\GitHub;

use App\Enums\Identity\Provider;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

final readonly class CallbackController
{
    public function __construct(
        private AuthManager     $auth,
        private DatabaseManager $database,
    ) {}

    public function __invoke(Request $request): RedirectResponse
    {
        $user = Socialite::driver(
            driver: 'github',
        )->user();

        /** @var User $model */
        $model = $this->database->transaction(
            callback: fn() => User::query()->firstOrCreate(
                attributes: [
                    'provider' => Provider::GitHub,
                    'provider_id' => $user->getId(),
                ],
                values: [
                    'name' => $user->getName(),
                    'handle' => $user->getNickname(),
                    'email' => $user->getEmail(),
                    'avatar' => $user->getAvatar(),
                ],
            ),
            attempts: 3,
        );

        $this->auth->loginUsingId(
            id: $model->getKey(),
        );

        return new RedirectResponse(
            url: route('pages:home'),
        );
    }
}
