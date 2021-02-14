<x-app-layout>
    <x-slot name="header">
        {{ __('Adding contact') }}
    </x-slot>

    <div class="container main-pages">
        @include("main.phone-contact.phone-contact-form", [
            "method" => "POST",
            "data" => $data,
            "actionRoute" => "phone-contacts.store",
            "submitButtonTitle" => __('Add'),
        ])
    </div>
</x-app-layout>
