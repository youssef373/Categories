<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index() {
        $data = DB::table('categories')->where('cat_id', NULL)->where('sub_cat_id', NULL)->get();

        return view('index', compact('data'));
    }
    public function  showSubCategory($id){
        echo json_encode(DB::table('categories')->where('cat_id', $id)->where('sub_cat_id', NULL)->get());

    }
    public function  showSubOfSubCategory($id){
        echo json_encode(DB::table('categories')->where('sub_cat_id', $id)->get());

    }
}



