<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
class ContactTypeController extends Controller
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
        $data['contact_types'] = DB::table('contact_types')
            ->orderBy('id', 'desc')
            ->where('active', 1)
            ->paginate(18);
        return view('contact-types.index', $data);
    }
    // load create form
    public function create()
    {
        $data['contact_types'] = DB::table('contact_types')->where('active', 1)->get();
        return view('contact-types.create', $data);
    }
    // save new page
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'use_job' => ($r->use_job == NULL?0:1)
        );
        $sms = "The new contact type has been created successfully.";
        $sms1 = "Fail to create the new contact type, please check again!";
        $i = DB::table('contact_types')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/contact/type/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/contact/typecreate')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('contact_types')->where('id', $id)->update(['active'=>0]);
        return redirect('/contact/type');
    }

    public function edit($id)
    {
        $data['contact_type'] = DB::table('contact_types')
            ->where('id', $id)->first();
        return view('contact-types.edit', $data);
    }

    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'use_job' => ($r->use_job == NULL?0:1)
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('contact_types')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/contact/type/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/contact/type/edit/'.$r->id);
        }
    }
}

