<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    /*Profile Pic Start*/
    .picture-container {
        position: relative;
        cursor: pointer;
        text-align: center;
    }

    .picture {
        width: 150px;
        height: 150px;
        background-color: #999999;
        border: 4px solid #CCCCCC;
        color: #FFFFFF;
        border-radius: 50%;
        margin: 0px auto;
        overflow: hidden;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
    }

    .picture:hover {
        border-color: #2ca8ff;
    }

    .content.ct-wizard-green .picture:hover {
        border-color: #05ae0e;
    }

    .content.ct-wizard-blue .picture:hover {
        border-color: #3472f7;
    }

    .content.ct-wizard-orange .picture:hover {
        border-color: #ff9500;
    }

    .content.ct-wizard-red .picture:hover {
        border-color: #ff3b30;
    }

    .picture input[type="file"] {
        cursor: pointer;
        display: block;
        height: 100%;
        left: 0;
        opacity: 0 !important;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .picture-src {
        width: 100%;

    }

    /*Profile Pic End*/
</style>

@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <form name="add_name" id="add_name" method="POST" action="{{ route('home.update') }}" enctype="multipart/form-data">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> -->
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ url('storage/uploads/avatar/' . Auth::user()->avatar) }}"
                                                class="picture-src" id="wizardPicturePreview" title="">
                                            <input type="file" id="avatar" name="avatar" class="">
                                        </div>
                                        <h6 class="">Promijeni avatar</h6>

                                    </div>

                                    <div class="mt-3">
                                        <h4></h4>
                                        <p class="text-secondary mb-1"></p>
                                        <p class="text-muted font-size-sm"></p>
                                        <img src="{{ url('storage/images/qr_codes/' . Auth::user()->qr_code) }}"
                                            width="130" height="130" alt="qr-code">
                                        <p class="text-muted font-size-sm">Vaš QR Kôd</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-9">

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ime</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Ime" value="{{ Auth::user()->name }}" aria-label="Username"
                                            required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Prezime</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" id="last_name" name="last_name" class="form-control"
                                            placeholder="Prezime" value="{{ Auth::user()->last_name }}" required>
                                    </div>
                                </div>
                                <hr>
                                <input type="submit" name="submit" class="btn btn-info" value="Spremi" />
                            </div>
                        </div>

                        <div class="alert alert-info" role="alert">
                            <strong>Obavijest <br></strong>
                            Ukoliko posjetitelj želi preuzeti vaš kontakt u svoj imenik na uređaju, ovdje su podaci koji će se spremati. <br>
                            Popunite podatke koje želite da se spreme u .vcf datoteku. <br>
                            <strong>Napomena, </strong> Vaše ime i prezime se automatski evidentiraju u .vcf datoteku. <br>
                        Kako bi korisnik mogao spremiti Vaš kontakt, barem jedan od sljedećih podataka mora biti popunjen:
                          <ul>
                            <li>Broj mobitela (privatno)</li>
                            <li>Broj mobitela (posao)</li>
                            <li>Email (privatno)</li>
                            <li>Email (posao)</li>
                          </ul>

                        
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="font-weight-bold"><i class="fas fa-address-book"></i> {{ __('Informacije za spremanje kontakta u imenik') }}</p>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tvrtka</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="company_vcf" class="form-control" placeholder="Tvrtka" value="{{ Auth::user()->company_vcf }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Posao</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="job_vcf" class="form-control" placeholder="Posao" value="{{ Auth::user()->job_vcf }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Broj mobitela (privatno)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="mobile_private_vcf" class="form-control" placeholder="Broj mobitela (privatno)" value="{{ Auth::user()->mobile_private_vcf }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Broj mobitela (posao)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="mobile_work_vcf" class="form-control" placeholder="Broj mobitela (posao)" value="{{ Auth::user()->mobile_work_vcf }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email (privatno)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="email_private_vcf" class="form-control" placeholder="Email (privatno)" value="{{ Auth::user()->email_private_vcf }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email (posao)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="email_work_vcf" class="form-control" placeholder="Email (posao)" value="{{ Auth::user()->email_work_vcf }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Adresa</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address_vcf" class="form-control" placeholder="Adresa" value="{{ Auth::user()->address_vcf }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Web sjedište</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="website_vcf" class="form-control" placeholder="Web sjedište" value="{{ Auth::user()->website_vcf }}">
                                    </div>
                                </div>
                                <hr>
                                <input type="submit" name="submit" class="btn btn-info" value="Spremi" />
                            </div>
                        </div>

                        <div class="alert alert-info" role="alert">
                            <strong>Obavijest <br></strong>

                            Polja označena sa <strong><input type="checkbox" checked disabled></strong> biti će vidljiva
                            posjetiteljima Vašeg profila. <br>
                            <a href="https://fontawesome.com/v5/search" target="_blank" class="link-danger">Ikonice možete pronaći ovdje</a>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="font-weight-bold"><i class="far fa-id-card"></i> {{ __('Osobne informacije') }}</p>
                                <hr>
                                @foreach ($personal as $item)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Naslov</label>
                                                <input type="text" id="{{ $item->title_per }}" name="title_per[]"
                                                    class="form-control" placeholder="Naslov"
                                                    value="{{ $item->title_per }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Sadržaj</label>
                                                <input type="text" name="content_per[]" class="form-control"
                                                    placeholder="Sadržaj" value="{{ $item->content_per }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Ikonica</label>
                                                <input type="text" id="{{ $item->icon_per }}" name="icon_per[]"
                                                    class="form-control" placeholder="Ikonica"
                                                    value="{{ $item->icon_per }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Vidljivo</label>
                                                <input class="form-check" type="checkbox" name="visible_per[]"
                                                    value="{{ $item->title_per }}"
                                                    {{ Str::contains($item->visible_per, $item->title_per) ? 'checked' : '' }}
                                                    style="margin-left: 2px; margin-top: 10px;">
                                                <input type="hidden" id="user_id" name="user_id[]"
                                                    value="{{ Auth::user()->id }}">
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                                <input type="submit" name="submit" class="btn btn-info" value="Spremi" />
                            </div>
                        </div>


                        {{ csrf_field() }}
    
                        <div class="alert alert-info" role="alert">
                            <strong>Obavijest <br></strong>

                            Polja označena sa <strong><input type="checkbox" checked disabled></strong> biti će vidljiva
                            posjetiteljima Vašeg profila. <br>
                            <a href="https://fontawesome.com/v5/search" target="_blank" class="link-danger">Ikonice možete pronaći ovdje</a>

                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                @include('social.edit')
                            </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            <strong>Obavijest <br></strong>

                            Polja označena sa <strong><input type="checkbox" checked disabled></strong> biti će vidljiva
                            posjetiteljima Vašeg profila. <br>
                            <a href="https://fontawesome.com/v5/search" target="_blank" class="link-danger">Ikonice možete pronaći ovdje</a>

                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                @include('contact.edit')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        $(document).ready(function() {
            // Prepare the preview for profile picture
            $("#avatar").change(function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
