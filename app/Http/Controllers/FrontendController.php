<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Image;
use App\News;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getGallery(){
        $items = Image::take(4)->get();
        return response()->json($items);
    }

    public function getNews(){
        $items = News::take(8)->get();
        return response()->json($items);
    }

    public function getBlogs(){
        $items = Blog::take(8)->get();
        return response()->json($items);
    }
}
