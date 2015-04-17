<?php
namespace App;


use Illuminate\Support\ServiceProvider;


class DependencyResolver extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    //Registere en binding dvs. at når lavel ser UserRepositoryInterface så laver den et opbjekt at UserRepository klassen
    // denne klasse (DependencyResolver skal registeres hos Laravel i config/app.php  under providers i filen (se efter: My DependencyResolver )

    public function register()
    {
        $this->app->bind('App\UserRepositoryInterface',  'App\UserRepository');
        //grunden til at man kan snakke om løs kobling er at hvis jeg gerne ville skifte UserRepository ud
        // kunne jeg bare gøre dette
        // $this->app->bind('App\UserRepositoryInterface',  'App\MyNewUserRepository'); så alle steder fra nu af, ville jeg få et objekt lavet
        //ud fra MyNewUserRepository klassen de istedet for fra før hvor det var ud fra UserRepository
    }
}