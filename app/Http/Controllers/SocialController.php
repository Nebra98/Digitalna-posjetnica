<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
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
        return view("social.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title_soc = $request->title_soc;
        $content_soc = $request->content_soc;
        $icon_soc = $request->icon_soc;
        $visible_soc = $request->visible_soc;

        $user_id = $request->user_id;

        for($count = 0; $count < count($title_soc); $count++)
        {

         $data = array(
          'title_soc' => $title_soc[$count],
          'content_soc'  => $content_soc[$count],
          'icon_soc'  => $icon_soc[$count],
          'user_id'  => $user_id[$count],
          'visible_soc'  => $title_soc[$count],
         );
         $insert_data[] = $data; 
        }
  
        Social::insert($insert_data);

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
