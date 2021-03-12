@if (
    $person->trashed()
)
    <x-utils.form-button
        :action="route('admin.person.restore', $person)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.person.permanently-delete', $person)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.person.show', $person)"/>
    <x-utils.edit-button :href="route('admin.person.edit', $person)"/>
    <x-utils.delete-button :href="route('admin.person.destroy', $person)"/>
@endif