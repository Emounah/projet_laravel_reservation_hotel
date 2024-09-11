<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class getAdmin extends Controller
{
    public function admin_index(){
        return view('viewAdmin.welcome');
    }
    public function products_admin(){
        return view('viewAdmin.products');
    }
    public function prix(){
        return view('viewAdmin.prix');
    }
}
