<?php namespace App\Commands;

use App\Commands\Command;

use App\User;
use App\UserRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Hash;

class RegisterUserCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $password;
    /**
     * @var
     */
    private $name;

    /**
     *
     * Create a new command instance.
     *
     * @param $email
     * @param $password
     * @param $name
     * @return \App\Commands\RegisterUserCommand
     * Da min form indeholder tekst felter som har navne som email, password og name, så
     * vil de automatik blive mappet (puttet ind i) til $email, $password og $name i __contruct (konstruktøren)
     */
    //5.
	public function __construct($email, $password, $name)
	{
		//
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    /**
     * Execute the command.
     *
     * @param UserRepositoryInterface $UserRepository
     * @return void
     *
     */
    //6.
    //Når man kalder en command så bliver først konstruktøren kørt (command objektet bliver lavet) og så vil metoden handle automatisk blive kaldt (kørt)
    //handle metoden tager her et repository som input, det bliver lavet automatisk, fordi der er sat en binding op (dette er dependency injection)
    //og fordi at typen (det første argument i handle metoden) er et interface er det en løs kobling, da man ved at ændre binding i DependencyResolver, kan få et
    // andet objekt.
    // se før i DependencyResolver.php
    //se UserRepositoryInterface
    // se UserRepository (her ligger al database logic som her noget med en user at gøre)
	public function handle(UserRepositoryInterface $UserRepository)
	{
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);

        //her bruger jeg min løse kobling, da jeg kalder en metode på mit interface mit interface ved ikke hvem der håndtere metoden (løs kobling)
        //hvis det ikke skulle være en løs kobling ville man gøre sådan her istedet for fx.
        /*
         * $userRepository = new UserRepository(); // her laver man et opbjekt af userRepository klassen og kalder metoder direkte på denne.
         * man har en tættere kobling til objektet, og det gør at hvis der er noget der skal lave om, så er det mere besværligt og der er risiko for at man
         * ødelægger noget andre steder.
         * $userRepository->createUser($user);
        */
        $UserRepository->createUser($user);
	}
}
