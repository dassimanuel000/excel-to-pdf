<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class dashboard_controller extends Controller
{
    public function add_auto()
    {
        return view('dashboard.auto.add_auto');
    }


    public function list_auto()
    {
        
    $l = storage_path('../storage/framework/cache/data/json.json');
    $json = json_decode(file_get_contents($l), true);
        $add_auto = $json;
        return view('dashboard.auto.list_auto')->with('add_auto',$add_auto);
    }

    public function show_auto($id)
    {
        $json = json_decode(file_get_contents("https://api.npoint.io/d3d609dfd966deae52e2"), true);
        $json = $json[$id];
        $add_auto = $json;
        return view('dashboard.auto.show_auto')->with('add_auto',$add_auto);
    }

    public function search()
    {
        return view('dashboard.auto.search_auto');
    }

    public function search_auto(Request $request)
    {

       if($request->ajax()){

         $output="";
         $i=0;

         $search = [];

         if($search){

            foreach ($search as  $item) {

                $output.='<tr>'.

             '<td>'.'<span class="col-green">'.$item->id.'</span>'.'</td>'.

             '<td>'.
                '<a href="/show_auto/'.$item->id.'">'.'<img style="max-width:100" width="80" src="uploads/project/'.$item->image.'">'.
             '</td>'.

             '<td>'.$item->referent.'</td>'.

             '<td>'.'<span class="text-muted">'.$item->title.'</span>'.'</td>'.

             '<td>'.'<span class="text-color">'.$item->description.'</span>'.'</td>'.

             '<td>'.'<span class="text-color">'.$item->category.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$item->quantity.'</span>'.'</td>'.

             '<td class="price_min">'.'<span class="col-green">'.$item->price_min.'</span>'.'</td>'.

             '<td class="price_max">'.'<span class="col-red">'.$item->price_max.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$item->alarm_stock.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$item->project_type.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$item->provider.'</span>'.'</td>'.

             '<td>'.'<span class="text-muted">'.$item->tax.'</span>'.'</td>'.


             '<td>'.
            '<a href="/edit_auto/'.$item->id.'" class="btn btn-primary waves-effect waves-float waves-green"><i class="fa fa-edit"></i></a>'.
            '</td>'.
            '<td>'.
            '<form action="/delete_auto/'.$item->id.'" method="GET">'.
                csrf_field().
                method_field("DELETE").
                '<button type="submit" onclick="if(confirm("Are you sure ? Vous ne pourez rien modifier") == true){ return true; } else {return false}" class="btn btn-danger waves-effect waves-float waves-red">'.
                    '<i class="fa fa-trash"></i>'.
                '</button>'.
            '</form>'.
            '</td>'.

             '</tr>';

            }
            return $output;

         }else {
            $output.='<div class="col-md-12">
							<div class="card full-height ">
								<div class="card-body">
                                    <div class="alert alert-danger" role="alert">
                                        <b>AUCUNE auto AVEC CES IDENTIFIANTS</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                ';

            return $output;
         }

       }

    }
}
