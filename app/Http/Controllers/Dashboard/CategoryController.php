<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=DB::table('categories')->get();

       return view('dashboard.categories.add_category',compact('categories'));
    }


    public function store(Request $request)
    {

       if($request->hasFile('file'))
       {
           $cover = $request->file('file');
           $extension = $cover->getClientOriginalExtension();
           $name = $cover->getClientOriginalName();
           $size = $cover->getSize();
           $Minetype = $cover->getMimeType();
           $realpath=  $cover->getRealPath();
          $cover->move(public_path('uploads/images'),$name);


       }



        $request_data['name']=$request->name;
        $request_data['img']=$name;
       $request_data['approved']=1;

       $category=Category::create($request_data);

        return redirect('admin/categories/create');

    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('dashboard.categories.add_category',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        if($request->hasFile('file'))
        {
            $cover = $request->file('file');
            $extension = $cover->getClientOriginalExtension();
            $name = $cover->getClientOriginalName();
            $size = $cover->getSize();
            $Minetype = $cover->getMimeType();
            $realpath=  $cover->getRealPath();
            $cover->move(public_path('uploads/images'),$name);
            $request_data['img']=$name;

        }
       $request_data['name']=$request->name;
      $category->update($request_data);
      return redirect('admin/categories/create');
    }


    public function destroy(Category $category)
    {
      $category->delete();
      return redirect('admin/categories/create');

    }

      public function print()
    {
      $category->delete();
      return redirect('admin/categories/create');

    }
}
