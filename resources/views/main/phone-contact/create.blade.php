<x-app-layout>
    <x-slot name="header">
        {{ __('Adding contact') }}
    </x-slot>

    @include("main.phone-contact.phone-contact-form", [
        "method" => "POST",
        "data" => $data,
        "actionRoute" => "phone-contacts.store",
        "submitButtonTitle" => __('Add'),
    ])
</x-app-layout>
