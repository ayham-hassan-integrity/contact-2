<?php

use App\Domains\Person\Http\Controllers\Backend\Person\DeletedPersonController;
use App\Domains\Person\Http\Controllers\Backend\Person\PersonController;
use App\Domains\Person\Models\Person;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'person',
    'as' => 'person.',
], function () {

    Route::get('/', [PersonController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__(' People'), route('admin.person.index'));
        });


    Route::get('deleted', [DeletedPersonController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.person.index')
                ->push(__('Deleted  People'), route('admin.person.deleted'));
        });


    Route::get('create', [PersonController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.person.index')
                ->push(__('Create Person'), route('admin.person.create'));
        });

    Route::post('/', [PersonController::class, 'store'])->name('store');

    Route::group(['prefix' => '{person}'], function () {
        Route::get('/', [PersonController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Person $person) {
                $trail->parent('admin.person.index')
                    ->push($person->id, route('admin.person.show', $person));
            });

        Route::get('edit', [PersonController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Person $person) {
                $trail->parent('admin.person.show', $person)
                    ->push(__('Edit'), route('admin.person.edit', $person));
            });

        Route::patch('/', [PersonController::class, 'update'])->name('update');
        Route::delete('/', [PersonController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedPerson}'], function () {
        Route::patch('restore', [DeletedPersonController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedPersonController::class, 'destroy'])->name('permanently-delete');
    });
});