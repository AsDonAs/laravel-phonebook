<x-app-layout>
    <x-slot name="header">
        {{ __('Edit contact') }}
    </x-slot>

    <div class="container main-pages">
        @include("main.phone-contact.phone-contact-form", [
            "method" => "PATCH",
            "data" => $data,
            "actionRoute" => "phone-contacts.update",
            "submitButtonTitle" => __('Edit'),
        ])
    </div>
</x-app-layout>
