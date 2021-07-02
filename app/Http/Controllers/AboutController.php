<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Auth;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function HomeAbout() {
        $homeAbout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeAbout'));
    }

    public function AddAbout() {

        return view('admin.home.create');
    }

    public function StoreAbout(Request $request) {

   
    /**
     * Eloquent
     */
    HomeAbout::insert([
        'title' => $request->title,
        'sub_title' => $request->sub_title,
        'description' => $request->description,
        'created_at' => Carbon::now()
    ]);




    return Redirect()->route('home.about')->with('success', 'Abouts inserted successfully');
    }
    public function EditAbout($id) {
        $homeAbout = HomeAbout::find($id);
      return view('admin.home.edit', compact('homeAbout'));  
    }

    public function UpdateAbout(Request $request, $id) {
        
        
    /**
     * Eloquent
     */
    $update = HomeAbout::find($id)->update([
        'title' => $request->title,
        'sub_title' => $request->sub_title,
        'description' => $request->description,
    ]);
     return Redirect()->route('home.about')->with('success', 'Abouts updated successfully');
    }
    public function DeleteAbout($id) {
        $delete = HomeAbout::find($id)->Delete();
        return Redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function Portfolio() {
         $images = Multipic::all();
        return view('pages.portfolio', compact('images'));
    }
    
}
