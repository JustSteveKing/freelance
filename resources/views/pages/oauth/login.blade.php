<x-layouts.page title="Sign into your account">
    <div class="max-w-7xl mx-auto flex items-center justify-center">
        <flux:card class="mt-32 space-y-6">
            <div>
                <flux:heading size="lg">Sign into your account</flux:heading>
                <flux:subheading>Sign in or register using GitHub</flux:subheading>
            </div>

            <div class="space-y-2">
                <flux:button icon="github" href="{{ route('oauth:github:redirect') }}" variant="primary" class="w-full">GitHub</flux:button>
            </div>
        </flux:card>
    </div>
</x-layouts.page>
