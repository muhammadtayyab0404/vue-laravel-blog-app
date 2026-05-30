<?php

namespace App\Http\Controllers;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   
    public function reqister( Request $request){
 
    $validated = $request->validate([
        'FullName' => 'required',
        'email' => 'required',
        'pass' => 'required',
    
        ]);
 
        $password= $validated['pass'];

        $user = new User();
        $user->name =$validated['FullName'];
        $user->email =$validated['email'];
        $user->password =Hash::make($password);

        if($user->save()){
            return response()->json("Success");
        }
        else{
            return response()->json("Unsuccessful");
        }


    }

    public function login(Request $request){
     
     $validated = $request->validate([
        'email' => 'required',
        'pass' => 'required',
    
        ]);

        if (Auth::attempt([
            'email' => $validated['email'],
            'password' =>$validated['pass']
            ]))
            {
                $user = Auth::user();
                $token = $user->createToken('mytoken')->plainTextToken;
                return response()->json([
                    'message' => 'Login Success',
                    'token' => $token
                ],200);

            }
            return response()->json([
                    'message' => 'Login UnSuccessful'
                ], 401);


    }

    public function logout(Request $request){
    
     $user = $request->user();

    if ($user) {
        $user->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
      return response()->json([
            'message' => 'NO USER FOUNd.'
        ], 200);

    }
}
