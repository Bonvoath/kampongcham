<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class BuyerController extends Controller
{
    public function index(Request $r) {
        // check if buyer login
        $buyer = $r->session()->get('customer');
        if($buyer==NULL)
        {
            return redirect('/buyer/login');
        }
        return view('fronts.buyers.index');
    }
     // load edit profile form
     public function edit(Request $r)
     {
         $buyer = $r->session()->get('customer');
         if($buyer==NULL)
         {
             return redirect('/buyer/login');
         }
         $data['buyer'] = DB::table('customers')->where('id', session('customer')->id)->first();
         return view('fronts.buyers.edit_profile', $data);
     }

    // update buyer profile
    public function update(Request $r)
    {
        $data = [
            'first_name' => $r->first_name,
            'last_name' => $r->last_name,
            'phone' => $r->phone,
            'email' => $r->email,
        ];
        $count_email = DB::table('customers')->where('id', "!=", $r->id)
            ->where('email', $r->email)
            ->count();
        if($count_email>0)
        {
            $r->session()->flash('sms1', "The email '{$r->email}' already exist. Change a new one!");
            return redirect('/buyer/profile/edit');
        }

        $i = DB::table('customers')->where('id', $r->id)->update($data);
        if($i)
        {
            $r->session()->flash('sms', "Your profile has been saved successfully!");
            // save user to session
            $user = DB::table('customers')->where('id', $r->id)->first();
            $r->session()->put('customer', $user);
            return redirect('/buyer/profile');
        }
        else{
            $r->session()->flash('sms1', "Fail to save changes. You may not make any changes in your input!");
            return redirect('/buyer/profile/edit');
        }
    }
 
    //login form
    public function login()
    {
        return view('fronts.buyers.login');
    }

    // customer login
    public function is_login(Request $r)
    {
        $email = $r->email;
        $pass = $r->pass;
        $user = DB::table('customers')->where('active',1)->where('email', $email)->first();

        if($user!=null)
        { 
            if(password_verify($pass, $user->password))
            {
                if($r->session()->get('customer')!=NULL)
                {
                    $r->session()->forget('customer');
                    $r->session()->flush();
                }
                if ($r->session()->get('shop_owner')!=NULL)
                {
                    $r->session()->forget('customer');
                    $r->session()->flush();
                }
                // save user to session
                $r->session()->put('customer', $user);
                return redirect('/');
            }
            else{
                $r->session()->flash('sms1', "Invalid email or password. Try again!");
                return redirect('/buyer/login')->withInput();
            }
        }
        else{
            $r->session()->flash('sms1', "Invalid email or password!");
            return redirect('/buyer/login')->withInput();
        }
    }

    // logout function
    public function logout(Request $request)
    {
        $request->session()->forget('customer');
        $request->session()->flush();
        return redirect('/');
    }

    //login form
    public function register()
    {
        return view('fronts.buyers.register');
    }

     // save new customer
     public function save(Request $r)
     {
        // check the email if it is valid or not
        if (!filter_var($r->email, FILTER_VALIDATE_EMAIL)) {
            $r->session()->flash('sms1', "Your email is invalid. Check it again!");
            return redirect('/buyer/register')->withInput();
        }
        $email = DB::table('customers')
            ->where('email', $r->email)
            ->where('active', 1)
            ->count();
        if($email === 0) {
            $data = array(
                'first_name' => $r->first_name,
                'last_name' => $r->last_name,
                'email' => $r->email,
                'phone' => $r->phone,
                'password' => password_hash($r->password, PASSWORD_BCRYPT)
            );
            $sms = "You have registered successfully. Please Login!";
            $sms1 = "Cannot register your account. Please check inputs again!";
            $i = DB::table('customers')->insert($data);
            if ($i)
            {
                $r->session()->flash('sms', $sms);
                return redirect('/buyer/register');
            }
            else
            {
                $r->session()->flash('sms1', $sms1);
                return redirect('/buyer/register')->withInput();
            }
        } else {
            if ($email > 0) {
                $sms1 = "Your email already exist. Please use a different one!";
            } 
            $r->session()->flash('sms1', $sms1);
            return redirect('/buyer/register')->withInput();
        } 
    }

    //login form
    public function buyer()
    {
        return view('fronts.buyers.buyer');
    }
}
