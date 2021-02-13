<x-app-layout>
    <x-slot name="header">
        <h2>
            Редактирование контакта
        </h2>
    </x-slot>

    @include("main.phone-contact.phone-contact-form", [
        "method" => "PATCH",
        "data" => $data,
        "actionRoute" => "phone-contacts.update",
        "submitButtonTitle" => __('Edit'),
    ])
</x-app-layout>
