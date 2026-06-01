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
                    'token' => $token,
                    'role' => $user->roles->slug
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

    public function alluser(Request $request){

    $usrs = User::with('roles')->get();
 
    if ($usrs) {
        return response()->json($usrs);
    }
      return response()->json([
            'message' => 'NO USER FOUNd.'
        ], 200);

    }

    public function getUser($id, Request $request){
        
    $user = User::where('id',$id)->first();

    return response()->json([
        'msg' => $user
    ]);
    }

    public function deleteUser($id, Request $request)
    {
    $user =User::where('id', $id)->delete();
        if($user) {
            return response()->json(['message' => 'User deleted successfully'], 200);
        }else{
            return response()->json(['message' => 'User not found'], 404);
        }
        }

    public function editUser($id, Request $request)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role =$request->role;
        $user->save();

        return response()->json([
        'user' => $user,
        'msg' => 'Data has been edit successfully'], 200);
    } 

    public function adduser(Request $request){
     
    $validated = $request->validate([
        'Fullname' => 'required',
        'email' => 'required',
        'pass' => 'required',
        'role' => 'required'
    ]);

    $user = new User;

    $user->name =$request['Fullname'];
    $user->email =$request['email'];
    $user->password =$request['pass'];
    $user->role =$request['role'];

    if ($user->save()){

    return response()->json([
        'message' => 'Comment Added',
        'data' => $user
    ], 201);
    }
    else
    {
        return response()->json([
            'message' => 'Comment is not added, error'] 
            ,500);

    }
    }
}
