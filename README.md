# Laravel-Repository

Laravel Repository Implementation example

In this Laravel example project you can find some tips for manage your datasources through Repositories. Those repositories may get or put data into several datasources as (MySQL Databases, XML Source files, ...)

The project folder and namespaces used by this project are:

```
Laravel_Repository\Domain\Repositories //Put here your Repository Interfaces that you will implement with your Infraestructure classes
Laravel_Repository\Infraestructure\Repositories //Here you can find the EloquentRepository, an abstract class for the base functionality and every Repository that you need to add within this folder.
Laravel_Repository\Providers //For manage dependencies within your Project I used it for add a custom UserServiceProvider
```
There are some interfaces and classes that I created to implement the Repository Pattern in this project:
```
Laravel_Repository\Domain\Repositories\UserRepositoryInterface.php //Interface for the User Entity|Model with the User related functionality blueprint.
Laravel_Repository\Infraestructure\Repositories\EloquentRepository.php //Base Eloquent Repository Class
Laravel_Repository\Infraestructure\Repositories\UserEloquentRepository.php //User specific eloquent repository implementation class it inherits the functionality from the EloquentRepository abstract class and implements specific functionality from UserRepositoryInterface
Laravel_Repository\Providers\UserServiceProvider.php //Provides you one way to bind one specific Class to the UserRepositoryInterface. Here you could select the class that you need for each datasource (MySQL Table, XML, Array, ...)
```

Some other files that I used or changed:

## UserController.php

```php
<?php namespace Laravel_Repository\Http\Controllers;

use Laravel_Repository\Http\Requests;
use Laravel_Repository\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

    public $usersRepo;
    public function __construct(\Laravel_Repository\Domain\Repositories\UserRepositoryInterface $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }
    
    public function retrieveAllUsers()
    {
        $users = $this->usersRepo->getAll();
        return \View::make('users.index', compact('users'));
    }
    
    public function retrieveUsersByName($username)
    {
        $user = $this->usersRepo->findByName($username);
        return \View::make('users.user', compact('user'));
    }
}
```

## UserServiceProvider.php

```php
<?php namespace Laravel_Repository\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

	public function boot()
	{
		
	}

	public function register()
	{
		$this->app->bind(
                        'Laravel_Repository\Domain\Repositories\UserRepositoryInterface',
                        'Laravel_Repository\Infraestructure\Repositories\UserEloquentRepository');
	}
}
```

## Routes.php

```php
Route::get('users/all','UserController@retrieveAllUsers');
Route::get('users/{username}', 'UserController@retrieveUsersByName');
```
If you want to change your datasource for example to Array only need follow the next steps:

1. Create one class within the `Laravel_Repository\Infraestructure\Repositories` called ArrayRepository.
2. Create one class within the `Laravel_Repository\Infraestructure\Repositories` called UserArrayRepository.
3. Change your Service Provider class `UserServiceProvider.php` to use the UserArrayRepository class that Implements UserRepositoryInterface.

You may need to run `composer dump-autoload` within your CLI console developing environment.

Enjoy coding!