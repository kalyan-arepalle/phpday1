<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response(view('viewusers', ['allUsers' => $users]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
        ]);
        $contact = new User([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
        ]);
        $contact->save();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get();
            return response(view('viewusers', ['allUsers' => $user]));
        } else {
            return response([
                "message" => "User not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            User::where('id',$id)->delete();
            return response([
                "User" => $user,
                "message" => "User has been deleted"
            ]);
        } else {
            return response([
                "message" => "User not found"
            ], 404);
        }
    }
}
