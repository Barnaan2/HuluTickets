<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crew;

class CrewController extends Controller
{
    


    public function store(Request $request)
    {
        $request->validate([
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'Role' => 'required',
            'About' => 'required|min:50',
            'Picture_Link' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
      
          $imageName = time() . '.' . $request->file->extension();
          // $request->image->move(public_path('images'), $imageName);
          $request->file->storeAs('public/Crew_Pictures', $imageName);
      
          $crewData = ['First_Name' => $request->First_Name,'About' => $request->About, 'Last_Name' => $request->Last_Name, 'Role' => $request->Role, 'Picture_Link' => $imageName];
      
          Crew::create($crewData);
          return redirect('/')->with(['message' => 'Crew added successfully!', 'status' => 'success']);
    }

}
