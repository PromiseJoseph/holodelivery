<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
     $validation =   $request->validate([
            'firstname' => ['required','string'],
            'lastname' => ['required','string'],
            'username' => ['required','string','max:15','unique:users,username'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',  Rules\Password::defaults()],
        ]);
        if($validation){ 
            $user = User::create([
                'firstname' =>$request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        
        event(new Registered($user));

        return response()->json(
            [
             'message' => "succesfully registered"
            ],200);
         }
        
        
     
    
//     /** ==  response if user not validated == */
//     return response()->json([
//        'message' => 'unable to verify'
//    ],403);
        
    }
}
