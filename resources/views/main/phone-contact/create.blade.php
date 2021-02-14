<x-app-layout>
    <x-slot name="header">
        {{ __('Adding contact') }}
    </x-slot>

    <div class="container main-pages">
        <div class="card">
            <div class="card-body">
                @include("main.phone-contact.phone-contact-form", [
                    "method" => "POST",
                    "data" => $data,
                    "actionRoute" => "phone-contacts.store",
                    "submitButtonTitle" => __('Add'),
                ])
            </div>
        </div>
    </div>
</x-app-layout>
