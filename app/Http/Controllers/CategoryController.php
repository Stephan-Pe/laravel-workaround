<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // use Authenticate.php to redirect users that are not logged in
    public function __construct() {
        $this->middleware('auth');
    }

   public function AllCat() {
    /**
    * Eloquent
    */
       $categories = Category::latest()->paginate(5);
       $trashCat = Category::onlyTrashed()->latest()->paginate(3);
    /**
    * Querybuilder
    *
    * $categories = DB::table('categories)
    *               ->join('users', 'categories.user_id', 'users.id')
    *               ->select('categories.*', 'user.name')
    *               ->latest()->paginate(5);
    */
    //    $categories = DB::table('categories')->latest()->get();
       return view('admin.category.index', compact('categories', 'trashCat'));
   }

   public function AddCat(Request $request) {
    $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
    ],
[
        'category_name.required' => 'Please fill out Category Name',
        'category_name.max' => 'Too many Characters!',
    ]);
    /**
     * Eloquent
     */
    // Category::insert([
    //     'category_name' => $request->category_name,
    //     'user_id' => Auth::user()->id,
    //     'created_at' => Carbon::now()
    // ]);

    $category = new Category;
    $category->category_name = $request->category_name;
    $category->user_id = Auth::user()->id;
    $category->save();
    /**
     * Querybuilder no need for Model
     */

    //  $data = array();
    //  $data['category_name'] = $request->category_name;
    //  $data['user_id'] = Auth::user()->id;
    //  DB::table('categories')->insert($data);

    return Redirect()->back()->with('success', 'Category inserted successfully');

   }

   public function Edit($id) {
        $categories = Category::find($id);

        return view('admin.category.edit', compact('categories'));
   }

   /**
    * Querybuilder
    * $categories = DB::table(?categories)->where('id, $id)-first();
    */

   public function Update(Request $request, $id) {
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('all.category')->with('success', 'Category updated successfully');
   }
   /**
    * Querybuilder
    * $data = array();
    * $data['category_name'] = $request->category_name;
    * $data['user_id'] = Auth::user()->id;
    * DB::table('categories')->where('id', $id)->update($data);
    */
    public function SoftDelete($id) {
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category is now in the Recycle-Area');
    }

    public function Restore($id) {
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category is restored');
    }

     public function Destroy($id) {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category is permanently deleted');
    }
}
