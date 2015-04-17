<?php
/**
 * Created by PhpStorm.
 * User: Rene
 * Date: 14-04-2015
 * Time: 12:46
 */

namespace App;

//Når man snakker om løs kobling går man altid igennem et interface.
//her er kun en metode signatur, altså  ingen logik og den ved ikke hvem der vil udfører det (implementere det)
interface UserRepositoryInterface {
    public function createUser(User $user);
} 