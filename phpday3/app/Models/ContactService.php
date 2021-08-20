<?php

namespace App\Models;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ContactService
{
    public function insertUser(Request $request){

        Log::info('Creating the user profile for user: '.$request->name);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|min:2',
            'email' => 'required|unique:contacts|email',
            'mobile' => 'required|gt:999999999|lt:10000000000|unique:contacts',
        ]);

        if ($validator->fails()) {
            echo $validator->errors();
            return response(["Message" => "Enter credentials properly"]);
        }

        try {
            Contact::insert([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'mobile' => $request->get('mobile'),
            ]);
            $contact = Contact::where('mobile',$request->mobile)->get();
        }
        catch(\PHPUnit\Exception $e){
            echo "\n". "Caught exception: " . $e->getMessage();
        }
        return response(["Contact"=>$contact,"Message" => "Contact added to database"]);
    }

    public function getUserByInput(Request $request)
    {
        Log::info('Showing the user profile for given input');

        if (Contact::where('name', $request->query('name'))->exists()) {

            $contact = DB::table('contacts')->select('name','mobile')->where('name', $request->get('name'))->get();
            return response(["Users with given name" => $contact]);
        }
        else if (Contact::where('email', $request->get('email'))->exists()) {

            $contact = DB::table('contacts')->select('name','mobile')->where('email', $request->get('email'))->get();
            return response(["User with given email" => $contact]);
        }
        else if (Contact::where('mobile', $request->get('mobile'))->exists()) {

            $contact = DB::table('contacts')->select('name','mobile')->where('mobile', $request->get('mobile'))->get();
            return response(["User with given mobile number" => $contact]);
        }

        else return response([
                "message" => "User with given input not found"
            ], 404);
    }

    public function getUsers()
    {
        Log::info('Showing the user profiles for all the users');

        $users = DB::table('contacts')->select('name','mobile')->get();

        return response(["List of users in db" => $users]);
    }

    public function deleteUserByName(Request $request)
    {
        Log::info('Deleting the user profile for user with given input: '.$request->name);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|min:2',
        ]);

        if ($validator->fails()) {
            echo $validator->errors();
            return response(["Message" => "Enter credentials properly"]);
        }

        if (Contact::where('name', $request->get('name'))->exists()) {

            $contact = Contact::where('name', $request->get('name'))->get();

            try{
                Contact::where('name', $request->get('name'))->delete();
            }
            catch(Exception $e){
                echo "\n". "Caught exception: " . $e->getMessage();
            }
            return response(["These user(s) were deleted" => $contact]);
        } else {
            return response([
                "message" => "User with given name not found"
            ], 404);
        }
    }

    public function deleteUserByEmail(Request $request)
    {
        Log::info('Deleting the user profile for user with email: '.$request->email);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            echo $validator->errors();
            return response(["Message" => "Enter credentials properly"]);
        }

        if (Contact::where('email', $request->get('email'))->exists()) {

            $contact = Contact::where('email', $request->get('email'))->get();
            try {
                Contact::where('email', $request->get('email'))->delete();
            }
            catch(Exception $e){
                echo "\n". "Caught exception: " . $e->getMessage();
            }
            return response(["User deleted" => $contact]);
        } else {
            return response([
                "message" => "User with given email not found"
            ], 404);
        }
    }

    public function deleteUserByMobile(Request $request)
    {
        Log::info('Deleting the user profile for user with mobile: '.$request->mobile);

        $validator = Validator::make($request->all(), [
            'mobile' => 'required|gt:999999999|lt:10000000000',
        ]);

        if ($validator->fails()) {
            echo $validator->errors();
            return response(["Message" => "Enter credentials properly"]);
        }

        if (Contact::where('mobile', $request->get('mobile'))->exists()) {

            $contact = Contact::where('mobile', $request->get('mobile'))->get();

            try {
                Contact::where('mobile', $request->get('mobile'))->delete();
            }
            catch(Exception $e){
                echo "\n". "Caught exception: " . $e->getMessage();
            }
            return response(["User deleted" => $contact]);
        } else {
            return response([
                "message" => "User with given mobile number not found"
            ], 404);
        }
    }
}
