<tr>
    <th scope="col">{{ $contact->id }}</th>
    <td>{{ $contact->fullname }}</td>
    <td>{{ $contact->phone }}</td>
    <td>{{ $contact->description }}</td>
    <td>{{ $contact->is_favorite }}</td>
    <td>
        <div class="btn-group" role="group">
            <a href="{{ route("phone-contacts.show", [$contact->id]) }}" title="{{ __('View contact') }}" class="btn btn-info align-items-center"><span>show</span></a>
            <a href="{{ route("phone-contacts.edit", [$contact->id]) }}" title="{{ __('Edit contact') }}" class="btn btn-success align-items-center"><span>edit</span></a>
            <form method="POST" action="{{ route('phone-contacts.destroy', [$contact->id]) }}" title="{{ __('Delete contact') }}">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <x-nav-link :href="route('phone-contacts.destroy', [$contact->id])"
                            class="btn btn-danger align-items-center"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    <span>delete</span>
                </x-nav-link>
            </form>
        </div>
    </td>
</tr>
