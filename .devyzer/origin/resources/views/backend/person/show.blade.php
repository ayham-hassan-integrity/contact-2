@extends('backend.layouts.app')

@section('title', __('View Person'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Person')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.person.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('id')</th>
                    <td>{{   $person->id }}</td>
                </tr>
                <tr>
                    <th>@lang('name with type string')</th>
                    <td>{{   $person->name with type string }}</td>
                </tr>
                <tr>
                    <th>@lang('description')</th>
                    <td>{{   $person->description }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Person Created'):</strong> @displayDate($person->created_at) ({{   $person->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($person->updated_at) ({{   $person->updated_at->diffForHumans() }})

                @if($person->trashed())
                    <strong>@lang('Person Deleted'):</strong> @displayDate($person->deleted_at) ({{   $person->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection