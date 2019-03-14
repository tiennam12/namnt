<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        return view('searchajax');
    }

    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('create_products')
            ->where('product_name', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
               $output .= '
               <li><a href="data/'. $row->id .'">'.$row->product_name.'</a></li>
               ';
           }
           $output .= '</ul>';
           echo $output;
       }
    }
}
