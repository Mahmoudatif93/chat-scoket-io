<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\ServiceProvider;
use App\Pages;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     public function __construct() {
       $this->middleware('auth');
  }
  
  
  
  public function boot(Pages $pages)
    {

          $pages=  $pages->getall_pages();
          view()->share('dashbord.pages.create', $pages); 
    }

}
