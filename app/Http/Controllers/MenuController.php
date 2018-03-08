<?php

namespace App\Http\Controllers;

use App\Menus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = DB::table('categories')
            ->where('active', 1)
            ->get();

        $this->data['pages'] = DB::table('posts')
            ->where('post_type', 'page')
            ->where('active', 1)
            ->get();

        $this->data['posts'] = DB::table('posts')
            ->where('post_type', 'post')
            ->where('active', 1)
            ->get();

        return view('menus.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'menu_type' => $request->menu_type,
            'url' => $request->url,
            'date_created' => date('Y-m-d H:i:s'),
            'last_updated' => date('Y-m-d H:i:s')
        );

        $i = DB::table('menus')->insert($data);
        if($i)
        {
            $this->data['is_error'] = false;
        }
        
        return \Response::json($this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menus  $menus
     * @return \Illuminate\Http\Response
     */
    public function show(Menus $menus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menus  $menus
     * @return \Illuminate\Http\Response
     */
    public function edit(Menus $menus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menus  $menus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menus $menus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menus  $menus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menus $menus)
    {
        //
    }
}
