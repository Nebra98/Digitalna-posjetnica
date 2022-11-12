<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("personal.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title_per = $request->title_per;
        $content_per = $request->content_per;
        $icon_per = $request->icon_per;
        $visible_per = $request->visible_per;

        $user_id = $request->user_id;

        for($count = 0; $count < count($title_per); $count++)
        {

         $data = array(
          'title_per' => $title_per[$count],
          'content_per'  => $content_per[$count],
          'icon_per'  => $icon_per[$count],
          'user_id'  => $user_id[$count],
          'visible_per'  => $title_per[$count],
         );
         $insert_data[] = $data; 
        }
  
        Personal::insert($insert_data);

        $request->session()->flash('success', "Uspješno ste unijeli podatke!");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
