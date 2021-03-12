<?php

namespace App\Domains\Person\Observers;

use App\Domains\Person\Models\Person;

/**
 * Class PersonObserver.
 */
class PersonObserver
{
    /**
     * @param  Person  $person
     */
    public function created(Person $person): void
    {

    }

    /**
     * @param  Person  $person
     */
    public function updated(Person $person): void
    {

    }

}
