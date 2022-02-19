<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class dashboard_controller extends Controller
{
    public function add_facture()
    {
        return view('dashboard.add_facture');
    }

    public function form_add_facture(Request $request)
    {
        if ($request) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();// extension
                $filename = 'data.'.$extension;
                $file->move('data/', $filename);
                if ($file) {
                    return redirect('dashboard')->with('status', 'FACTURES DONES!');
                }else {
                    return redirect('/dashboard')->with('status_err', $request);
                }
            }else {
                return $request;
            }

        } else {
            return redirect('dashboard')->with('status', 'Profile ERROR!');
        }
    }


    public function list_facture()
    {
        
    $l = storage_path('../storage/framework/cache/data/json.json');
    $json = json_decode(file_get_contents($l), true);
        $add_facture = $json;
        return view('dashboard.list_facture')->with('add_facture',$add_facture);
    }

    public function search()
    {
        return view('dashboard.search_facture');
    }

    
    public function form_add_sci(Request $request)
    {
        if ($request) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();// extension
                $filename = 'data_sci.'.$extension;
                $file->move('data/', $filename);
                if ($file) {
                    return redirect('search')->with('status', 'FACTURES DONES!');
                }else {
                    return redirect('/search')->with('status_err', $request);
                }
            }else {
                return $request;
            }

        } else {
            return redirect('search')->with('status', 'Profile ERROR!');
        }
    }

    public function search_facture(Request $request)
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
                '<a href="/show_facture/'.$item->id.'">'.'<img style="max-width:100" width="80" src="uploads/project/'.$item->image.'">'.
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
            '<a href="/edit_facture/'.$item->id.'" class="btn btn-primary waves-effect waves-float waves-green"><i class="fa fa-edit"></i></a>'.
            '</td>'.
            '<td>'.
            '<form action="/delete_facture/'.$item->id.'" method="GET">'.
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


    public function generatePDF()
    {
        $l = ('./data/data_sci.json');
        $json = json_decode(file_get_contents($l), true);

        //return json_encode($json);
        $i = count($json);
        return view('factureSCIPM')->with('i', $i);
        /*for ($i=0; $i < 1; $i++) { 
            $filename = 'NOM PDF';
            $data = ['title' => 'Welcome to ItSolutionStuff.com'];
            $pdf = PDF::loadView('facture', $data)->save('./results/'.$filename.$i.'.pdf');
    
        }
            return 'dd';*/
    }

    public function facture()
    {
        
        $l = ('./data/data.json');
        $json = json_decode(file_get_contents($l), true);



        for ($i=0; $i < count($json["AC CONSEILS"]); $i++) { 
            $filename = 'AC CONSEILS '.$json['AC CONSEILS'][$i]["NOM "];
            $array = ['i' => $i ];
            $pdf = PDF::loadView('factureAC', $array)->save('./results/'.$filename.'.pdf');
        }
        for ($i=0; $i < count($json["EVOUTION PROFESSIONNELLE"]); $i++) { 
            $filename = 'EVOUTION PROFESSIONNELLE '.$json['EVOUTION PROFESSIONNELLE'][$i]["NOM "];
            $array = ['i' => $i ];
            $pdf = PDF::loadView('factureEV', $array)->save('./results/'.$filename.'.pdf');
        }
        for ($i=0; $i < count($json["PM GROUPE FRANCE"]); $i++) { 
            $filename = 'PM GROUPE FRANCE '.$json['PM GROUPE FRANCE'][$i]["NOM "];
            $array = ['i' => $i ];
            $pdf = PDF::loadView('facturePM', $array)->save('./results/'.$filename.'.pdf');
        }
        if ($pdf) {
            return 'true';
        } else {
            return 'false';
        }
        
        
        //return view('facture')->with('json', $json);
    }

    public function ac($id)
    {
        $l = ('./data/data.json');
        $json = json_decode(file_get_contents($l), true);

        $filename = date('Y m d ').'AC CONSEILS '.$json['AC CONSEILS'][$id]["NOM "];
        $array = ['i' => $id ];
        $pdf = PDF::loadView('factureAC', $array)->save('./results/'.$filename.'.pdf');
        
        if ($pdf) {
            return $pdf->download(''.$filename.'.pdf');
        } else {
            return redirect('dashboard')->with('Echec', 'UN ERREUR TROP GRAVE!');
        }
        

    }
    public function ev($id)
    {
        $l = ('./data/data.json');
        $json = json_decode(file_get_contents($l), true);

        $filename = date('Y m d ').'EVOUTION PROFESSIONNELLE '.$json['EVOUTION PROFESSIONNELLE'][$id]["NOM "];
        $array = ['i' => $id ];
        $pdf = PDF::loadView('factureEV', $array)->save('./results/'.$filename.'.pdf');
        
        if ($pdf) {
            return $pdf->download(''.$filename.'.pdf');
        } else {
            return redirect('dashboard')->with('Echec', 'UN ERREUR TROP GRAVE!');
        }
        

    }
    public function pm($id)
    {
        $l = ('./data/data.json');
        $json = json_decode(file_get_contents($l), true);

        $filename = date('Y m d ').'PM GROUPE FRANCE '.$json['PM GROUPE FRANCE'][$id]["NOM "];
        $array = ['i' => $id ];
        $pdf = PDF::loadView('facturePM', $array)->save('./results/'.$filename.'.pdf');
        
        if ($pdf) {
            return $pdf->download(''.$filename.'.pdf');
        } else {
            return redirect('dashboard')->with('Echec', 'UN ERREUR TROP GRAVE!');
        }
        

    }

    
    public function sci_pm($id)
    {
        $l = ('./data/data_sci.json');
        $json = json_decode(file_get_contents($l), true);

        $filename = date('Y m d ').'PM GROUPE FRANCE '.$json["SCI VERS PM GROUPE"][$id]["NOM"];
        $array = ['i' => $id ];
        $pdf = PDF::loadView('factureSCIPM', $array)->save('./results/'.$filename.'.pdf');
        
        if ($pdf) {
            return $pdf->download(''.$filename.'.pdf');
        } else {
            return redirect('search')->with('Echec', 'UN ERREUR TROP GRAVE!');
        }
        

    }

    public function sci_ar($id)
    {
        $l = ('./data/data_sci.json');
        $json = json_decode(file_get_contents($l), true);

        $filename = date('Y m d ').'AGENCE RECRUTEMENT '.$json['SCI VERS AGENCE RECRUTEMENT'][$id]["NOM"];
        $array = ['i' => $id ];
        $pdf = PDF::loadView('factureSCIAR', $array)->save('./results/'.$filename.'.pdf');
        
        if ($pdf) {
            return $pdf->download(''.$filename.'.pdf');
        } else {
            return redirect('search')->with('Echec', 'UN ERREUR TROP GRAVE!');
        }
        

    }
}
