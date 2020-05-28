<?php

namespace App\Http\Controllers\Dashboard;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Pages;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\DataTables\UsersEmpDataTable;

class UsersEmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersEmpDataTable $usersemps)
    {
        /*$usersemps = User::where('role_id_fk', 3)->where('employee_id','!=', 0)->get();

        return view('dashboard.usersemps.index', compact('usersemps'));*/
        return $usersemps->render('dashboard.usersemps.index',['title' => 'عرض موظف كمستخدم']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(pages $pages)
    {
        $pages = $pages->getall_pages();


        //dd($pages);
        //$employees = Employee::all();
        $data = [];
        $used = DB::table('users')
            ->select('employee_id')
            ->where('users.employee_id', '!=', 0)->get();
        foreach ($used as $user) {
            $data[] = $user->employee_id;
        }
        $employees = Employee::all()->whereNotIn('id', $data);

        //dd($employees);
        return view('dashboard.usersemps.create', compact('pages', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo ((in_array('update_pages',$request->permission)?'checked':''));
        //dd($request->all());

        $data = $this->validate(
            request(),
            [
                'user_img' => 'image|mimes:jpg,jpeg,png,gif,bmp',
                'employee_id' => 'required',
                'role_id' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required',
            ]
        );
        $employee = Employee::find($request->employee_id);
        $request_data['employee_id'] = $employee->id;
        $request_data['name'] = $employee->emp_name;
        $request_data['national_num'] = $employee->national_num;
        $request_data['adress'] = $employee->adress;
        $request_data['phone'] = $employee->phone;
        $request_data['user_img'] = $employee->emp_img;
        //
        $request_data['role_id_fk'] = '3';
        $request_data['email'] = $request->email;
        $request_data['password'] = Hash::make($request->password);
        //dd($request_data);
        if (request()->hasFile('user_img')) {
            $file = $request->file('user_img');
            $name =$file->hashName();

            $request->file('user_img')->move(public_path('uploads/images/user_images'),$name);
            $request_data['user_img'] = $name;

        }
        
        //dd($request_data);
        $user = User::create($request_data);

        if ($request->role_id == 1) {
            $user->attachRole('super_admin');
        } else if ($request->role_id == 2) {
            $user->attachRole('admin');
        }

        if ($request->permission) {
            $user->syncPermissions($request->permission);
        }
		session()->flash('success', "تم الاضافة بنجاح");
        return redirect('admin/usersemps');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        //dd($user);
        return view('dashboard.usersemps.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $data = $this->validate(
            request(),
            [
                'user_img' => 'image|mimes:jpg,jpeg,png,gif,bmp',
                'role_id' => 'required',
                'name' => 'required',
				'email'    => 'required|email|unique:users,email,'.$id,
                'password' => 'sometimes|nullable|min:6|confirmed',
                'password_confirmation' => 'sometimes|nullable',
            ]
        );
        $request_data['name'] = $request->name;
        $request_data['national_num'] = $request->national_num;
        $request_data['adress'] = $request->adress;
        $request_data['phone'] = $request->phone;

        if (request()->hasFile('user_img')) {
            $file = $request->file('user_img');
            $name = rand(11111, 99999) . '.' .$file->getClientOriginalName();
            $user = User::find($id);
            File::delete(('public/uploads/images/user_images/' . $user->user_img));
            $request->file('user_img')->move(public_path('uploads/images/user_images'),$name);
            $request_data['user_img'] = $name;

        }
        //dd($request_data);
        $request_data['email'] = $request->email;
        $request_data['password'] = Hash::make($request->password);
         User::where('id', $id)->update($request_data);
         $user = User::find($id);
        //dd($user);

        if ($request->role_id) {
            $user->syncRoles($request->role_id);
        }

        if ($request->permission && $request->role_id[0] != 1) {
            $user->syncPermissions($request->permission);
        }
		session()->flash('success', "تم التعديل بنجاح");

        return redirect('admin/usersemps');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        File::delete(('public/uploads/images/user_images/' . $user->user_img));
        $user->detachPermissions();
        $user->attachRoles();
        $user->delete();

		session()->flash('success', "تم المسح بنجاح");

        return redirect('admin/usersemps');
    }
}
