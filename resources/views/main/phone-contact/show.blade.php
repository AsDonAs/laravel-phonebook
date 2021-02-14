<x-app-layout>
    <x-slot name="header">
        {{ __('View contact') }}
    </x-slot>

    <!-- Actions -->
    <div class="container main-pages">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="btn-group" role="group">
                        <a href="{{ route("phone-contacts.edit", [$data->id]) }}" title="{{ __('Edit contact') }}" class="btn btn-success align-items-center"><span>edit</span></a>
                        <form method="POST" action="{{ route('phone-contacts.destroy', [$data->id]) }}" title="{{ __('Delete contact') }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <x-nav-link :href="route('phone-contacts.destroy', [$data->id])"
                                        class="btn btn-danger align-items-center"
                                        onclick="event.preventDefault();
                            this.closest('form').submit();">
                                <span>delete</span>
                            </x-nav-link>
                        </form>
                    </div>
                </div>
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="col"><label>ID</label></th>
                        <td>{{ $data->id }}</td>
                    </tr>
                    <tr>
                        <th scope="col"><label>Fullname</label></th>
                        <td>{{ $data->fullname }}</td>
                    </tr>
                    <tr>
                        <th scope="col"><label>Phone</label></th>
                        <td>{{ $data->phone }}</td>
                    </tr>
                    <tr>
                        <th scope="col"><label>Description</label></th>
                        <td>{{ $data->description }}</td>
                    </tr>
                    <tr>
                        <th scope="col"><label>Is Favorite</label></th>
                        <td>{{ $data->is_favorite ? __('Yes') : __('No') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
