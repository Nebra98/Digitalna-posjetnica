<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Personal;
use App\Social;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Traits\UploadTrait;


use function Symfony\Component\String\b;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $socials = Social::where('user_id', '=', Auth::user()->id)->get();
        $contacts = Contact::where('user_id', '=', Auth::user()->id)->get();
        $personal = Personal::where('user_id', '=', Auth::user()->id)->get();

        return view('home', compact('socials', 'contacts', 'personal'));
    }

    public function edit()
    {

        $socials = Social::where('user_id', '=', Auth::user()->id)->get();
        $contacts = Contact::where('user_id', '=', Auth::user()->id)->get();
        $personal = Personal::where('user_id', '=', Auth::user()->id)->get();

        return view('edit', compact('socials', 'contacts', 'personal'));
    }

    public function update(Request $request)
    {

        $socials = Social::where('user_id', '=', Auth::user()->id)->get();
        $contacts = Contact::where('user_id', '=', Auth::user()->id)->get();
        $personal = Personal::where('user_id', '=', Auth::user()->id)->get();

        $user = User::findOrFail(Auth::user()->id);

        if(!is_null($request->name)){
            $user->name = $request->name;
        }
        if(!is_null($request->last_name)){
            $user->last_name = $request->last_name;
        }

        if(!is_null($request->company_vcf)){
            $user->company_vcf = $request->company_vcf;
        }else{
            $user->company_vcf = null;
        }
        if(!is_null($request->job_vcf)){
            $user->job_vcf = $request->job_vcf;
        }else{
            $user->job_vcf = null;
        }
        if(!is_null($request->mobile_private_vcf)){
            $user->mobile_private_vcf = $request->mobile_private_vcf;
        }else{
            $user->mobile_private_vcf = null;
        }
        if(!is_null($request->mobile_work_vcf)){
            $user->mobile_work_vcf = $request->mobile_work_vcf;
        }else{
            $user->mobile_work_vcf = null;
        }
        if(!is_null($request->email_private_vcf)){
            $user->email_private_vcf = $request->email_private_vcf;
        }else{
            $user->email_private_vcf = null;
        }
        if(!is_null($request->email_work_vcf)){
            $user->email_work_vcf = $request->email_work_vcf;
        }else{
            $user->email_work_vcf = null;
        }
        if(!is_null($request->address_vcf)){
            $user->address_vcf = $request->address_vcf;
        }else{
            $user->address_vcf = null;
        }
        if(!is_null($request->website_vcf)){
            $user->website_vcf = $request->website_vcf;
        }else{
            $user->website_vcf = null;
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.'.$avatar->getClientOriginalExtension();

            Storage::disk('public')->putFileAs(
                'uploads/avatar/',
                $avatar,
                $filename
            );

            // Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatar/'. $filename));

            $user->avatar = $filename;
        }

        $user->save();

        $count = 0;

        foreach ($socials as $social)
        {
            $social->title_soc = $request->title_soc[$count];
            $social->content_soc = $request->content_soc[$count];
            $social->icon_soc = $request->icon_soc[$count];
           // $social->visible_soc = $request->visible_soc[$count];

            if(!empty($request['visible_soc'])) {    
                if (in_array($social->title_soc, $request['visible_soc']))
                {
                    // pronadjeno
                    $social->visible_soc = $social->title_soc;
                }else{
                    // nije pronadjeno
                    $social->visible_soc = "0";

                }
            }else{
                $social->visible_soc = "0";
            }

            $social->save();

            $count++;

        }

        $count = 0;

        foreach ($contacts as $contact)
        {
            $contact->title_con = $request->title_con[$count];
            $contact->content_con = $request->content_con[$count];
            $contact->icon_con = $request->icon_con[$count];
           // $social->visible_soc = $request->visible_soc[$count];

            if(!empty($request['visible_con'])) {    
                if (in_array($contact->title_con, $request['visible_con']))
                {
                    // pronadjeno
                    $contact->visible_con = $contact->title_con;
                }else{
                    // nije pronadjeno
                    $contact->visible_con = "0";

                }
            }else{
                $contact->visible_con = "0";
            }

            $contact->save();

            $count++;

        }

        $count = 0;

        foreach ($personal as $item)
        {
            $item->title_per = $request->title_per[$count];
            $item->content_per = $request->content_per[$count];
            $item->icon_per = $request->icon_per[$count];
           // $social->visible_soc = $request->visible_soc[$count];

            if(!empty($request['visible_per'])) {    
                if (in_array($item->title_per, $request['visible_per']))
                {
                    // pronadjeno
                    $item->visible_per = $item->title_per;
                }else{
                    // nije pronadjeno
                    $item->visible_per = "0";

                }
            }else{
                $item->visible_per = "0";
            }

            $item->save();

            $count++;

        }



        $request->session()->flash('success', "Uspješno ste ažurirali podatke!");

        return redirect()->back();
    }

}
