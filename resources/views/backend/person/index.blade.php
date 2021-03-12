@extends('backend.layouts.app')

@section('title', __(' People'))

@section('breadcrumb-links')
    @include('backend.person.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang(' People')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.person.create')"
                :text="__('Create Person')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:person-table/>
        </x-slot>
    </x-backend.card>
@endsection