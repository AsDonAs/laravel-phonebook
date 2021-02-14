<!-- Session Status -->
<x-auth-session-status :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors :errors="$errors" />

<? $id = $data["id"] ?? null ?>
<form method="POST" action="{{ route($actionRoute, [$id]) }}">
    @csrf
    <input name="_method" type="hidden" value="{{ $method }}">

    <!-- First name -->
    <div class="form-group">
        <x-label for="first_name" :value="__('First name')" />

        <? $firstName = old("first_name") ?? $data["first_name"] ?? null ?>
        <x-input id="first_name" type="text" name="first_name" :value="$firstName" autofocus />
    </div>

    <!-- Last name -->
    <div class="form-group">
        <x-label for="last_name" :value="__('Last name')" />

        <? $lastName = old("last_name") ?? $data["last_name"] ?? null ?>
        <x-input id="last_name" type="text" name="last_name" :value="$lastName"/>
    </div>

    <!-- Second name -->
    <div class="form-group">
        <x-label for="second_name" :value="__('Second name')" />

        <? $secondName = old("second_name") ?? $data["second_name"] ?? null ?>
        <x-input id="second_name" type="text" name="second_name" :value="$secondName"/>
    </div>

    <!-- Phone -->
    <div class="form-group">
        <x-label for="phone" :value="__('Phone')" />

        <? $phone = old("phone") ?? $data["phone"] ?? null ?>
        <x-input id="phone" type="text" name="phone" :value="$phone"/>
    </div>

    <!-- Description -->
    <div class="form-group">
        <x-label for="description" :value="__('Description')" />

        <? $description = old("description") ?? $data["description"] ?? null ?>
        <x-input id="description" type="text" name="description" :value="$description"/>
    </div>

    <!-- Is Favorite -->
    <div class="form-group form-check">
        <? $isFavorite = $data["is_favorite"] ?? 0 ?>
        <input type="hidden" name="is_favorite" value="0" />
        <input class="form-check-input" id="is_favorite" type="checkbox" value="1" {{ $isFavorite ? "checked" : "" }} name="is_favorite">
        <label class="form-check-label" for="is_favorite">
            <span>{{ __('Favorite') }}</span>
        </label>
    </div>

    <div>
        <x-button class="btn btn-success">
            {{ $submitButtonTitle }}
        </x-button>
    </div>
</form>
