<?php namespace App\Http\Controllers;

use App\Commands\RegisterUserCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

//Denne controller arver fra Controller (Controller.php).
class UserController extends Controller {

    public function showRegisterUser(){
        //1. se på register.blade.php i view mappen
        return view('register');
    }

    //Når formen bliver submittet (request), så bliver den automatisk valideret fordi
    //jeg typebestemmer den til at være en UserRequest og så vil de validerings regler der er sat op blive
    //automatisk kørt. $request til indeholde mine felter fra register formen som bliver submittet hertil.

    //2. se på UserRequest i Http/Requests mappen
    public function doRegister(UserRequest $request){

        //3.
        //Fordi vi arver fra Controller, så har vi adgang til metoden dispatchFrom
        //I command driven architecture, snakker man om at skyder/starter (dispatcher) commands af
        //Laravel har derfor lavet en metode der starter en command, men denne metode går noget mere, den kan mappe det indkommende
        //request automatisk ind i command objektet, man skal bare fortælle hvad klasse man bruger til at lave command objektet
        //så jeg siger vil ud mappe det de form felter jeg får ind i mit request til konstruktøren på RegisterUserCommand klassen.

        //hvis du ser bort fra disse kommentare, så er vores controller meget ren, den starter en command og retuner et view.
        //det er det man gerne vil frem til i mvc at der ikke er meget kode i controllerne.

        $this->dispatchFrom(RegisterUserCommand::class, $request);
        //4. se på RegisterUserCommand i Commands mappen

        return view('user_created');
    }
}
