<?php

namespace App\Policies;

use App\Models\Stock;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StockPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->administrator == 1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Stock $stock)
    {
        return $user->administrator == 1;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Stock $stock)
    {
        return $user->id == $stock->user_id;
    }

    public function editPost(User $user, Stock $stock)
    {
        return $user->id == $stock->user_id;
    }

    public function editConfirm(User $user, Stock $stock)
    {
        return $user->id == $stock->user_id;
    }

    public function buy(User $user, Stock $stock)
    {
        return $user->id != $stock->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Stock $stock)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Stock $stock)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Stock $stock)
    {
        //
    }
}
