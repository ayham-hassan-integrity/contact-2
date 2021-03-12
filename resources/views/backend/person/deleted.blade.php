@extends('backend.layouts.app')

@section('title', __('Deleted Persons'))

@section('breadcrumb-links')
    @include('backend.person.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Persons')
        </x-slot>

        <x-slot name="body">
            <livewire:person-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection