<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\BasicInformation;
use Illuminate\Support\Facades\Response;


use Laravolt\Avatar\Facade as Avatar;

class BasicInformationController extends Controller
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


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $request->name;
        $icon = $request->icon;
        $visible = $request->visible;


        //$visible = $request->has('visible') ? '1' : '0';

        $user_id = $request->user_id;
       // dd( $request->visible);
        for($count = 0; $count < count($name); $count++)
        {

         $data = array(
          'name' => $name[$count],
          'icon'  => $icon[$count],
          'visible'  => $name[$count],
          'user_id'  => $user_id[$count],
         );
         $insert_data[] = $data; 
        }
  
        BasicInformation::insert($insert_data);

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
