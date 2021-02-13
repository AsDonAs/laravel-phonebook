<x-app-layout>
    <x-slot name="header">
        <h2>
            Список контактов
        </h2>
    </x-slot>
    <div>
        Items will be here!

        <a href="{{ route("phone-contacts.create") }}">Добавить контакт</a>
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
