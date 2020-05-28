<?php

namespace App\Http\Controllers\Dashboard;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;




class CountryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $countries = DB::table('countries')->get();
    $country_govs = DB::table('countries')->where('from_id', 0)->get();

    return view('dashboard.countries.index', compact('countries', 'country_govs'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $countries = DB::table('countries')->get();
    $country_govs = DB::table('countries')->where('from_id', 0)->get();

    return view('dashboard.countries.create', compact('countries', 'country_govs'));
  }


  public function store(Request $request)
  {
    $data = $this->validate(request(),['title' => 'required|unique:countries',]);

    $data['title'] = request()->title;
    $data['from_id'] = request()->from_id;

    if (request()->country_id == 2)
      $data['from_id']  = 0;


    //dd($data);
		session()->flash('success', "تم الاضافة بنجاح");


    $category = Country::create($data);

    return redirect('admin/countries/create');
  }


  public function show($id)
  {
    $country_govs = DB::table('countries')->where('from_id', 0)->get();
    $from_id = $id;
    $cities = DB::table('countries')->where('from_id', $id)->get();
    return view('dashboard.countries.show', compact('cities', 'country_govs', 'from_id'));
  }


  public function edit(Country $country)
  {
  }


  public function update(Request $request, Country $country)
  {
    $data = $this->validate(request(),['title' => 'required|unique:countries,title,'.$country->id]);
		session()->flash('success', "تم التعديل بنجاح");

    $country->update($request->all());
    return back();
  }


  public function destroy(Country $country)
  {
    if ($country->from_id != 0)
      $country->delete();
    else{
      $country->delete();
      Country::where('from_id',$country->id)->delete();
    }
		session()->flash('success', "تم الحذف بنجاح");

    return back();
  }
}
