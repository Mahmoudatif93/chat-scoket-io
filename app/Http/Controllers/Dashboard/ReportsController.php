<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\DataTables\ReportsDataTable;


class ReportsController extends Controller
{
    public function currentDate(ReportsDataTable $reports){
        return $reports->render('dashboard.reports.current');

    }

    public function currentDate2(){

        $currnetData = DB::table('missing_found')
            ->join('users', 'users.id', '=', 'missing_found.user_id')
            ->join('categories', 'categories.id', '=','missing_found.category_id_fk')
            ->join('countries as city','city.id', '=','missing_found.city_id_fk')
            ->join('countries as govern','govern.id', '=','missing_found.govern_id_fk')
            ->select('missing_found.*','categories.name as cat_name','users.name as user_name','city.title as city_title','govern.title as govern_title')

            ->whereDate('missing_found.created_at', '=', date('Y-m-d'))
           ->get();
         //  dd($currnetData);


           return view('dashboard.reports.current',compact('currnetData',$currnetData));

    }

    public function index(ReportsDataTable $reports)
    {
        return $reports->render('dashboard.reports.index');
    }
    public function index2(Request $request)
    {
        //dd($request->all());

        $q = DB::table('missing_found')
            ->leftJoin('users', 'users.id', '=', 'missing_found.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'missing_found.category_id_fk')
            ->leftJoin('countries as city', 'city.id', '=', 'missing_found.city_id_fk')
            ->leftJoin('countries as govern', 'govern.id', '=', 'missing_found.govern_id_fk')
            ->select('missing_found.*', 'users.name as u_name', 'categories.name as cat_name', 'city.title as city_title', 'govern.title as govern_title');

        if (isset($request['report_with'])) {
            if (isset($request['month'])) {
                $currnetData = $q->whereMonth('missing_found.created_at', '=', $request['month'])->get();
            }

            if (isset($request['year'])) {
                $currnetData = $q->whereYear('missing_found.created_at', '=', $request['year'])->get();
            }

            if (isset($request['from']) && isset($request['to'])) {
                $currnetData = $q->whereBetween('missing_found.created_at', array($request->from, $request->to))->get();
            }


        } else {
            $currnetData = $q->get();
            //dd($currnetData);
        }

        return view('dashboard.reports.index_old', compact('currnetData'));
    }





    public function destroy($id,Request $request)
    {
        $missing_found = DB::table('missing_found')->where('id', $id)->first();
        File::delete(('public/uploads/images/missing_found/' . $missing_found->img));
        DB::table('missing_found')->where('id', $id)->delete();
        if (isset($request['deletecurrent'])) {

            //return redirect(route('currentDate'));
            return redirect('ar/admin/currentDate');
        }else{
            return redirect(route('reports.index'));
        }

    }




    public function deletedata($id)
    {

        $missing_found = DB::table('missing_found')->where('id', $id)->first();
        File::delete(('public/uploads/images/missing_found/' . $missing_found->img));
        DB::table('missing_found')->where('id', $id)->delete();

        return redirect('admin/currentDate/currentDate');
    }



}
