<?php

namespace App\Http\Controllers\User;

use App\Http\Library\ApiHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiHelpers;


    public function create(Request $request){
        $user = $request->user();
        if ($this->isAdmin($user)) {

            $fields = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                //'email' => ['string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'username' => ['required', 'string', 'unique:users'],
                'role' => ['required', 'integer']
            ]);
           
            User::create([
                'name' => $fields['name'],
                //'email' => $fields['email'],
                'role' => $fields['role'],
                'username' => $fields['username'],
                'password' => Hash::make($fields['password']),
            ]);
            $role = $this->translateRole($fields['role']);
            $token = $user->createToken('auth_token', [$role])->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response($response,201);
        }

        return response('Error: Just for admins', 403);
        
    }

    public function login(Request $request){

        $fields = $request->validate([
                'password' => ['required', 'string'],
                'username' => ['required', 'string'],
            ]);

            //check username
            $user = User::where('username',$fields['username'])->first();

            //check password
            if(!$user || !Hash::check($fields['password'], $user->password)){
                return response([
                    'message' => 'Bad creds'
                ], 401);
            }
           
                $role = $this->translateRole($user->role);
                $token = $user->createToken('auth_token', [$role])->plainTextToken;

                $response = [
                    'user' => $user,
                    'token' => $token
                ];

            return response($response,201);
    }
}
