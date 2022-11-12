<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        return view("contact.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title_con = $request->title_con;
        $content_con = $request->content_con;
        $icon_con = $request->icon_con;
        $visible_con = $request->visible_con;

        $user_id = $request->user_id;

        for($count = 0; $count < count($title_con); $count++)
        {

         $data = array(
          'title_con' => $title_con[$count],
          'content_con'  => $content_con[$count],
          'icon_con'  => $icon_con[$count],
          'user_id'  => $user_id[$count],
          'visible_con'  => $title_con[$count],
         );
         $insert_data[] = $data; 
        }
  
        Contact::insert($insert_data);

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
