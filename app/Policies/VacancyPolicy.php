<?php

namespace App\Policies;

use App\User;
use App\Vacancy;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacancyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->companies()->get()->count() > 0;
    }

    public function view(User $user, Vacancy $vacancy)
    {
        return true;
    }

    public function update(User $user, Vacancy $vacancy)
    {
        return $user->isOnCompany($vacancy->company);
    }

    public function delete(User $user, Vacancy $vacancy)
    {
       return $this->update($user, $vacancy);
    }
}
