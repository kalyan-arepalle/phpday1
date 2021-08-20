<?php

namespace App\Http\Controllers;

use App\Models\ContactService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(ContactService $contactService)
    {
        $this->service = $contactService;
    }


    public function insertUser(Request $request){

        return $this->service->insertUser($request);

    }

    public function getUserByInput(Request $request){

        return $this->service->getUserByInput($request);

    }

    public function getUsers()
    {
        return $this->service->getUsers();
    }

    public function deleteUserByName(Request $request)
    {
        return $this->service->deleteUserByName($request);
    }

    public function deleteUserByEmail(Request $request)
    {
        return $this->service->deleteUserByEmail($request);
    }

    public function deleteUserByMobile(Request $request)
    {
        return $this->service->deleteUserByMobile($request);
    }
}
