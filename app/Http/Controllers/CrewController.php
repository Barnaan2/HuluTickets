<?php

namespace App\Http\Controllers;
use App\Models\Crew;
use Illuminate\Http\Request;
use App\Http\Controllers\MovieShowController;
class CrewController extends Controller
{
  
    public function index()
    {
        $crews = Crew::all();
        return view ('crews.index')->with('crews', $crews);
    }

    
    public function create()
    {
        return view('crews.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'Role' => 'required',
            'About' => 'required|min:50',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
      
        //   $imageName = time() . '.' . $request->file->extension();
           
        //   $request->file->storeAs('public/Crew_Pictures', $imageName);
        $number=SystemController::Count(\App\Models\Crew::all());
        $Picture_Name=request('First_Name') . $number . '.' . 'jpg';
           $Picture_Path=$request->file->storeAs('Crew_Pictures', $Picture_Name, 'public');
           $Picture_link="storage/" . $Picture_Path;
      
          $crewData = ['First_Name' => $request->First_Name, 'Last_Name' => $request->Last_Name, 'About' => $request->About, 'Role' => $request->Role, 'Picture_Link' => $Picture_link];
      
          Crew::create($crewData);
          return redirect('/')->with(['message' => 'Crew added successfully!', 'status' => 'success']);
    }

   
    public function show($id)
    {
        $crew = Crew::find($id);
        return view('crews.show')->with('crews', $crew);  
    }


    public function edit($id)
    {
        $crew = Crew::find($id);
        return view('crews.edit')->with('crews', $crew);
    }

    
    public function update(Request $request, $id)
    {
        $crew = Crew::find($id);
        $input = $request->all();
        $crew->update($input);
        return redirect('crew')->with('flash_message', 'crew Updated!');  
    }


    public function destroy($id)
    {
        Crew::destroy($id);
        return redirect('crew')->with('flash_message', 'crew deleted!'); 
    }
}
