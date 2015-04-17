<?php
namespace App;


class UserRepository implements UserRepositoryInterface {

    public function createUser(User $user)
    {
       $user->save();
    }
}