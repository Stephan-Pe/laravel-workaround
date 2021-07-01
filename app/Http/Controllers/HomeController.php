<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{
    public function HomeSlider() {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider() {

        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request) {
    $validatedData = $request->validate([
            'title' => 'required|unique:sliders|min:4',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'ttle.required' => 'Please fill out Brand Name',
            'description.required' => 'Too many Chars!',
    ]);

    $slider_image = $request->file('image');

    // $img_name = hexdec(uniqid());
    // $img_ext = strtolower($brand_image->getClientOriginalExtension());
    // $new_imgName = $img_name. '.' . $img_ext;
    // $img_path = 'image/brand/';
    // $last_img = $img_path.$new_imgName;
    // $brand_image->move($img_path, $new_imgName);

    $img_name = hexdec(uniqid()). '.' . $slider_image->getClientOriginalExtension();
    Image::make($slider_image)->resize(300, 200)->save('image/slider/'. $img_name);

    $last_img = 'image/slider/' . $img_name;

    Slider::insert([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $last_img,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('home.slider')->with('success', 'Slider inserted successfully!');
    }
}
