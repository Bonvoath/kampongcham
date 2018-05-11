<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
class AdminContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()==null)
            {
                return redirect("/login");
            }
            return $next($request);
        });
    }
    // index
    public function index()
    {
        $data['contacts'] = DB::table('contacts')
            ->join('contact_types', 'contacts.contact_type_id', '=', 'contact_types.id')
            ->select('contacts.*', 'contact_types.name as contact_type_id')
            ->orderBy('contacts.id', 'desc')
            ->where('contacts.active', 1)
            ->paginate(18);
        return view('contacts.index', $data);
    }
    // load create form
    public function create()
    {
        $data['contact_types'] = DB::table('contact_types')->where('active', 1)->get();

        return view('contacts.create', $data);
    }
    // save new page
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'contact_type_id' => $r->contact_type,
            'job' => $r->job,
            'phone' => $r->phone,
            'email' => $r->email,
        );
        $sms = "The new contact has been created successfully.";
        $sms1 = "Fail to create the new contact, please check again!";
        $i = DB::table('contacts')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/contact/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/contact/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('contacts')->where('id', $id)->update(['active'=>0]);

        return redirect('/admin/contact');
    }

    public function edit($id)
    {
        $data['contact_types'] = DB::table('contact_types')->where('active',1)->get();

        $data['contact'] = DB::table('contacts')
            ->where('id',$id)->first();
        return view('contacts.edit', $data);
    }

    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'contact_type_id' => $r->contact_type,
            'job' => $r->job,
            'phone' => $r->phone,
            'email' => $r->email,
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('contacts')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/contact/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/contact/edit/'.$r->id);
        }
    }
}

