<x-app-layout>
    <x-slot name="header">
        {{ __('List contacts') }}
    </x-slot>
    <div>
        Items will be here!

        <a href="{{ route("phone-contacts.create") }}">{{ __('Add contact') }}</a>
        <table>
            <tr>
                <td>ID</td>
                <td>ФИО</td>
                <td>Телефон</td>
                <td>Описание</td>
                <td>Избранный</td>
                <td>Действия</td>
            </tr>
            @each("main.phone-contact.index_row", $contacts, "contact")
        </table>
    </div>
</x-app-layout>
