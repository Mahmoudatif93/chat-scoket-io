<?php

namespace App\Http\Controllers\Dashboard;

use App\Pages;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{
     public function __construct() {
        parent::__construct();
     $this->middleware(['permission:create_pages'])->only(['index','create','show']);  
       //$this->middleware(['permission:print_printusers'])->only(methods: 'print');  
      
      
     // $this->middleware(['permission:create_pages']);
       //$this->middleware(['permission:read_users']);
     $this->middleware(['permission:print_printusers'])->only(['print']);
        
          $this->user2 = 10;   
       
  }
      
    public function index()
    {
        
    }

    
    public function create(Pages $pages)
    {
       // $page=DB::table('pages')->where('have_branch', 1)->get();
       
        $pagess=$pages->get_all_pages();
         echo "<pre>";
        print_r($pagess);
     // return view('dashboard.pages.create',compact('page'));
    }

    
    public function store(Request $request)
    {
        
       $request_data['title']=$request->title;
       $request_data['type']=$request->type;
       if($request->from_id){
       $request_data['from_id']=$request->from_id;
       $request_data['route']=$request->route;
        $request_data['have_branch']=$request->have_branch;
       }else{
        $request_data['from_id']=0;
        $request_data['route']='#';
        $request_data['have_branch']=1;
       }
       
        $request_data['url']=$request->url;
        $request_data['type_crud']=$request->type_crud;
        
      
        
        $page=Pages::create($request_data);
      //dd($request->all());
      
      // return redirect('admin/users/create'); 
    }

    
    public function show(Pages $pages)
    {
        echo "<pre>";
      print_r($pages->getall_pages()) ;
      
    }

   
    public function edit(Pages $pages)
    {
       
    }

    
    public function update(Request $request, Pages $pages)
    {
        
    }

    
    public function destroy(Pages $pages)
    {
        //
    }
     public function print()
    {
        //
    }
}
