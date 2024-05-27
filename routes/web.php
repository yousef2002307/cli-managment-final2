<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Cli;
use App\Models\Receptionist;
use App\Models\Appoiment;
use  App\Models\Patient;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Mail;
use  App\Models\Profit;
use App\Models\Precraption;
use App\Models\Doctor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use App\Models\Prevd;
use App\Models\Image;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CliController;
use App\Http\Controllers\AdminCon;
use App\Http\Controllers\FuncCon;
use App\Http\Middleware\HomeMw;
use App\Http\Middleware\CliMw;
use App\Http\Middleware\AdminMw;
use Carbon\Carbon;
use App\Http\Middleware\DocMw;
use App\Http\Middleware\ResMw;
use App\Http\Middleware\FirstMw;


use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| \App\Http\Middleware\HomeMw::class,
*/
//return Patient::find(2)->precraption;
//return Precraption::find(1)->patients;
// return Doctor::find(1)->precraption;
//return Prevd::find(1)->patients;
//return Patient::find(2)->prevd;
//return Image::find(1)->patients;
// return Doctor::find(1)->profits;
/////////////////////////////main////////////////////////////////////////////////////////////////////////////
Route::get('/testroute', function() {
  $name = "Funny Coder";

  // The email sending is done using the to method on the Mail facade
  Mail::to('mmnwat6@gmail.com')->send(new HelloMail);
});

Route::get('/', function () {
   $obj1 = new FuncCon;
   $obj1->removedated();
   $obj1->removedated2();
   $obj1->removedated3();
   session()->put('chatcount',0);
   
   session()->put('resi',0);
    return view("home");
})->middleware(FirstMw::class);

Route::get('/about', function () {
  
   return view("about");
})->middleware(FirstMw::class);


Route::get('/serv', function () {
  
  return view("services");
})->middleware(FirstMw::class);

Route::get('/contact', function () {
  
  return view("contact");
})->middleware(FirstMw::class);

Route::post('/contact', function (Request $request) {
 
  $name = $request->message;

$email = $request->email;
  $fromName = 'user';
  Mail::to('mmnwat6@gmail.com')
  ->send(new HelloMail( $name,$email));
  return back();
})->middleware(FirstMw::class);



Route::get('/forget', function () {
  
  return view("forget");
})->middleware(FirstMw::class);

Route::post('/forget', function (Request $request) {
  $record = Patient::where('username', $request->username)
  ->where('email', $request->email)
  ->first();

if ($record) {
  $phone = $record->phone;
$id = $record->id;
//$password = Hash::make($request->password);
//$record->update(['password' => $password]);

//$basic  = new \Vonage\Client\Credentials\Basic("b1a562fc", "0jBfAJPg7b8vHZ4c");
//$client = new \Vonage\Client($basic);
$number = rand(1000, 9999);

// Convert the number to a string and prepend zeros if needed
$number =  str_pad($number, 4, '0', STR_PAD_LEFT);
/*
$response = $client->sms()->send(
  new \Vonage\SMS\Message\SMS("+2$phone", "heart clinic managment system", "your code is : $number")
);

$message = $response->current();

if ($message->getStatus() == 0) {
  echo "The message was sent successfully\n";
} else {
  echo "The message failed with status: " . $message->getStatus() . "\n";
}
*/
return view("reset",compact("phone","number","id"));
} else {
return redirect()->back()->withErrors("wrong credentials")->withInput();
}
  
})->middleware(FirstMw::class);




Route::post('/reset', function (Request $request) {
  if($request->hid == $request->email ){
$record = Cli::find($request->id);
  $password = Hash::make($request->password);
$record->update(['password' => $password]);
return redirect()->to('/cliniclogin')
    ->with('success', 'reset successful!') // Use 'success' key for success message
    ->withInput();

  }else{
    return redirect()->back()->withErrors("wrong credentials")->withInput();
  }
})->middleware(FirstMw::class);






Route::get('/forget2', function () {
  
  return view("forget2");
})->middleware(FirstMw::class);

Route::post('/forget2', function (Request $request) {
  $record =Cli::where('name', $request->username)
  ->where('email', $request->email)
  ->first();

if ($record) {
  $phone = $record->phone;
$id = $record->id;
//$password = Hash::make($request->password);
//$record->update(['password' => $password]);

//$basic  = new \Vonage\Client\Credentials\Basic("b1a562fc", "0jBfAJPg7b8vHZ4c");
//$client = new \Vonage\Client($basic);
$number = rand(1000, 9999);

// Convert the number to a string and prepend zeros if needed
$number =  str_pad($number, 4, '0', STR_PAD_LEFT);
/*
$response = $client->sms()->send(
  new \Vonage\SMS\Message\SMS("+2$phone", "heart clinic managment system", "your code is : $number")
);

$message = $response->current();

if ($message->getStatus() == 0) {
  echo "The message was sent successfully\n";
} else {
  echo "The message failed with status: " . $message->getStatus() . "\n";
}
*/
return view("reset",compact("phone","number","id"));
} else {
return redirect()->back()->withErrors("wrong credentials")->withInput();
}
  
  
})->middleware(FirstMw::class);


Route::get('/forget3', function () {
  
  return view("forget3");
});

Route::post('/forget3', function (Request $request) {
  $record = Doctor::where('username', $request->username)
  ->where('email', $request->email)->where('clinic_id',session('cliid'))
  ->first();

if ($record) {
$password = Hash::make($request->password);
$record->update(['password' => $password]);

return redirect()->back()->with('success', 'Action was successful.');
} else {
return redirect()->back()->withErrors("wrong credentials")->withInput();
}
  
});


Route::get('auth/google', [UserController::class,"googlepage"]);
Route::get('auth/google/callback', [UserController::class,"googlecallback"]);
Route::get('/userlogin', [UserController::class,"index"])->name("user-login")->middleware(FirstMw::class);
Route::post('/userlogin', [UserController::class,"prereg"])->name("user-login.post");
Route::post('/userlogin2', [UserController::class,"prelog"])->name("user-login2.post");

Route::get('/cliniclogin', [CliController::class,"index"])->name("Cli-login")->middleware(FirstMw::class);
Route::post('/cliniclogin', [CliController::class,"reg"])->name("Cli-login.post")->middleware(FirstMw::class);
Route::post('/cliniclog', [CliController::class,"login"])->middleware(FirstMw::class);
//////////////////////////////////////////////admin/////////////////////////////////////////////////////////////

Route::get("/admin",function(){
return view('admin.log');
})->name('admin')->middleware(FirstMw::class);

Route::post('/admin', [AdminCon::class,"login"])->name("admin")->middleware(FirstMw::class);




Route::get("/adminhome",function(){
  $pat = count(Patient::all());
  $doc = count(Doctor::all());
  $cli = count(Cli::all());
  $res = count(Receptionist::all());

    return view('admin.main',compact('pat','doc','cli','res'));
  })->name('adminhome')->middleware(AdminMw::class);


  
Route::get("/clitable",function(){
  
  $cli = Cli::with('doctors')->paginate(5);


  

    return view('admin.clinics',compact('cli'));
  })->name('clitable')->middleware(AdminMw::class);


    
Route::get("/adminreports",function(){
  
  $cli = DB::select('SELECT * FROM `cli` ORDER By name');
  


  

    return view('admin.reports',compact('cli'));
  })->name('clitabler2')->middleware(AdminMw::class);

  

  Route::post("/adminreports",function(Request $request){
  
    
    $cli = DB::select('select * from reports where clinic_id = ? ORDER BY id DESC', [$request->clinic]);
    
  
      return view('admin.reports2',compact('cli'));
    })->name('clitabler')->middleware(AdminMw::class);
  

    Route::get("/searchcli",function(){
      return view("admin.sc");
      })->name('clitable222')->middleware(AdminMw::class);


      Route::post("/searchcli",function(Request $request){
        $cli = cli::where("name",$request->name)->get();
       if(!count($cli)){
        Session::flash('error','we did not find clinic by this name');
  
     return redirect()->back();
       }
       $id =  $cli[0]->id;
       return redirect("admincliview/$id");
        })->name('clitable2222')->middleware(AdminMw::class);




      Route::get("/searchuser",function(){
  
     
    
        return view("admin.su");
      })->name('cli33table222')->middleware(AdminMw::class);

      Route::post("/searchuser",function(Request $request){
        $cli = Patient::where("username",$request->name)->get();
     
        if(!count($cli)){
         Session::flash('error','we did not find patient by this name');
   
      return redirect()->back();
        }
        $id =  $cli[0]->id;
        return redirect("/admincliview2/$id");
      })->name('c1li33table222')->middleware(AdminMw::class);

  Route::get("/adminclidel/{id}",function($id){
  
    $cli = Cli::find($id)->delete();
    $doctor = Doctor::where("clinic_id",$id)->delete();
    $res = Receptionist::where("clinic_id",$id)->delete();
  
  
    Session::flash('success','Action was successful.');
  
    return redirect("/");
    })->name('adminclidel')->middleware(AdminMw::class);
  







    Route::get("/adminuserstable",function(){
  
      $cli = Patient::paginate(6);


  

    return view('admin.users',compact('cli'));
      })->name('adminclidel')->middleware(AdminMw::class);
    

Route::get("/editadmin",function(){
$patient = DB::select('select * from admin where id = ?', [session("adminid")]);        
       
$patient = $patient[0];
 return view('admin.edit',compact("patient"));
})->name('editadmin')->middleware(AdminMw::class);
    


Route::post("/editadmin",function(Request $request){
  $use = DB::update('UPDATE `admin` SET `username` = ?, `password` = ? WHERE `admin`.`id` = ?', [$request->username,$request->password,session("adminid")]);
  if ($use){
    Session::flash('success','Action was successful.');
  
    return redirect()->back();
  }else{
    Session::flash('error','an error occured.');
  
    return redirect()->back();
  }
  })->name('editadmin')->middleware(AdminMw::class);
      

        
      Route::get("/adminclidel2/{id}",function($id){
  
        $cli = Patient::find($id)->delete();
        
      
        Session::flash('success','Action was successful.');
      
        return redirect("/");
        })->name('adminclidel')->middleware(AdminMw::class);
      


        Route::get("/admincliview2/{id}",function($id){
          $cli = Patient::find($id);
          
          return view("admin.userview",compact('cli'));
        })->name('aadmincliview')->middleware(AdminMw::class);
        

        Route::get("/adminpendingcli2/{id}",function($id){
          $cli = Patient::find($id);
          $cli->pending = 1;
          $cli->save();
          Session::flash('success','Action was successful.');
            
          return redirect()->back();
          })->middleware(AdminMw::class);

          Route::get("/adminactivatecli2/{id}",function($id){
            $cli = Patient::find($id);
            $cli->pending = 0;
            $cli->save();
            Session::flash('success','Action was successful.');
              
            return redirect()->back();
            })->middleware(AdminMw::class);





Route::get("/admincliview/{id}",function($id){
  $cli = Cli::find($id);
  $doctor = Doctor::where("clinic_id",$id)->first();
  $count = $doctor;
  //return [$cli,$doctor];
  return view("admin.cliview",compact('cli','doctor','count'));
})->name('aadmincliview')->middleware(AdminMw::class);


Route::get("/adminpendingcli/{id}",function($id){
$cli = Cli::find($id);
$cli->pending = 1;
$cli->save();
Session::flash('success','Action was successful.');
  
return redirect()->back();
})->middleware(AdminMw::class);

Route::get("/adminactivatecli/{id}",function($id){
  $cli = Cli::find($id);
  $cli->pending = 0;
  $cli->save();
  DB::delete('delete  FROM reports where clinic_id = ?', [$id]);
  Session::flash('success','Action was successful.');
    
  return redirect()->back();
  })->middleware(AdminMw::class);
Route::get("/pending11",function(){
  Session::forget('userid');
  Session::forget('cliid');
  Session::forget('docid');
  Session::forget('resid');
  Session::forget('imagenet');
  Session::forget('adminid');
  return view("pending");

});
///////////////////////////admin///////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////user////////////////////////////////////////////////////////////////////////////
Route::get('/useredit3',function(){
  $patient = Patient::find(session('userid'));
    return view('users.edit2',compact('patient'));
  
});
Route::get('/userhome', function (Request $request) {

  $notifycount = DB::select('SELECT * FROM `notifications` WHERE seen = ? AND type=? AND patient_id =?', [0,"pat",session('userid')]);
  session()->put('usercount',  count($notifycount));
 
    $order = $request->input('order', 'rating');
    if($order === "rating"){
        //$doctors = Doctor::with('cli')->orderBy('rating','DESC')->paginate(3);
        $doctors = Doctor::with('cli')
                 ->selectRaw('doctors.*, rating / GREATEST(numofrating, 1) * LEAST(numofrating, 4) AS adjusted_rating')
                 ->orderBy('adjusted_rating', 'DESC')
                 ->paginate(3);

        return view("users.main",compact("doctors"));
    }elseif(strpos($order, "distance") === 0){
      $str = $order;

// Extract latitude and longitude values
$parts = explode("-", $str);
if(count($parts) < 2){
  $error = 'somethinge went wrong please try to refresh!!!';
  return view("redirect",compact('error'));
}
$lan = floatval($parts[1]);
$lon = floatval($parts[2]);


      $obj = Doctor::with('cli')
      ->whereHas('cli', function ($query) {
          $query->whereNotNull('lan');
      })
      ->get();

     
      


// Retrieve current location
// Retrieve current location

  $latitude = $lan;
  $longitude = $lon;
 

  $filteredObj = $obj ; // Convert to array only if $obj is not null
  $sortedObj = $obj->sortBy(function ($doctor) use ($latitude, $longitude) {
    $distance = calculateDistance($latitude, $longitude, $doctor->cli->lan, $doctor->cli->lon);
    return $distance;
  });
  

$doctors = $sortedObj;
      return view("users.main",compact("doctors"));
  }
   // $doctors =  Doctor::paginate(3);
   $doctors = Doctor::with('cli')->orderBy('id', $order)->paginate(3);
   //foreach($doctors as $doctor){
  //  return $doctor->cli->id;
  // }
    return view("users.main",compact("doctors"));
})->middleware(HomeMw::class);

Route::Post('/usersearch', [UserController::class,"search"])->middleware(HomeMw::class);
 

Route::get('/userdocpro/{id}', function ($id) {
   if(Doctor::findOrFail($id)){
    $record = DB::select('SELECT * FROM `rating` WHERE doctor_id = ? AND patient_id =?', [$id,session('userid')]);
    $bool = false;
    if( $record){
      $bool = $record[0]->rating;
    }
   $doc = Doctor::with('cli')->where("id",$id)->take(1)->get();
 
   return view("users.doc",compact("doc","bool"));
   }
 })->middleware(HomeMw::class)->name("user.docpro");


 Route::get('/userappoi/{id}', [UserController::class,"appoiments"])->middleware(HomeMw::class)->name("user.docappoi");

 
 Route::post('/userappoi', [UserController::class,"appoimentspre"])->middleware(HomeMw::class)->name("user.docappoi2");
 Route::get('/userappoiments', [UserController::class,"appoimentstable"])->middleware(HomeMw::class)->name("user.docappoiments");
 Route::get('userdelete/{id}', function ($id) {
  
  $clinicname = Patient::find(session('userid'))->name;
  $clinic_id =  Appoiment::find($id)->clinic_id;
  $date22 =  Appoiment::find($id)->date;
  $message = "user deleted his appoiment with you  his name is " . $clinicname . " for some reason and his appoument  was in ". $date22 ;
  DB::insert('INSERT INTO notifications ( seen, type, message, color, patient_id, clinic_id) VALUES ( ?,?, ?, ?, ?, ?)', [0, 'cli',$message,"red",session('userid'),$clinic_id]);

   $appoiment= Appoiment::find($id)->delete();
   $success = 'Action was successful';
   return view("redirect",compact('success'));
})->middleware(HomeMw::class);
Route::get('useredit/{id}', function ($id) {
    $editid = $id;
    $appoiment= Appoiment::findOrFail($id);
    $patient = Patient::find(session('userid'));
    
    if(!$appoiment){
        return redirect()->back();
    }
   
    return view("users.appoi",compact("editid","appoiment",'patient'));
 })->middleware(HomeMw::class);
 
 Route::get('/usereditprofile', function () {
    $patient = Patient::find(session('userid'));
  return view("users.edit",compact("patient"));
 })->middleware(HomeMw::class);

 Route::get('/userchat', function () {
    
  return view("users.chat");
 })->middleware(HomeMw::class);

 Route::get('/userecho', function () {
    
    return view("users.echo");
   })->middleware(HomeMw::class);


   Route::get('/report/{id}', function ($id) {
   $row = Precraption::where("clinic_id",$id)->where("patient_id",session("userid"))->get();
   $count = count($row);
    return view("users.report",compact('count','id'));
    
   })->middleware(HomeMw::class);
Route::post("/report",function(Request $request){
  
  $row2 = DB::select('select * from reports where clinic_id = ? AND patient_id = ?', [$request->hidden,session('userid')]);

  if(count($row2)){
   
    $error = 'you already report this clinic before';
    return view("redirect",compact('error'));
 
  }
  $row = DB::insert('INSERT INTO `reports` ( `clinic_id`, `patient_id`, `val`) VALUES (?,?,?)', [$request->hidden,session('userid'),$request->ch]);

  $success= 'Action was successful.';
  return view("redirect",compact('success'));
});


Route::get('/map/{id}', function ($id) {
  $row =  Cli::find($id);
$true = true;
$false = false;
  if($row->lan){
    return view("users.map",compact("true","row"));
  }else{
    return view("users.map",compact("false"));
  }
  $count = count($row);
  
   
  })->middleware(HomeMw::class);


 Route::post('/userupd', [UserController::class,"appupdate"])->middleware(HomeMw::class)->name("user.update");

 Route::post('/userupd2', [UserController::class,"userupdate"])->name("user-upd.post");
 Route::post('/userrate', [UserController::class,"rate"])->middleware(HomeMw::class)->name("user.rate");





 Route::get('/usernotify', function () {
  $notify = DB::select('SELECT * FROM `notifications` WHERE seen = ? AND type=? AND patient_id =? order by id DESC', [0,"pat",session('userid')]);
DB::update('UPDATE `notifications` SET seen = 1 WHERE patient_id = ? AND type = ?',[session('userid'),"pat"]);
$notifycount = count($notify);
$notify2 = DB::select('SELECT * FROM `notifications` WHERE seen = ? AND type=? AND patient_id =? order by id DESC', [0,"pat",session('userid')]);
$notifycount2 = count($notify2);
session()->put('usercount', $notifycount2 );
return view('users.notify',compact('notify','notifycount'));
})->middleware(HomeMw::class);


Route::post('/notifycount',function(Request $request){
  try {
    session_write_close();
    $notifycount = DB::select('SELECT * FROM `notifications` WHERE seen = ? AND type=? AND patient_id =? order by id DESC', [0, "pat", session('userid')]);

   $response =  response()->json(['success' => 'heello amssh shsajh', 'result' => count($notifycount)]);
   return Cache::remember('cacheKe2112', 10, function () use ($response) {
    return $response;
});
} catch (Exception $e) {
    // Log the error
    Log::error($e->getMessage());

    // Return a response indicating the error
    return response()->json(['error' => 'Internal server error'], 500);
}
});



Route::get('/appt', [UserController::class,"appt"])->middleware(HomeMw::class);
 //////////////////clinic//////////////////////////////////////////////////////////////////////
 Route::get('/clinichome', [CliController::class,"home"])->middleware(CliMw::class);


 Route::post('/clilog2', [CliController::class,"homepre"])->name('clilog2')->middleware(CliMw::class);






  Route::get('/doclogin', [CliController::class,"doclogin"])->middleware(CliMw::class);

  Route::post('/doclogin', [CliController::class,"doclogin2"])->middleware(CliMw::class)->name("doclogin.post");

  Route::get('/usermed', function () {
    $disease = DB::select("SELECT * FROM `prevdisease` where patient_id = ?",[session('userid')]);
    $disease2 = DB::select("SELECT * FROM `prevdiseasenotes` where patient_id = ?",[session('userid')]);
   
    
    return view('users.medical',compact('disease','disease2'));
   })->middleware(HomeMw::class);


   Route::post('/usermed2', function (Request $request) {
  
 
  $counter = count($request->all()) ;
 DB::delete('DELETE FROM prevdisease WHERE patient_id =?', [session('userid')]);
 
  for ($i=1; $i <=$counter ; $i++) { 
    $x = "disease" . "$i";
    if($request->$x){
  
   DB::insert('INSERT INTO prevdisease ( `disease`, `patient_id`) VALUES (?,?)', [$request->$x, session('userid')]);
  
    }
  
  }
  DB::delete('DELETE FROM prevdiseasenotes WHERE patient_id =?', [session('userid')]);
  DB::insert('INSERT INTO prevdiseasenotes ( `notes`, `patient_id`) VALUES (?,?)', [$request->note, session('userid')]);
  
  $success = 'Action was successful';
    return view("redirect",compact('success'));
    //return $request->all();
   })->middleware(HomeMw::class);
//////////////////doc///////////////////////////////

Route::get('/dochome', function () {
  $obj1 = new FuncCon;
  $obj1->profits1();
  $obj1->profits2();
    $doctor = Doctor::find(session('docid'));
    $rate = $doctor->numofrating == 0? 0 : $doctor->rating / $doctor->numofrating; 
    session()->put('docimg',$doctor->image);
    session()->put('docname',$doctor->username);
  $status = 0;
  $fun = new FuncCon;
  
 if( $fun->docmissing()){
   $status = 1;
 }
 /////////////here/////////////////////////////////
 $nameofcook ='docmis'. session('docid');
 $value = Cookie::get($nameofcook);

 if($value == session('docid')){
  $status = 0;
 }
///////////////////here///////////////////////////

//here to get appoiment of today

$today = Carbon::today()->toDateString('Y-m-d');

$appointments = Appoiment::with("patients")->where("clinic_id", session('cliid'))
    ->whereDate('date', '=', $today)
    ->orderBy('queue_num','asc')
    ->get();
   // return $appointments;
    $count =  count($appointments);

$cli =  Cli::find(session('cliid'));
$strday =  $cli->work_days;

$words = explode(' to ', strtolower($strday));

$capitalizedWords = array_map('ucfirst', $words);
$firstword =  $capitalizedWords[0];
$secword =  $capitalizedWords[1];

$weekdays = [
    'Sunday' => 0,
    'Monday' => 1,
    'Tuesday'=>2,
    'Wednesday'=>3,
    'Thursday'=>4,
    'Friday'=>5,
    'Saturday'=>6
];
$date = Carbon::parse('today');

$dayName = $date->format('l');
//return $weekdays[$firstword] . $weekdays[$secword] . $weekdays[$dayName] ;
if (($weekdays[$dayName] >= $weekdays[$firstword] && $weekdays[$dayName] <= $weekdays[$secword] )|| ($weekdays[$dayName] >= $weekdays[$secword] && $weekdays[$dayName] <= $weekdays[$firstword]) ||($weekdays[$secword] == $weekdays[$firstword]) ) {
  //check if user made appoiment this date
 // return 222;
 if( $count > 0){
 $appointment = $appointments[0];
 }else{
  $appointment = [];
 }
  return view("cli.dochome",compact('status','count','appointment','doctor','rate'));
}else{
  $count = -1;
  return view("cli.dochome",compact('status','count','appointments','doctor','rate'));
}


  
  
})->middleware(DocMw::class)->name("dochome");


Route::get('/docedit', function () {
    
 return 22222222222222221;
  
})->middleware(DocMw::class)->name("docedit");

Route::get('/docappoiments', function () {
  
  $appoiment = Appoiment::with('patients')->where("clinic_id",session('cliid'))->OrderBy('date','ASC')->paginate(2);

  return view('cli.docappoiments',compact('appoiment'));
   
 })->middleware(CliMw::class)->name("/ocappoiments");
 

 Route::get('/docappoiments2', function () {
  $today = Carbon::today()->format('Y-m-d');
  //return $today;
  $appoiment = Appoiment::with('patients')->where("clinic_id", session('cliid'))
  ->where('date', $today)  // Filter by today's date
  ->orderBy('date', 'ASC')
  ->paginate(2);
  
  return view('cli.docappoiments',compact('appoiment'));
   
 })->middleware(CliMw::class)->name("/ocappoiments2");
 Route::get('docdelete/{id}/{id2}', function ($id,$id2) {
  $clinicname = Cli::find(session('cliid'))->name;
  $message = "your appoimnet has been deleted by " . $clinicname . " for some reason" . "try to make other preservation";
  DB::insert('INSERT INTO notifications ( seen, type, message, color, patient_id, clinic_id) VALUES ( ?,?, ?, ?, ?, ?)', [0, 'pat',$message,"green",$id2,session('cliid')]);
 
  $appoiment= Appoiment::find($id)->delete();
  $success= 'Action was successful.';
  return view("redirect3",compact('success'));
})->middleware(CliMw::class);


Route::post('/your-route-to-set-cookie', [CliController::class,"setcookie1"])->name('user');


Route::post('/examination', function (Request $request) {
  $id =  $request->hid;
  $id2 =  $request->hid2;
  $app = Appoiment::find($request->hid2);
 
  $app->active = 1;
  $app->save();
    return view('cli.exam',compact('app','id','id2'));
});

Route::post('/examination2', function (Request $request) {
 // return $request->all();
  $val = $request->select;
 
  
  if($val == 1){
    $currentDate = Carbon::now();
    $currentDate = $currentDate->copy()->next(6)->format('Y-m-d');
    $patient = Appoiment::where('clinic_id', session('cliid'))->where('date',$currentDate)->orderBY('id','desc')->first();
   
  }elseif($val == 2){
    $currentDate = Carbon::now();
    $currentDate = $currentDate->copy()->next(6)->next(6)->next(6)->format('Y-m-d');
    $patient = Appoiment::where('clinic_id', session('cliid'))->where('date',$currentDate)->orderBY('id','desc')->first();
   
  }elseif($val == 3){
    $currentDate = Carbon::now();
    $currentDate = $currentDate->copy()->next(6)->next(6)->next(6)->next(6)->next(6)->format('Y-m-d');
    $patient = Appoiment::where('clinic_id', session('cliid'))->where('date',$currentDate)->orderBY('id','desc')->first();
    
  }
  elseif($val == 4){
    $currentDate = Carbon::now();
    $currentDate = $currentDate->copy()->next(6)->next(6)->next(6)->next(6)->next(6)->next(6)->next(6)->format('Y-m-d');
    $patient = Appoiment::where('clinic_id', session('cliid'))->where('date',$currentDate)->orderBY('id','desc')->first();
    
  }
  

if($val != 0){
if($patient != null){
$queuenum = $patient->queue_num;

}else{
$queuenum = 0;
}

 $appoiment = new Appoiment;
   $appoiment->clinic_id = session('cliid');
   $appoiment->patient_id = $request->hid;
   $appoiment->date = $currentDate;
   $appoiment->queue_num = $queuenum +1;
   $appoiment->payment_status = 1;
   $appoiment->status = 0;
   $appoiment->revisit = 1;
   $appoiment->save();
}
  $cli = Cli::find(session('cliid'));
  $firstprice = $cli->price;
  $secprice = $cli->price2;

  $app = Appoiment::find($request->hid2);
  if($app->status == 0){
  if($app->revisit == 0){
    $price = $firstprice;
  }else{
    $price = $secprice;
  }

}elseif($app->status == 1){
  $price = $firstprice + $secprice;
}else{
  $price = ($firstprice + $secprice) * 2;
}
  $profit = new Profit;
  $profit->patient_id =  $request->hid;
  $profit->doctor_id =  session('docid');
  $profit->amount =  $price;
 $profit->save();
  $appoiment= Appoiment::find($request->hid2)->delete();
  if($request->hid !== '00'   ){
  $precription = new Precraption;
  $precription->desc2 = $request->note;
  $precription->notes = $request->pre;
  $precription->patient_id = $request->hid;
  $precription->clinic_id = session('cliid');
  $precription->doctor_id = session('docid');
  $precription->save();
  }
  
  return  redirect('/dochome');;
});


Route::get("/docpatients",function(){
  $pats = Precraption::with('patients')
    ->select('patient_id') // Specify the column for uniqueness
    ->where('doctor_id',session('docid'))
    ->distinct()->orderBy("id",'desc')->get();

   
 

return view("cli.docpat",compact("pats"));
});






Route::get('/viewinfo/{id}', [CliController::class,"viewinfo"])->middleware(CliMw::class);


Route::get('/profits', [CliController::class,"profits"])->middleware(DocMw::class);

Route::get('/doceditprofile', function () {
  $patient = Doctor::find(session('docid'));
return view("cli.edit",compact("patient"));
})->middleware(DocMw::class);


Route::get('/clieditprofile', function () {
  $patient = Cli::find(session('cliid'));
return view("cli.edit2",compact("patient"));
})->middleware(DocMw::class);

Route::post('/docupdate', [CliController::class,"docupdate"])->middleware(DocMw::class);
Route::post('/cliupdate', [CliController::class,"cliupdate"])->middleware(DocMw::class);





Route::get("/docchat",function(){
  // Close the session early
  session_write_close();

  session()->put('counter',0);
  return view('cli.chat');
  })->middleware(DocMw::class);




Route::get('/climap', function () {
    return view("cli.map");
});



Route::post("/cliupdate2002",function(Request $request){
  $patient = Cli::find(session("cliid"));
  if($request->lan != "c" && $request->lon != "c"){
    $patient->lan = $request->lan;
    $patient->lon = $request->lon;
    $patient->save();
}
Session::flash('success','Action was successful.');
return redirect()->back();
});








/////////////////////////////////////////receptpionist////////////////////////////////////////////////////////////////////////////


Route::get('/reslog', function () {
    return view('reslog');
});


Route::post('/reslog', function (Request $request) {
  $docs =  Receptionist::where("clinic_id",session('cliid'))->get();
 
  $usernames = [];
//get all usernames
foreach ($docs as $key => $value) {
 
  $usernames[] = $value->username2;
}


//  return in_array($request->username,$usernames);
  if(!in_array($request->username,$usernames)){
      return  redirect()->back()->withErrors("wrong username")->withInput();
  }

  $val = DB::select('SELECT * FROM `receptionist` WHERE username2 = ?', [$request->username]);
  if(count($val)){
      $password = $val[0]->password;
      $id = $val[0]->id;
     
      if (Hash::check($request->password, $password)) {
        
      session()->put('resid', $id);
      session()->put('resname', $request->username);
     return redirect()->intended('/reshome');

      } else {
          
          return redirect()->back()->withErrors("password is wrong")->withInput();
      }
  }
  
})->name('reslog.post')->middleware(CliMw::class);



Route::post('/your-route-to-set-cookie2', [CliController::class,"setcookie2"])->name('user');

Route::get('/reshome', function () {
 
  session()->put("resi",0);
  $status = 0;
  $fun = new FuncCon;
  
 if( $fun->docmissing2()){
   $status = 1;
 }
 /////////////here/////////////////////////////////
 $nameofcook ='resmis'. session('resid');
 $value = Cookie::get($nameofcook);

 if($value == session('resid')){
  $status = 0;
 }
 $res =  Receptionist::find(session('resid'));
    return  view('res.main',compact('status','res'));
})->middleware(ResMw::class);




Route::get('/resedit', function () {
  $patient = Receptionist::where('clinic_id', session('cliid'))->first();
    if(session()->has('resid')){
    return view('res.resedit',compact('patient'));
    }else{
      return view('cli.resedit',compact('patient'));
    }
})->middleware(CliMw::class);
Route::post('/resupdate', [CliController::class,"resupdate"])->middleware(CliMw::class);



Route::get('/resappoiments', function () {
  $appoiment = Appoiment::with('patients')->where("clinic_id",session('cliid'))->OrderBy('date','ASC')->paginate(2);

  return view('res.docappoiments',compact('appoiment'));
   
 })->middleware(CliMw::class)->name("/resappoiments");
 

 Route::get('/resappoiments2', function () {
  $today = Carbon::today()->format('Y-m-d');
  //return $today;
  $appoiment = Appoiment::with('patients')->where("clinic_id", session('cliid'))
  ->where('date', $today)  // Filter by today's date
  ->orderBy('date', 'ASC')
  ->paginate(2);
  
  return view('res.docappoiments',compact('appoiment'));
   
 })->middleware(CliMw::class)->name("/resappoiments2");



 Route::get('resdelete/{id}/{id2}', function ($id,$id2) {
  $clinicname = Cli::find(session('cliid'))->name;
  $message = "your appoimnet has been delleted  " . $clinicname . " for some reason" . "try to make other preservation";
  DB::insert('INSERT INTO notifications ( seen, type, message, color, patient_id, clinic_id) VALUES ( ?,?, ?, ?, ?, ?)', [0, 'pat',$message,"green",$id2,session('cliid')]);
 
  $appoiment= Appoiment::find($id)->delete();
  $success= 'Action was successful.';
        return view("redirect2",compact('success'));
})->middleware(CliMw::class);


Route::get('/viewinfo2/{id}', [CliController::class,"viewinfo2"])->middleware(CliMw::class);


Route::get('/addguest', function () {

 
 return view('res.addguest');
})->middleware(CliMw::class);
Route::post('/addguest2', function (Request $request) {
  $currentDate = Carbon::now()->format('Y-m-d');
  
  $patient = Appoiment::where('clinic_id', session('cliid'))->where('date',$currentDate)->orderBY('queue_num','desc')->first();
  if($patient == null){
    $queuenum =1;
  }else{
  $queuenum = $patient->queue_num + 1 ;
  }
  if( $request->cond == 0){
    
 
   $appoiment = new Appoiment;
   $appoiment->clinic_id = session('cliid');
   $appoiment->patient_id = 0;
   $appoiment->name = $request->name;
   $appoiment->date = $currentDate;
   $appoiment->queue_num = $queuenum;
   $appoiment->payment_status = 1;
   $appoiment->status = 1;
   $appoiment->save();

 
   $success= 'Action was successful.';
   return view("redirect2",compact('success'));
  }else{
  //  $patient2 = Appoiment::where('clinic_id', session('cliid'))->where('date',$currentDate)->where('active',0)->orderBY('queue_num','asc')->first();
   // return $patient2;
   $patient2 = Appoiment::where('clinic_id', session('cliid'))->where('date',$currentDate)->where('active',1)->orderBY('queue_num','asc')->first();
   // return $patient2;
   if($patient2 == null){
    $queuenum2 =1;
  }else{
  $queuenum2 = $patient2->queue_num + 1 ;
  }
   
 
    $appoiment = new Appoiment;
    $appoiment->clinic_id = session('cliid');
    $appoiment->patient_id = 0;
    $appoiment->name = $request->name;
    $appoiment->date = $currentDate;
    $appoiment->queue_num = $queuenum2;
    $appoiment->payment_status = 1;
    $appoiment->status = 2;
    $appoiment->save();
    $updtaed =DB::update("UPDATE appoiments SET queue_num = queue_num + 1 WHERE clinic_id = ? AND queue_num >= ? AND date = ? AND status != 2", [session('cliid'),$queuenum2,$currentDate]); //UPDATE appoiments SET queue_num = queue_num + 1 WHERE clinic_id = 55 AND queue_num >= 4 AND date = '2024-4-4';
    

    $success= 'Action was successful.';
    
    return view("redirect2",compact('success'));


  }
 
 })->middleware(CliMw::class);





Route::post("/reshome2",function(Request $request){
  try {
  // Close the session early
  session_write_close();

  $today = Carbon::today()->toDateString('Y-m-d');
  $appointments = Appoiment::with("patients")->where("clinic_id", session('cliid'))
  ->whereDate('date', '=', $today)
  ->orderBy('queue_num','asc')
  ->get();
  $app = Appoiment::where("clinic_id", session('cliid'))->whereDate('date', '=', $today)->first();
 
  if(!count($appointments)){
    return response()->json(['success'=>false,'result'=>'no']); 
  }else{
    //if($app->id != session()->get("resi") || $app->active){
     // session()->put("resi",$app->id);
      return response()->json(['success'=>true,'result'=>$appointments]); 
 //   }else{
      
    //  return response()->json(['success'=>true,'result'=>"neu",'id' => session()->get("resi")]); 
    }
 // return response()->json(['success'=>false,'result'=>'$appoiment','id' => session()->get("resi")]);
//   
//  }
 
  $count =  count($appointments);
} catch (Exception $e) {
  // Log the error
  Log::error($e->getMessage());

  // Return a response indicating the error
  return response()->json(['error' => 'Internal server error'], 500);
}
});




Route::get('/endofqueue/{id}/{id2}', function ($id,$id2) {

  
  $clinicname = Cli::find(session('cliid'))->name;
  $message = "your appoimnet has been moved to the end of the queue of today sechedile because you were late  " . $clinicname ;
  DB::insert('INSERT INTO notifications ( seen, type, message, color, patient_id, clinic_id) VALUES ( ?,?, ?, ?, ?, ?)', [0, 'pat',$message,"green",$id2,session('cliid')]);
 

  $currentDate = Carbon::now()->format('Y-m-d');
  
  $patient = Appoiment::where('clinic_id', session('cliid'))->where('date',$currentDate)->orderBY('queue_num','desc')->first();
  if($patient == null){
    $queuenum =1;
  }else{
  $queuenum = $patient->queue_num + 1 ;
  }
  $app = Appoiment::find($id);
   $app->queue_num = $queuenum;
   $app->save();
   return back();
});




Route::get('appedit/{id}', function ($id) {
  $editid = $id;
  $appoiment= Appoiment::findOrFail($id);
 // return $appoiment;
  if(!$appoiment){
      return redirect()->back();
  }
 
  return view("res.appoi",compact("editid","appoiment"));
})->middleware(ResMw::class);




Route::post('/resappupdate',[CliController::class,"resappupd"])->name('resapp.update')->middleware(ResMw::class);





Route::get('/resnotify', function () {
  $notify = DB::select('SELECT message,created_at FROM `notifications` WHERE seen = ? AND type=? AND clinic_id =? order by id DESC', [0,"cli",session('cliid')]);
DB::update('UPDATE `notifications` SET seen = 1 WHERE clinic_id =? AND type = ?',[session('cliid'),"cli"]);
$notifycount = count($notify);
$notify2 = DB::select('SELECT message,created_at FROM `notifications` WHERE seen = ? AND type=? AND clinic_id =?', [0,"cli",session('cliid')]);
$notifycount2 = count($notify2);
session()->put('rescount', $notifycount2 );
return view('res.notify',compact('notify','notifycount'));
})->middleware(ResMw::class);


Route::post('/notifycount2',function(Request $request){
    // Close the session early
    session_write_close();
  $notifycount = DB::select('SELECT message FROM `notifications` WHERE seen = ? AND type=? AND clinic_id =? order by id DESC', [0,"cli",session('cliid')]);
  
  return response()->json(['success'=>"heello amssh shsajh",'result'=> count($notifycount)]); 
});



Route::post('/chatcount',function(Request $request){
  // Close the session early
  session_write_close();

  $type = intval($request->val);
  $notifycount = DB::select('SELECT message FROM `chat` WHERE seen = ? AND type=? AND clinic_id =? order by id DESC', [0,$type,session('cliid')]);
  
  return response()->json(['success'=>"heello amssh shsajh",'result'=> count($notifycount)])->header('Access-Control-Allow-Origin', 'http://yousef-clinic.lovestoblog.com')
    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
    ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Requested-With'); 
})->middleware(CliMw::class);




Route::post('/chat',function(Request $request){
  // Close the session early
  session_write_close();

  $type = intval($request->val);
  $chats = DB::select('SELECT message,type FROM `chat` WHERE clinic_id = ? AND created_at = CURDATE()', [session('cliid')]);
  $count = count($chats);
  

 
  if(!intval($request->val)){
  $chats2 = DB::update('UPDATE `chat` SET seen = 1 WHERE clinic_id = ? AND type != ?', [session('cliid'),1]);
  }else{
    DB::table('chat')
  ->where('clinic_id', session('cliid'))
  ->where('type', 1)
  ->update(['seen' => 1]);
  }
  if($count == session('chatcount') && !isset($request->first) ){
  //  return response()->json(['success'=>"heello amssh shsajh",'status'=>false,'counter'=>session('counter'),'count'=>session('chatcount')]);
  return response()->json(['status'=>false]);  
  }else{
  
  session()->put('chatcount',$count);
  return response()->json(['status'=>true,'result'=> $chats]); 
  //return response()->json(['success'=>"heello amssh shsajh",'status'=>true,'counter'=>session('counter'),'result'=> $chats,'count'=>session('chatcount')]); 
  }
 
})->middleware(CliMw::class);


Route::post('/chatupdate',function(Request $request){
  
  // Close the session early
  session_write_close();

  $type = intval($request->val);
  $chats = DB::update('UPDATE `chat` SET seen = 1 WHERE clinic_id = ? AND type =?', [session('cliid'),$type]);
  
  return response()->json(['success'=>"heello amssh shsajh",'result'=> 'kkkk']); 
})->middleware(CliMw::class);


Route::post('/chatinsert',function(Request $request){
  // Close the session early
  session_write_close();

  $type = intval($request->val);
  if($request->message){
  $chats = DB::insert('INSERT INTO `chat` (  `type`, `clinic_id`, `message`) VALUES (?,?,?)', [$type,session('cliid'),$request->message]);
  }
  return response()->json(['success'=>"heello amssh shsajh",'result'=> 'inseted']); 
})->middleware(CliMw::class);

Route::get("/reschat",function(){
 session()->put('counter',0);
return view('res.chat');
})->middleware(CliMw::class);
Route::post('/delayall',function(Request $request){
  $obj1 = new FuncCon;
  $x= $obj1->clidelay();
  if($x){
    Session::flash('success',"action was successful");
    return Redirect::back();
  }else{
    Session::flash('error',"somethinge went wrong");
    return Redirect::back();
  }
})->middleware(ResMw::class);
/////////////////////////////testing////////////////////////////////////////////////////////////////////////////
Route::get("/logout",function(){
    Session::forget('userid');
    Session::forget('cliid');
    Session::forget('docid');
    Session::forget('resid');
    Session::forget('imagenet');
    Session::forget('adminid');
    Session::forget('chatcount');
    Session::forget('resi');

    
    return  redirect('/');
});

Route::get("/log",function(Request $request){
 // Generate a random number between 1000 and 9999
 $number = rand(1000, 9999);

 // Convert the number to a string and prepend zeros if needed
 return str_pad($number, 4, '0', STR_PAD_LEFT);
/*
$searchTerm = "cli4";
$maxDistance = 4;



$doctors = Doctor::with('cli')
    ->where(function ($query) use ($searchTerm, $maxDistance) {
        $query->where('username', 'like', "%$searchTerm%")
            ->orWhereHas('cli', function ($query) use ($searchTerm, $maxDistance) {
                $query->where(function ($query) use ($searchTerm, $maxDistance) {
                    $query->where(function ($query) use ($searchTerm, $maxDistance) {
                        $query->whereRaw("LEVENSHTEIN(name, '$searchTerm') <= $maxDistance");
                    })->orWhere(function ($query) use ($searchTerm, $maxDistance) {
                        $query->whereRaw("LEVENSHTEIN(city, '$searchTerm') <= $maxDistance");
                    });
                });
            });
    })
    ->get();
});

Route::post("/log",function(){
    return "<div> kdakd;lad</div>";
    */
});

Route::get('/sendsms', function (Request $request) {
  $obj = [
    [
        'lan' => 40.593855,
        'lon' => 40.593855,
        'id' => 1
    ],
    [
        'lan' => 20.593855,
        'lon' => 20.593855,
        'id' => 2
    ],
    [
        'lan' => 30.593855,
        'lon' => 303.593855,
        'id' => 3
    ],
    [
        'lan' => 30.593855,
        'lon' => 30.593855,
        'id' => 4
    ],
    [
        'lan' => null,
        'lon' => null,
        'id' => 5
    ]
];

// Remove elements with null values
$filteredObj = array_filter($obj, function ($item) {
    return $item['lan'] !== null && $item['lon'] !== null;
});



// Retrieve current location
// Retrieve current location
$location = Location::get();
return $location;
if ($location) {
    $latitude = $location->latitude;
    $longitude = $location->longitude;
    return [$latitude,$longitude];
}


// Sort the 'filteredObj' array based on distance from current location
usort($filteredObj, function ($a, $b) use ($latitude, $longitude) {
    $distanceA = calculateDistance($latitude, $longitude, $a['lan'], $a['lon']);
    $distanceB = calculateDistance($latitude, $longitude, $b['lan'], $b['lon']);
    return $distanceA - $distanceB;
});

// Add elements with null values back to the sorted array
$sortedObj = array_merge($filteredObj, array_filter($obj, function ($item) {
    return $item['lan'] === null || $item['lon'] === null;
}));

// Display the sorted array with null values
dd($sortedObj);
});

function calculateDistance($lat1, $lon1, $lat2, $lon2)
{
    $R = 6371; // Radius of the earth in km
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);
    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $R * $c; // Distance in km
    return $distance;
}
/*

This function calculates the distance between two points on the Earth's surface using their latitude and longitude coordinates. Here's a simplified explanation:

1. It starts by defining the radius of the Earth.
2. Then, it calculates the difference in latitude and longitude between the two points.
3. It converts the latitude and longitude differences from degrees to radians.
4. Using these values, it calculates intermediate values for the distance calculation.
5. It uses the intermediate values to compute the final distance between the two points.
6. Finally, it returns the calculated distance in kilometers.

So, if you provide the latitude and longitude coordinates of two points to this function, it will give you the distance between them in kilometers.
*/