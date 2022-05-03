<?php

namespace App\Http\Controllers\CinemaAdmin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\ProfilePicture;
use App\Models\ProfilePictures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     */
    //
    public function index()
    {
        $profile = ProfilePictures::firstWhere('User_id',Auth::user()->id)->Picture_Link;
        //to return the initial account view
        $Cinemas =Auth::user()->getCinema;
        foreach($Cinemas as $cinema)
        {
            $Cinema = $cinema;
        }
        return view('dashboard.CinemaAdmin.accountSetting',compact('Cinema','profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     //* @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'Message'=>'required'
        ]);
        $Message =Message::create([
            'User_id' => Auth::user()->id,
            'Message' => $request->Message,
        ]);
        $Message->save();
   return redirect()->route('Admin',Auth::user()->id)->with('alert','thanks for messaging us! we will contact you soon');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //p
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function profile(Request $request){
        $edit = ProfilePictures::firstWhere('User_id',Auth::user()->id);
        $edit->delete();
        $Picture_Name = Auth::user()->name . '.' . 'jpg';
        $Poster_Path=request('profilePicture')->storeAs('CinemaAdminProfiles', $Picture_Name, 'public');
        $Picture_Link="storage/" . $Poster_Path;
        $change = ProfilePictures::create([
            'User_id' => Auth::user()->id,
            'Picture_Link'=> $Picture_Link
        ]);
        $change->save();
        return redirect()->route('Account')->with('alert','You have change your profile picture');
    }
}
