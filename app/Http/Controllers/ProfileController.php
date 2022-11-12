<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Personal;
use App\Social;
use App\User;
use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;
use Illuminate\Support\Facades\Response;



class ProfileController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::findOrFail($user_id);
        $socials = Social::where('user_id', '=', $user->id)->get();
        $contacts = Contact::where('user_id', '=', $user->id)->get();
        $personal = Personal::where('user_id', '=', $user->id)->get();

        $count_socials = Social::where('user_id', '=', $user->id)->where('visible_soc', '!=', '0')->count();
        $count_contacts = Contact::where('user_id', '=', $user->id)->where('visible_con', '!=', '0')->count();
        $count_personal = Personal::where('user_id', '=', $user->id)->where('visible_per', '!=', '0')->count();

        return view('profile', compact('user', 'socials', 'contacts', 'personal', 'count_socials', 'count_contacts', 'count_personal'));

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

    public function generateVcard($user_id)
    {

        $user=User::find($user_id);

        $vcard = new VCard();

        $name = $user->name;
        $last_name = $user->last_name;
        $additional = '';
        $prefix = '';
        $suffix = '';

        $vcard->addName($last_name, $name, $additional, $prefix, $suffix);

        if(!is_null($user->company_vcf)){
            $vcard->addCompany($user->company_vcf);
        }
        if(!is_null($user->job_vcf)){
            $vcard->addJobtitle($user->job_vcf);
        }
        if(!is_null($user->mobile_private_vcf)){
            $vcard->addPhoneNumber($user->mobile_private_vcf, 'PREF');
        }
        if(!is_null($user->mobile_work_vcf)){
            $vcard->addPhoneNumber($user->mobile_work_vcf, 'WORK');
        }
        if(!is_null($user->email_private_vcf)){
            $vcard->addEmail($user->email_private_vcf, 'PREF');
        }
        if(!is_null($user->email_work_vcf)){
            $vcard->addEmail($user->email_work_vcf, 'WORK');
        }
        if(!is_null($user->address_vcf)){
            $vcard->addAddress(null, null, $user->address_vcf, null, null, null, null);
        }
        if(!is_null($user->website_vcf)){
            $vcard->addURL($user->website_vcf);
        }

        $file_path = storage_path('app/public/uploads/avatar/');
        $vcard->addPhoto($file_path . $user->avatar);

        return Response::make(
            $vcard->getOutput(),
            200,
            $vcard->getHeaders(true)
        );


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
