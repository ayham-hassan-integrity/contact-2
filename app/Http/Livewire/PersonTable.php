<?php

namespace App\Http\Livewire;

use App\Domains\Person\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class PersonTable.
 */
class PersonTable extends TableComponent
{
    /**
     * @var string
     */
    public $sortField = 'id';

    /**
     * @var string
     */
    public $status;

    /**
     * @param string $status
     */
    public function mount($status = null): void
    {
        $this->status = $status;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Person::query();

        if ($this->status === 'deleted') {
            return $query->onlyTrashed();
        }

        return $query;
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('id'), 'id')
,
            Column::make(__('name with type string'), 'name with type string')
,
            Column::make(__('description'), 'description')
,

            Column::make(__('Actions'))
                ->format(function (Person $model) {
                    return view('backend.person.includes.actions',  ['person' => $model]);
                })
        ];
    }
}