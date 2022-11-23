<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $data= products::all();

       return view('product',['products'=>$data]);
    }
    function detail($id)
    {
        $data =products::find($id);
        return view('detail',['product'=>$data]);
    }
    function search(Request $req)
    {
        $data= products::all();
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }
    
}
