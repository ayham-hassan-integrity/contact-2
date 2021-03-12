<?php

namespace App\Domains\Person\Http\Controllers\Backend\Person;

use App\Http\Controllers\Controller;
use App\Domains\Person\Models\Person;
use App\Domains\Person\Services\PersonService;

/**
 * Class DeletedPersonController.
 */
class DeletedPersonController extends Controller
{
    /**
     * @var PersonService
     */
    protected $personService;

    /**
     * DeletedPersonController constructor.
     *
     * @param  PersonService  $personService
     */
    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.person.deleted');
    }

    /**
     * @param  Person  $deletedPerson
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Person $deletedPerson)
    {
        $this->personService->restore($deletedPerson);

        return redirect()->route('admin.person.index')->withFlashSuccess(__('The  People was successfully restored.'));
    }

    /**
     * @param  Person  $deletedPerson
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Person $deletedPerson)
    {
        $this->personService->destroy($deletedPerson);

        return redirect()->route('admin.person.deleted')->withFlashSuccess(__('The  People was permanently deleted.'));
    }
}