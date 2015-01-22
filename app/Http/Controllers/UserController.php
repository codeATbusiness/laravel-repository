<?php namespace Laravel_Repository\Http\Controllers;

use Laravel_Repository\Http\Requests;
use Laravel_Repository\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Laravel_Repository\Domain\Repositories\UserRepositoryInterface;


class UserController extends Controller {

    public $usersRepo;
    public function __construct(UserRepositoryInterface $usersRepo)
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
