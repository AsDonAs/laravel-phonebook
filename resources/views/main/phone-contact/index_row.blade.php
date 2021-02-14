<tr>
    <th scope="col">{{ $contact->id }}</th>
    <td>{{ $contact->fullname }}</td>
    <td>{{ $contact->phone }}</td>
    <td>{{ $contact->description }}</td>
    <td>{{ $contact->is_favorite }}</td>
    <td>
        <a href="{{ route("phone-contacts.show", [$contact->id]) }}" title="{{ __('View contact') }}"><span>show</span></a>
        <a href="{{ route("phone-contacts.edit", [$contact->id]) }}" title="{{ __('Edit contact') }}"><span>edit</span></a>
        <a>
            <form method="POST" action="{{ route('phone-contacts.destroy', [$contact->id]) }}" title="{{ __('Delete contact') }}">
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
