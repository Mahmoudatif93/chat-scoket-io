<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Pages;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;
use App\DataTables\EmployeeDataTable;



class EmpolyeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user2;
    public function __construct() {
       parent::__construct();

     //$this->middleware(['permission:create_users'])->only(['index','create','show']);
   //  $this->middleware(['permission:print_printpages'])->only(['print']);
     //$this->middleware(['permission:create_users'])->only(['index','create']);
     //$this->middleware(['permission:read_users']);
      //$this->middleware(['permission:print_printusers'])->only(['print']);

         $this->user2 = 10;

 }
    public function index(EmployeeDataTable  $employees)
    {
        return $employees->render('dashboard.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees=DB::table('employees')->get();
        //dd($employees);
        return view('dashboard.employee.create',compact('employees',$employees));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       if($request->hasFile('post_image')){
        $filenameWithExtention=$request->file('post_image')
        ->getClientOriginalName();
        $fileName=pathinfo($filenameWithExtention,
        PATHINFO_FILENAME) ;
        $max_file_uploads=500;
        $extension=$request->file('post_image')->getClientOriginalExtension();
        $fileNameStore=$fileName .'_'.time().'.'.$extension;
      //  $path=$request->file('post_image')->storeAs('public/uploads/images',$fileNameStore);
        $request->file('post_image')->move(public_path('uploads/images/images'),$fileNameStore);

    }else{
        $fileNameStore="noImage.jpg";
    }

       $employee=Employee::where('emp_name',$request->emp_name)->exists();
       if ($employee == false) {
           $request_data['emp_name']=$request->emp_name;
           $request_data['national_num']=$request->national_num;
           $request_data['adress']=$request->adress;
           $request_data['phone']=$request->phone;
        $request_data['emp_img']=$fileNameStore;
           $Employee=Employee::create($request_data);
           $user=User::where('email', $request->email)->exists();
           if ($user == false) {
               if ($request->emp_type == 1) {
                   $request_data=$request->except(['password','permission']);
                   $request_data['password']=Hash::make($request->password);
                   $request_data['employee_id']=$Employee->id;
                   $request_data['email']=$request->email;
                   $request_data['name']=$request->emp_name;
                   $request_data['national_num']=$request->national_num;
                   $request_data['adress']=$request->adress;
                   $request_data['phone']=$request->phone;
                   $request_data['user_img']=$fileNameStore;
                   $request_data['role_id_fk']='3';
                  //dd($request_data);
                   $user=User::create($request_data);
                   $user->attachRole('super_admin'); /// super_admin
          // $user->syncPermissions($request->permission);
               } elseif ($request->emp_type == 2) {
                   $request_data=$request->except(['password','permission']);
                   $request_data['password']=Hash::make($request->password);
                   $request_data['employee_id']=$Employee->id;
                   $request_data['name']=$Employee->emp_name;
                   $request_data['email']=$request->email;
                   $request_data['national_num']=$request->national_num;
                   $request_data['adress']=$request->adress;
                   $request_data['phone']=$request->phone;
                $request_data['user_img']=$fileNameStore;
                   $request_data['role_id_fk']='3';
                 // dd($request_data);
                   $user=User::create($request_data);
                   $user->attachRole('admin'); /// super_admin
          // $user->syncPermissions($request->permission);
               }
           }
       }else{
           // Session::flash('message', 'هذا المستخدم موجود  مسبقا');
            notify_msg('error','هذا المستخدم موجود  مسبقا');

            return redirect('admin/employees/create');
        }
        return back();
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
        $post=Employee::find($id);

        return view('dashboard.employee.create')->with('post',$post);
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
        $post= Employee::find($id);

        $post->emp_name=$request->emp_name;
        $post->national_num=$request->national_num;
        $post->adress=$request->adress;
        $post->phone=$request->phone;
        $Employee= $post->save();

        notify_msg('success','تم التعديل بنجاح');

        return redirect('admin/employees/create');
/*
$Employee=DB::table('employees')->get();
        //$Employee=Employee::create($request_data);
        if($request->emp_type == 1)
        {
            $request_data=$request->except(['password','permission']);
            $request_data['password']=Hash::make($request->password);
            $request_data['employee_id']=$Employee->id;
            $request_data['email']=$request->email;
            $request_data['name']=$request->emp_name;
            $user=User::create($request_data);
           $user->attachRole('super_admin'); /// super_admin
          // $user->syncPermissions($request->permission);
        }else if($request->emp_type == 2){
            $request_data=$request->except(['password','permission']);
            $request_data['password']=Hash::make($request->password);
            $request_data['employee_id']=$Employee->id;
            $request_data['name']=$Employee->emp_name;
            $request_data['email']=$request->email;

            $user=User::create($request_data);
           $user->attachRole('admin'); /// super_admin
          // $user->syncPermissions($request->permission);
}*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {

        Employee::where('id',$employee->id)->delete();
        User::where('name',$employee->emp_name)->delete();

        notify_msg('success','تم الحذف بنجاح');

        return redirect('admin/employees/create');
    }

    public function create_emp(pages $pages)
    {

        $pages = $pages->getall_pages();
        //$employees = Employee::all();
        $data=[];
        $used = DB::table('users')
            ->select('employee_id')
            ->where('users.employee_id', '!=', 0)->get();
        foreach ($used as $user) {
            $data[] = $user->employee_id;
        }

        $employees = Employee::all()->whereNotIn('id', $data);

        //dd($employees);
        return view('dashboard.employee.create_emp', compact('pages', 'employees'));
    }
    public function store_emp(Request $request)
    {
        $user = new User;

        $request_data = $request->except(['password', 'permission','emp_type','_method','_token']);
        $request_data['password'] = Hash::make($request->password);
        $request_data['employee_id'] = $request['employee_id'];

        dd($request_data);
        //$user = User::create($request_data);
        $user->save($request_data);
        if($request->emp_type == 1){
            $user->attachRole('super_admin'); /// super_admin
        }else if($request->emp_type == 2){
            $user->attachRole('admin');

        }
        if($request->permission)
            $user->syncPermissions($request->permission);
        return redirect('admin/employees/create');
    }
}
