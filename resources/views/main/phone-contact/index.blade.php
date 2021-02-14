<x-app-layout>
    <x-slot name="header">
        {{ __('List contacts') }}
    </x-slot>
    <div class="main-pages">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{ __('List contacts') }}</h3>
                        </div>
                        <div class="offset-md-3 col-md-3 text-right">
                            <a href="{{ route("phone-contacts.create") }}" title="{{ __('Add contact') }}" class="btn btn-success align-items-center">{{ __('Add contact') }}</a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Избранный</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @each("main.phone-contact.index_row", $contacts, "contact")
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
