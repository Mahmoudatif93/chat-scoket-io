<?php

namespace App\Http\Controllers\Dashboard;

use App\AddStore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AddstoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stores = DB::table('add_stores')
        ->join('categories', 'categories.id', '=','add_stores.tsnef')
        ->join('countries as city','city.id', '=','add_stores.city')
        ->join('countries as govern','govern.id', '=','add_stores.Governorate')
        ->select('add_stores.*','categories.name as cat_name','city.title as city_title','govern.title as govern_title')
       ->get();
       //dd($stores);
        return view('dashboard.addstore.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        $country_govs = DB::table('countries')->where('from_id', 0)->get();

        return view('dashboard.addstore.create',compact('categories','country_govs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('logo')){
            $filenameWithExtention=$request->file('logo')
            ->getClientOriginalName();
            $fileName=pathinfo($filenameWithExtention,
            PATHINFO_FILENAME) ;
            $max_file_uploads=500;
            $extension=$request->file('logo')->getClientOriginalExtension();
            $fileNameStore=$fileName .'_'.time().'.'.$extension;
          //  $path=$request->file('post_image')->storeAs('public/uploads/images',$fileNameStore);
            $request->file('logo')->move(public_path('uploads/images/images'),$fileNameStore);

        }else{
            $fileNameStore="noImage.jpg";
        }


           $request_data['tsnef']=$request->tsnef;
           $request_data['store_name']=$request->store_name;
           $request_data['store_mobile']=$request->store_mobile;
           $request_data['store_address']=$request->store_address;
           $request_data['logo']=$fileNameStore;
           $request_data['Governorate']=$request->Governorate;
           $request_data['City']=$request->City;
           $request_data['long_map']=$request->lang_map;
           $request_data['lat_map']=$request->lat_map;

           $Employee=AddStore::create($request_data);
           notify_msg('error','تم الاضافه');

           return redirect('admin/addstore');


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


      $post= AddStore::find($id);

      $categories = DB::table('categories')->get();
      $country_govs = DB::table('countries')->where('from_id', 0)->get();
      return view('dashboard.addstore.edit',compact('post','country_govs','categories'));
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

        if($request->hasFile('logo')){
            $filenameWithExtention=$request->file('logo')
            ->getClientOriginalName();
            $fileName=pathinfo($filenameWithExtention,
            PATHINFO_FILENAME) ;
            $max_file_uploads=500;
            $extension=$request->file('logo')->getClientOriginalExtension();
            $fileNameStore=$fileName .'_'.time().'.'.$extension;
          //  $path=$request->file('post_image')->storeAs('public/uploads/images',$fileNameStore);
            $request->file('logo')->move(public_path('uploads/images/images'),$fileNameStore);

        }else{
            $fileNameStore="noImage.jpg";
        }

        $post= AddStore::find($id);
        $post->tsnef=$request->tsnef;
        $post->store_name=$request->store_name;
        $post->store_address=$request->store_address;
        $post->Governorate=$request->Governorate;
        $post->City=$request->City;
        $post->logo=$fileNameStore;

        $post->long_map=$request->lang_map;
        $post->lat_map=$request->lat_map;
        $Employee= $post->save();

        notify_msg('success','تم التعديل بنجاح');

        return redirect('admin/addstore');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        AddStore::where('id',$id)->delete();

        notify_msg('success','تم الحذف بنجاح');

        return redirect('admin/addstore');
    }

    public function city($id)
    {


        $cities = DB::table("countries")
                    ->where("from_id",$id)
                    ->pluck("title","id");
        return json_encode($cities);
    }



}
