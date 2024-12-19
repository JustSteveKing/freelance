@props([
    'title',
    'message',
])

<div>
    <flux:heading size="xl" level="1">{{ $title }}</flux:heading>

    <flux:subheading size="lg" class="mb-6">{{ $message }}</flux:subheading>

    <flux:separator variant="subtle" />
</div>
