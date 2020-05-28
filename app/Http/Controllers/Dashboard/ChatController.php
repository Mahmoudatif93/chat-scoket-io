<?php

namespace App\Http\Controllers\Dashboard;
use App\Chatimages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {
            $messages = Chatimages::orderBy('id', 'asc')->where('from_id', request('from_id'))->where('to_id', request('to_id'))->orwhere('to_id', request('from_id'))->Where('from_id', request('to_id'))->get();

            if ($messages) {
                return response()->json([
                    'status' => 'success',
                    'messages' => $messages,
                ]);
            } else {
                return response()->json(['status' => 'error']);
            }
        }
        return view('dashboard.chat.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveshat()
    {


        $request_data['from_name']=request('from_name');
        $request_data['message']=request('message');
        $request_data['to_id']=request('to_id');
        $request_data['from_id']=request('from_id');
        $request_data['to_name']=request('to_name');
        $Employee=Chatimages::create($request_data);

    }



}
