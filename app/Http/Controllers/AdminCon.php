<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Cli;
use App\Models\Receptionist;
use App\Models\Appoiment;
use  App\Models\Patient;
use App\Models\Precraption;
use App\Models\Doctor;
use App\Http\Controllers\FuncCon;
use App\Models\Prevd;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
class AdminCon extends Controller
{
   public function login(Request $request){
    $username = $request->username;
    $password = $request->password;
    //return $request->all();
    $row = DB::select('SELECT * FROM `admin` WHERE username = ? AND password = ?', [$username,$password]);
    
    if( count($row)){
        session()->put("adminid",$row[0]->id);
     
        return redirect()->back();
    }else{
       
        return redirect()->back()->withErrors("credientials are wrong")->withInput();
    }
   }
}
