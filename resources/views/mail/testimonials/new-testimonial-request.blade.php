<x-mail::message>
# Hey {{ $request->name }}

You have been requested to provider a testimonial on {{ config('app.name') }}. Please click the button below to provide your testimonial.

<x-mail::button :url="$url">
Provide Testimonial
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
