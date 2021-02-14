<x-app-layout>
    <x-slot name="header">
        {{ __('View contact') }}
    </x-slot>

    <!-- Actions -->
    <div class="container main-pages">
        <a href="{{ route("phone-contacts.edit", [$data->id]) }}" title="{{ __('Edit contact') }}"><span>edit</span></a>
        <a>
            <form method="POST" action="{{ route('phone-contacts.destroy', [$data->id]) }}" title="{{ __('Delete contact') }}">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <x-nav-link :href="route('phone-contacts.destroy', [$data->id])"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    <span>delete</span>
                </x-nav-link>
            </form>
        </a>

        <div><label>ID</label> : {{ $data->id }}</div>
        <div><label>Fullname</label> : {{ $data->fullname }}</div>
        <div><label>Phone</label> : {{ $data->phone }}</div>
        <div><label>Description</label> : {{ $data->description }}</div>
        <div><label>Is Favorite</label> : {{ $data->is_favorite ? "true" : "false" }}</div>
    </div>
</x-app-layout>
