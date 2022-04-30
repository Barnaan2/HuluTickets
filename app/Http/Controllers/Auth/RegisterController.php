<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CinemaAdmin;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    use RegistersUsers;
//
//    /**
//     * Where to redirect users after registration.
//     *
//     * @var string
//     */
//    //protected $redirectTo = RouteServiceProvider::HOME;
//    protected function redirectTo(){
//        if(Auth()->user()->role==1){
//            return redirect('dashboard');
//        }
//        elseif (Auth()->user()->role==2){
//            return redirect('Admin');
//        }
//        elseif (Auth()->user()->role==3){
//            $id =Auth()->user()->id;
//            return redirect('Admin',$id);
//        }

//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }
//
//    /**
//     * Get a validator for an incoming registration request.
//     *
//     * @param  array  $data
//     * @return \Illuminate\Contracts\Validation\Validator
//     */
//    protected function validator(array $data)
//    {
//
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);
//    }
//
//    /**
//     * Create a new CinemaAdmin instance after a valid registration.
//     *
//     * @param  array  $data
////     * @return \App\Models\User
//     */
{
   public function createAdmin(Request $request)
{
    $input = $request->all();
    $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required',
         'name'=>'required'
    ]);

    $role = 2;
    $Admin = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $role,
        'password' => Hash::make($request->password)
    ]);
    $Admin->save();
    return redirect()->route('login')->with('Admin', 'You have added new Admin');


}


// since both should add both cinema and the adminstrator togather in one page which means on one request group

 public function createCinemaAdmin(Request $request)
    {
        // we do not need to make the password validation for the user since ti
        // will be edited by the Cinema admin after they login
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required'
        ]);
$role =3;
       $cinemaAdmin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'password' => Hash::make($request->password),
        ]);
        $cinemaAdmin->save();
       $User_id =User::latest('created_at')->first()->id;
       $Cinema_id = $request->Cinema_id;

$CinemaAdmin = CinemaAdmin::create([
    'Cinema_id' => $Cinema_id,
       'User_id' =>$User_id
]);
$CinemaAdmin->save();

    }
}
