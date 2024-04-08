<?php

namespace App\Http\Controllers;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Resources\userResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use PHPUnit\Event\Code\Throwable;

class userController extends Controller
{
    use AuthorizesRequests,ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
    try{
        $userValidation = $request->validate([
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'username' => 'required|string|max:15|unique:users,username',
                'email' => 'required|string|unique:users,email',
                'password' => 'required',
            ]
            );

            if($userValidation){
                 $user = User::create
                 ([
                 'id'        =>  rand(0,1000),
                 'firstname' =>  ucwords($request->firstname),
                 'lastname'  =>  ucwords($request->lastname),
                 'username'  =>  ucwords($request->username),
                 'email'     =>  $request->email,
                 'password'  =>  Hash::make($request->password),
                 ]);
              
                 if($user){
                   
                    //  $accessToken = $user->createToken('authToken')->accessToken;

                    if(Auth::attempt($request->only(['email', 'password']))){

                     $authUser= User::findOrFail(Auth::user()->id);

                     $userToken = $authUser->createToken('userToken')->plainTextToken;

                  
                    $authUser->sendEmailVerificationNotification();
                        
                    $success = ' your account has been created succesfull 
                                Please confirm yourself by clicking on verify user button sent to you on your email';
                    
        
                    $response[] = [
                        'user'=>$authUser,
                        'token'=> $userToken,
                        'message' => $success,
                    ];
                 
                    return response()->json($response,200);
                }
                //new response
                 }
                 /** ==  response if user not saved == */
                 return response()->json([
                    'message' => "bad request"
                 ],403);
                }
             /** ==  response if user not validated == */
             return response()->json([
                'message' => 'unable to verify'
            ],403);
        }
    catch(\Throwable $error){
        //additional 
       if($user= User::where('username',$request->username)->first()){  $user->delete();};
           
            //end of additional , to be removed
            return response()->json([
                'status' => false,
                'message' => $error->getMessage(),

            ],500);

        }
    }

    
  

    /**
     * login user.
     */
 public function login(Request $request){
    try{
        $validation = $request->validate([
            'email'=> 'required',
            'password' => 'required',
        ]);

        if($validation){
            
            $credential = request()->only(['email','password']);
            
            if(Auth::attempt($credential)){
                /** @var \App\Models\User $user */ 
                $user = Auth::user();
                $usertoken = $user->createToken('userToken')->plainTextToken;
              
                if($user->hasVerifiedEmail()){
                    
                    return response()->json([
                        'status'=>true,
                        'message'=>'successfully logged in',
                        'user_token'=> $usertoken
                    ]);
                }
                return response()->json([
                    'message'=>'you need to verify email ',
                    'user_token'=> $usertoken,

                ],200);
            }
        }
    }catch(\Throwable $error){
        return response()->json([
            'status' => false,
            'error' => $error->getMessage()
        ],500);
    }    
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    //  /** @var \App\Models\User $user */ 
        $curUser = User::findOrFail($id);
        $destroyed=  $curUser()->currentAccessToken()->delete();
       if($destroyed){
        return response()->json(
            [
             'status'=>true,
             'message' => 'successfully logged out',
            ]
         );
     }
     return response()->json(
        ['status'=>false,
        'message' => 'error occured while loggin out',
        ]);
    }



    // public function getUser(Request $request){
    //     return new userResource($request->user());
    // }
}
