<x-app-layout>
    <x-slot name="header">
        {{ __('Edit contact') }}
    </x-slot>

    <div class="container main-pages">
        <div class="card">
            <div class="card-body">
                @include("main.phone-contact.phone-contact-form", [
                    "method" => "PATCH",
                    "data" => $data,
                    "actionRoute" => "phone-contacts.update",
                    "submitButtonTitle" => __('Edit'),
                ])
            </div>
        </div>
    </div>
</x-app-layout>
