<?php

namespace App\Domains\Person\Http\Controllers\Backend\Person;

use App\Http\Controllers\Controller;
use App\Domains\Person\Models\Person;
use App\Domains\Person\Services\PersonService;
use App\Domains\Person\Http\Requests\Backend\Person\DeletePersonRequest;
use App\Domains\Person\Http\Requests\Backend\Person\EditPersonRequest;
use App\Domains\Person\Http\Requests\Backend\Person\StorePersonRequest;
use App\Domains\Person\Http\Requests\Backend\Person\UpdatePersonRequest;

/**
 * Class PersonController.
 */
class PersonController extends Controller
{
    /**
     * @var PersonService
     */
    protected $personService;

    /**
     * PersonController constructor.
     *
     * @param PersonService $personService
     */
    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.person.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.person.create');
    }

    /**
     * @param StorePersonRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StorePersonRequest $request)
    {
        $person = $this->personService->store($request->validated());

        return redirect()->route('admin.person.show', $person)->withFlashSuccess(__('The  People was successfully created.'));
    }

    /**
     * @param Person $person
     *
     * @return mixed
     */
    public function show(Person $person)
    {
        return view('backend.person.show')
            ->withPerson($person);
    }

    /**
     * @param EditPersonRequest $request
     * @param Person $person
     *
     * @return mixed
     */
    public function edit(EditPersonRequest $request, Person $person)
    {
        return view('backend.person.edit')
            ->withPerson($person);
    }

    /**
     * @param UpdatePersonRequest $request
     * @param Person $person
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $this->personService->update($person, $request->validated());

        return redirect()->route('admin.person.show', $person)->withFlashSuccess(__('The  People was successfully updated.'));
    }

    /**
     * @param DeletePersonRequest $request
     * @param Person $person
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeletePersonRequest $request, Person $person)
    {
        $this->personService->delete($person);

        return redirect()->route('admin.$person.deleted')->withFlashSuccess(__('The  People was successfully deleted.'));
    }
}