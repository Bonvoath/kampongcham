<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;
use App\Http\Controllers\Right;
class BuyerForgetPasswordController extends Controller
{
    // load form forget password
    public function index() {
        return view('fronts.buyers.forget_password');
    }

    // reset password for buyer
    public function reset_password(Request $r)
    {
        $buyer_email = $r->email;
        // check if email exist
        $result = DB::table("customers")->where("email", $buyer_email)->first();

        if ($result!=null)
        {
            $id = md5($result->id);
            $i = Right::send_email_buyer($buyer_email, $id);
            // update recovery mode for shop owern
            DB::select("update customers set recovery_mode=1 where md5(id)='{$id}'");
            if($i) {
                $r->session()->flash("sms", "Please check your email :)");
            }
            return view("fronts.buyers.forget_password");
        }
        else{
            $r->session()->flash("sms1", "Your email does not exist in our Phsa24!");
            return redirect('/buyer/forget-password')->withInput();
        }
    }

    // save new password
    public function save_password(Request $r)
    {
        $buyer = $r->session()->get('buyer');
        if($seeker==NULL)
        {
            return redirect('/buyer/login');
        }
        $buyer_id = session('buyer')->id;
        $data = [
            'password' => password_hash($r->password, PASSWORD_BCRYPT)
        ];
        if($r->password!=$r->confirm_password)
        {
            $r->session()->flash('sms1', "Your new password and confirm password is not match!, Cannot reset your password!");
            return redirect('/buyer/reset-password');
        } 
        $i = DB::table('customers')->where('id', $buyer_id)->update($data);
        if($i)
        {
            $r->session()->flash('sms', "Your new password has been saved successfully!");
            return redirect('/buyer/reset-password');
        }
        else{
             $r->session()->flash('sms1', "Cannot reset your password!");
            return redirect('/buyer/reset-password');
        }
    }
    // load new password form for job seeker
    public function new_password($id)
    {
        $data['id'] = $id;
        return view("fronts.buyers.new_password", $data);
    }

    public function update_password(Request $r)
    {
        $pass = password_hash($r->password, PASSWORD_BCRYPT);
        DB::select("update customers set password='{$pass}', recovery_mode=0 where md5(id)='{$r->id}' and recovery_mode=1");
        $r->session()->flash("sms", "You just reset your password. Please login with your new password.");
        return redirect('/buyer/login');
    }
}
