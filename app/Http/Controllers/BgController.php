<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;
use Session;
class BgController extends Controller
{
    function signup(){
        return view('signup');
    }
    function index(){
        return view('index');
    }
    function login(){
        return view('login');
    }
    function donor(){
        return view('donor');
    }
    function deshboard(){
        $email = session('email');
        $dr=DB::table('sd_req')
         ->leftjoin('b_bank', 'sd_req.did', '=', 'b_bank.id')
         ->where('email','=',$email)
         ->where('status','=',null)
        ->get();

        return view('deshboard',compact('dr'));
        
     }
    function donor_list(Request $req){
        $email = $req->session()->get('email');
   
$current = Carbon::now();

// add 30 days to the current time
$trialExpires = $current->subDays(90);
        //dd($trialExpires);
        $loc = $req->loc;
        $bg = $req->bg;
       // echo $bg;
        $donors = DB::table('b_bank')
        ->where('address', 'LIKE', '%'.$loc.'%')
        ->where('bg','=',$bg)
        ->where('l_donate','<',$trialExpires)
        ->where('active','=',true)
        ->where('email', '!=', $email)
        ->get();
      // dd($req->edate);
       $req->session()->put('loc', $loc);
       $req->session()->put('etime', $req->etime);
       $req->session()->put('edate', $req->edate);
        return view('donor_list',compact('donors'));
    }
    function store(Request $req){
        $validated = $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:b_bank,email',
            'contact' => 'required|unique:b_bank,contact|digits:11',
            'birthdate' => 'required|date|before:2005-01-01',
            'bg' => 'required|in:A+,B+,O+,AB+,AB-,A-,B-,O-',
            'gender' => 'required|in:male,female,other',
            'password' => 'required|min:6|',
            'password_confirm' => 'required|same:password' ,
            'l_donate' => 'required|date|before:tomorrow',
            'loc' => 'required'
        ]);
        $name=$req->name;
        $email=$req->email;
        $contact=$req->contact;
        $birthdate=$req->birthdate;
        $bg=$req->bg;
        $active=$req->active;
        $gender=$req->gender;
        $password=$req->password;
        $l_donate = $req->l_donate;
        $loc = $req->loc;
        DB::table('b_bank')->insert([
            'name' => $name,
            'contact'  =>   $contact,
            'email' =>$email,
            'birthdate'=>$birthdate,
            'password' =>$password,
            'bg' =>$bg,
            'gender'=>$gender,
            'l_donate' =>$l_donate,
            'active'=>$active,
            'address'=>$loc
            
              
        ]);
        return redirect('/login');
    }
   
    function send_store($id,Request $req){
        $email = session('email');
        $loc = session('loc');
        $date = session('edate');
        $etime = session('etime');
        $pd = DB::table('b_bank')
        ->where('email', '=', $email)
        ->first();
        //dd($pd);
        $pid = $pd->id;
        $contact = $pd->contact;
        $gender = $pd->gender;
        $sd = DB::table('sd_req')
        ->insert([
            'did'=>$id,
            'pid' => $pid,
            'loc'  =>   $loc,
            'p_contact'=>$contact,
            'p_gender'=>$gender,
            'edate'=>$date,
            'etime'=>$etime
        ]);
        return redirect()->back()->with('msg','Request Sent! Please Wait for the donor for accept it.');
    }
    function ac_store($id,Request $req){
    
        $sd = DB::table('sd_req')
        ->select('p_contact')
        ->where('did', $id)
        ->first();
        $contact = $sd->p_contact;
        $current = Carbon::now();
        $sq = DB::table('sd_req')->leftjoin('b_bank','b_bank.id','=','sd_req.did')
        ->where('p_contact', '=' ,$contact)
        ->update([
            'status'=>'accepted',
            'l_donate'=>$current
        ]);
        return redirect()->back()->with('msg','Got it! Thanks for donating blood!');
    }
    function send_request($id){
       $dr=DB::table('b_bank')->where('id','=',$id)
       ->first();
       return view('send-request',compact('dr'));
       
    }
    function ac_request($id){
        $dr=DB::table('sd_req')->where('did','=',$id)
        ->first();
        return view('ac-request',compact('dr'));
        
     }
    function login_store(Request $request){
        $email  = $request->email;
        $password = $request->password;
        $user = DB::table('b_bank')
        ->where('email','=',$email)
        ->where('password','=',$password)
        ->first();
        
       
        if(!$user){
            $admin = DB::table('admin')
            ->where('email','=',$email)
            ->where('password','=',$password)
            ->first();
            if(!$admin){
                return redirect()->back()->with('err-msg','Invalid Email or Password!');
            }
            else{
                $request->session()->put('email', $email);
             
              return redirect()->to('/admin-deshboard');
            }
           
        }
        //$request->session()->put('name', $request->name);
        
        $request->session()->put('email', $email);
        return redirect()->to('/deshboard');


    }
    function dhistory(){
        $email = session('email');
        $ur=DB::table('b_bank')->where('email','=',$email)
        ->first();
        return view('donation_hist',compact('ur'));
    }
    function signout(){
        Session::flush();
        return redirect('/login');
    }
    function admin(){
        $cm = DB::table('b_bank')->get();
        return view('admin/deshboard',compact('cm'));
       
    }
    function edit($id){
        $emp = DB::table('b_bank')
            ->where('id', '=', $id)
            ->first();
        return view('admin/edit-e',compact('emp'));
    }
    function update(Request $req,$id){
        $name=$req->name;
        $email=$req->email;
        $contact=$req->contact;
        $birthdate=$req->birthdate;
        $bg=$req->bg;
        $active=$req->active;
        $gender=$req->gender;
        $password=$req->password;
        $l_donate = $req->l_donate;
        $address = $req->address;
        DB::table('b_bank')
        ->where('id', $id)
    ->update([
        'name' => $name,
        'contact'  =>   $contact,
        'email' =>$email,
        'birthdate'=>$birthdate,
        'password' =>$password,
        'bg' =>$bg,
        'gender'=>$gender,
        'l_donate' =>$l_donate,
        'active'=>$active,
        'address'=>$address
    ]
    );
    return redirect()->back()->with('msg','Updated Successfully!');
    }
    function delete($id){
        DB::table('b_bank')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','Deleted Successfully!');
    }
}
