<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class GovernorHistoryController extends Controller
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
        $data['governor_histories'] = DB::table('governor_histories')
            ->orderBy('id', 'desc')
            ->where('active',1)
            ->paginate(18);

        return view('governor-histories.index', $data);
    }
    // load create form
    public function create()
    {
        return view('governor-histories.create');
    }
    // save new governor history
    public function save(Request $r)
    {
    	$file_name = 'default.png';
        if($r->photo) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'img/';
            $file->move($destinationPath, $file_name);
        }
        $data = array(
            'name' => $r->name,
            'start_year' => $r->start_year,
            'end_year' => $r->end_year,
            'photo' => $file_name,
        );
        $sms = "The new governor history has been created successfully.";
        $sms1 = "Fail to create the new governor history, please check again!";
        $i = DB::table('governor_histories')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/governor-history/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/governor-history/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('governor_histories')->where('id', $id)->update(['active'=>0]);
        return redirect('/governor-history');
    }
    public function edit($id)
    {

        $data['gov'] = DB::table('governor_histories')
            ->where('id',$id)->first();
        return view('governor-histories.edit', $data);
    }
    
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'start_year' => $r->start_year,
            'end_year' => $r->end_year,
        );
        if ($r->photo) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'img/';
            $file->move($destinationPath, $file_name);
            $data['photo'] = $file_name;
        }
        
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('governor_histories')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
        }

        return redirect('/governor-history/edit/'.$r->id);
    }
}

