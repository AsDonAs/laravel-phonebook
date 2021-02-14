<tr>
    <th scope="col">{{ $contact->id }}</th>
    <td>{{ $contact->fullname }}</td>
    <td>{{ $contact->phone }}</td>
    <td>{{ $contact->description }}</td>
    <td>{{ $contact->is_favorite ? __('Yes') : __('No') }}</td>
    <td>
        <div class="btn-group" role="group">
            <a href="{{ route("phone-contacts.show", [$contact->id]) }}" title="{{ __('View contact') }}"><span class="material-icons">visibility</span></a>
            <a href="{{ route("phone-contacts.edit", [$contact->id]) }}" title="{{ __('Edit contact') }}" ><span class="material-icons">create</span></a>
            <form method="POST" action="{{ route('phone-contacts.destroy', [$contact->id]) }}" title="{{ __('Delete contact') }}">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <x-nav-link :href="route('phone-contacts.destroy', [$contact->id])"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    <span class="material-icons">delete</span>
                </x-nav-link>
            </form>
        </div>
    </td>
</tr>
