<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pages extends Model
{
   protected $fillable = [
        'title', 'icon', 'from_id','url','img','type_crud','route','have_branch'
    ];
    
    public function getall_pages()
    {
        
        $pages = DB::table('pages');
        $pages->where('from_id', '0');
        if($pages->count()>0)
        {
            $x=0;
            $data=array();
            foreach($pages->get() as $row)
            {
                $data[$x]=$row;
                
                $data[$x]->sub= $this->get_sub($row->id);
               $x++; 
            }
            return $data;
        }else{
            return false  ;
        }
      
    }
    
     public function get_sub($id)
    {
        $pages = DB::table('pages');
        $pages->where('from_id', $id);
        if($pages->count()>0)
        {
          return $pages->get();   
        }else{
           return false; 
        }
    }


}
