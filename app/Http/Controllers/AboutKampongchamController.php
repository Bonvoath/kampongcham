<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class AboutKampongchamController extends Controller
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
       
        $data['about_kampongchams'] = DB::table('about_kampongchams')
            ->orderBy('id', 'desc')
            ->where('active', 1)
            ->paginate(18);
        return view('about-kampongchams.index', $data);
    }
    // load create form
    public function create()
    {
        return view('about-kampongchams.create');
    }
    // save new page
    public function save(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'short_description' => $r->short_description,
            'create_by' =>  Auth::user()->name,
            'description' => $r->description
        );
        $sms = "The new post has been created successfully.";
        $sms1 = "Fail to create the new post, please check again!";
        $i = DB::table('about_kampongchams')->insert($data);

        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/about-kampongcham/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/about-kampongcham/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        
        DB::table('about_kampongchams')->where('id', $id)->update(['active'=>0]);
        return redirect('/about-kampongcham');
    }

    public function edit($id)
    {
       
        $data['about'] = DB::table('about_kampongchams')
            ->where('id',$id)->first();
        return view('about-kampongchams.edit', $data);
    }

    public function update(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'short_description' => $r->short_description,
            'modify_by' =>  Auth::user()->name,
            'description' => $r->description
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('about_kampongchams')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/about-kampongcham/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/about-kampongcham/edit/'.$r->id);
        }
    }
    // view detail
    public function view($id) 
    {
        $data['post'] = DB::table('about_kampongchams')
            ->where('id',$id)->first();
        return view('about-kampongchams.detail', $data);
    }
}

