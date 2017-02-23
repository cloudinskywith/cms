<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::paginate(10);
        return view('backend.images.index')->with('images', $images);
    }

    public function create()
    {
        return view('backend.images.create');
    }

    public function show($id)
    {
        $image = Image::find($id);
        return view('image-detail')->with('image', $image);
    }

    public function edit($id)
    {
        $image = Image::find($id);
        return view('backend.images.edit')->with('image', $image);
    }

    public function store(Request $request)
    {
        // Validation //
        $validation = Validator::make($request->all(), [
            'caption'     => 'required',
            'description' => 'required',
            'userfile'     => 'required|image|mimes:jpeg,png|min:1|max:250'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                ->with('errors', $validation->errors() );
        }

        $image = new Image;

        // upload the image //
        $file = $request->file('userfile');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);

        // save image data into database //
        $image->file = $destination_path . $filename;
        $image->caption = $request->input('caption');
        $image->description = $request->input('description');
        $image->save();

//        return redirect('/')->with('message','You just uploaded an image!');
        return redirect('/admin/images')->with('message','你刚刚上传了一张图片');
    }

    public function update(Request $request, $id)
    {
        // Validation //
        $validation = Validator::make($request->all(), [
            'caption'     => 'required',
            'description' => 'required',
            'userfile'    => 'sometimes|image|mimes:jpeg,png|min:1|max:250'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                ->with('errors', $validation->errors() );
        }

        // Process valid data & go to success page //
        $image = Image::find($id);

        // if user choose a file, replace the old one //
        if( $request->hasFile('userfile') ){
            $file = $request->file('userfile');
            $destination_path = 'uploads/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $image->file = $destination_path . $filename;
        }

        // replace old data with new data from the submitted form //
        $image->caption = $request->input('caption');
        $image->description = $request->input('description');
        $image->save();

        return redirect('/admin/images')->with('message','你刚刚更新了一张图片');
    }

    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect('/admin/images')->with('message','你刚刚删除了一张图片');
    }
}
