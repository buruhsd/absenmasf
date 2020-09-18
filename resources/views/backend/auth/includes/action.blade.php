
@if ($logged_in_user->hasAllAccess())
    <x-utils.view-button :href="route('admin.peserta.show', $peserta)" />
    <x-utils.edit-button :href="route('admin.auth.user.edit', $peserta)" />
@endif
