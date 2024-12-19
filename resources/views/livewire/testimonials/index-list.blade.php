<flux:tab.group class="pt-12">
    <flux:tabs wire:model="tab">
        <flux:tab name="received">Received</flux:tab>
        <flux:tab name="requested">Requests</flux:tab>
    </flux:tabs>

    <flux:tab.panel name="received">
        <ul class="space-y-6">
            @forelse($this->testimonials as $testimonial)
                <li>
                    <flux:card>
                        <flux:heading size="lg">{{ $testimonial->name }}, {{ $testimonial->role }} @ {{ $testimonial->company }}</flux:heading>

                        <flux:subheading class="mb-4">
                            <p>Your post will be deleted permanently.</p>
                            <p>This action cannot be undone.</p>
                        </flux:subheading>

                        <flux:button variant="primary">View</flux:button>
                    </flux:card>
                </li>
            @empty
                <li>Such empty, much wow</li>
            @endforelse
        </ul>
    </flux:tab.panel>
    <flux:tab.panel name="requested">
        <ul class="pt-12 space-y-6">
            @forelse($this->requests as $testimonial)
                <li>
                    <flux:card>
                        <flux:heading size="lg">{{ $testimonial->name }}, {{ $testimonial->email }}</flux:heading>

                        <flux:subheading class="mb-4">
                            <p>Your post will be deleted permanently.</p>
                            <p>This action cannot be undone.</p>
                        </flux:subheading>

                        <flux:button variant="primary">Resend</flux:button>
                    </flux:card>
                </li>
            @empty
                <li>Such empty, much wow</li>
            @endforelse
        </ul>
    </flux:tab.panel>
</flux:tab.group>

