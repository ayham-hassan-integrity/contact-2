@extends('backend.layouts.app')

@section('title', __('Update Person'))

@section('content')
    <x-forms.patch :action="route('admin.person.update', $person)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Person')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.person.index')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name with type string" class="col-md-2 col-form-label">@lang('name with type string')</label>

                    <div class="col-md-10">
                        <input type="text" name="name with type string" class="form-control" placeholder="{{  __('name with type string') }} " value="{{   $person->title }}  "  />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label">@lang('description')</label>

                    <div class="col-md-10">
                        <input type="text" name="description" class="form-control" placeholder="{{  __('description') }} " value="{{   $person->title }}  "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Person')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection