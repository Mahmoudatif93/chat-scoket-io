<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Pages;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UsersDatatable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user2;
    public function __construct()
    {
        parent::__construct();

        $this->middleware(['permission:create_users'])->only(['index', 'create', 'show']);
        //  $this->middleware(['permission:print_printpages'])->only(['print']);
        //$this->middleware(['permission:create_users'])->only(['index','create']);
        //$this->middleware(['permission:read_users']);
        //$this->middleware(['permission:print_printusers'])->only(['print']);

        $this->user2 = 10;

    }
    public function index(UsersDatatable $users)
    {
        return $users->render('dashboard.users.index', ['title' => trans('admin.users')]);
    }
    public function index2()
    {
        $user = User::all();
        return view('dashboard.users.index', compact('user'));
    }

    public function create(pages $pages)
    {

        $pages = $pages->getall_pages();
        return view('dashboard.users.create', compact('pages'));
    }

    public function store(Request $request)
    {

        if ($request->hasFile('user_image')) {
            $filenameWithExtention = $request->file('user_image')
                ->getClientOriginalName();
            $fileName = pathinfo($filenameWithExtention,
                PATHINFO_FILENAME);
            $max_file_uploads = 500;
            $extension = $request->file('user_image')->getClientOriginalExtension();
            $fileNamemgi = $fileName . '_' . time() . '.' . $extension;
            //  $path=$request->file('post_image')->storeAs('public/uploads/images',$fileNameStore);
            $request->file('user_image')->move(public_path('uploads/images/images'), $fileNamemgi);

        } else {
            $fileNamemgi = "noImage.jpg";
        }

        $request_data['user_img'] = $fileNamemgi;
        $request_data = $request->except(['password', 'permission']);
        $request_data['password'] = Hash::make($request->password);

        $user = User::create($request_data);

        $user->attachRole('admin');
        if ($request->permission) {
            $user->syncPermissions($request->permission);
        }
        return redirect('admin/users/create');
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
    public function show(Pages $pages)
    {
        //echo "<pre>";
        // print_r($pages->getall_pages()) ;

    }
    function print() {
        //
    }
}
