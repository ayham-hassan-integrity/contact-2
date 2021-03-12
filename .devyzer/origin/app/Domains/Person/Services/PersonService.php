<?php

namespace App\Domains\Person\Services;

use App\Domains\Person\Models\Person;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PersonService.
 */
class PersonService extends BaseService
{
    /**
     * PersonService constructor.
     *
     * @param Person $person
     */
    public function __construct(Person $person)
    {
        $this->model = $person;
    }

    /**
     * @param array $data
     *
     * @return Person
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Person
    {
        DB::beginTransaction();

        try {
            $person = $this->model::create([
                'name with type string' => $data['name with type string'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this person. Please try again.'));
        }

        DB::commit();

        return $person;
    }

    /**
     * @param Person $person
     * @param array $data
     *
     * @return Person
     * @throws \Throwable
     */
    public function update(Person $person, array $data = []): Person
    {
        DB::beginTransaction();

        try {
            $person->update([
                'name with type string' => $data['name with type string'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this person. Please try again.'));
        }

        DB::commit();

        return $person;
    }

    /**
     * @param Person $person
     *
     * @return Person
     * @throws GeneralException
     */
    public function delete(Person $person): Person
    {
        if ($this->deleteById($person->id)) {
            return $person;
        }

        throw new GeneralException('There was a problem deleting this person. Please try again.');
    }

    /**
     * @param Person $person
     *
     * @return Person
     * @throws GeneralException
     */
    public function restore(Person $person): Person
    {
        if ($person->restore()) {
            return $person;
        }

        throw new GeneralException(__('There was a problem restoring this  People. Please try again.'));
    }

    /**
     * @param Person $person
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Person $person): bool
    {
        if ($person->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this  People. Please try again.'));
    }
}