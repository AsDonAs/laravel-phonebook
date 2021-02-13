<tr>
    <td>{{ $contact->id }}</td>
    <td>{{ $contact->fullname }}</td>
    <td>{{ $contact->phone }}</td>
    <td>{{ $contact->description }}</td>
    <td>{{ $contact->is_favorite }}</td>
    <td>
        <a href="{{ route("phone-contacts.show", [$contact->id]) }}"><span>show</span></a>
        <a href="{{ route("phone-contacts.edit", [$contact->id]) }}"><span>edit</span></a>
        <a>
            <form method="POST" action="{{ route('phone-contacts.destroy', [$contact->id]) }}">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <x-nav-link :href="route('phone-contacts.destroy', [$contact->id])"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    <span>delete</span>
                </x-nav-link>
            </form>
        </a>
    </td>
</tr>
