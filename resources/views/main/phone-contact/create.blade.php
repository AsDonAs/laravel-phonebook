<x-app-layout>
    <x-slot name="header">
        <h2>
            Добавление контакта
        </h2>
    </x-slot>

    @include("main.phone-contact.phone-contact-form", [
        "method" => "POST",
        "data" => $data,
        "actionRoute" => "phone-contacts.store",
        "submitButtonTitle" => __('Add'),
    ])
</x-app-layout>
