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
        border: 4px solid #CCCCCC;
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
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body opacity-25">
                            <div class="d-flex flex-column align-items-center text-center">
                                <!--<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> -->

                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="{{ url('storage/uploads/avatar/' . $user->avatar) }}" class="picture-src"
                                            data-toggle="modal" data-target=".bd-example-modal-lg" id="wizardPicturePreview"
                                            title="">
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                            {{ $user->name }} {{ $user->last_name }} - Slika profila</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ url('storage/uploads/avatar/' . $user->avatar) }}"
                                                            width="300px" height="300px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-3">
                                    <h4>{{ $user->name }} {{ $user->last_name }}</h4>
                                    <p class="text-secondary mb-1"></p>
                                    <p class="text-muted font-size-sm"></p>
                                    @if ($user->mobile_private_vcf != null or $user->mobile_work_vcf != null or $user->email_private_vcf != null or $user->email_work_vcf != null)
                                        <a class="btn btn-dark" href="{{ route('save_contact', $user->id) }}"
                                            role="button">Spremi kontakt</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($count_personal != 0)
                        <div class="card mt-3">
                            <div class="card-body">
                                <p class="font-weight-bold">{{ __('Osnovne informacije') }}</p>
                                <ul class="list-group list-group-flush">
                                    @foreach ($personal as $item)
                                        @if ($item->title_per == $item->visible_per)
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6 class="mb-0">{!! $item->icon_per !!} {{ $item->title_per }}</h6><br>
                                                <span class="text-secondary">{{ $item->content_per }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-md-9">

                    @if ($count_socials == 0 and $count_contacts == 0 and $count_personal == 0)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong style="font-size: 20px;">&#128543;</strong> Korisnik nije podijelio ni jednu informaciju
                            s Vama.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @else
                        @if ($count_contacts != 0 or $count_socials != 0)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Dijeljenje informacije</h5>
                                    @if ($count_contacts != 0)
                                        <p class="font-weight-bold">{{ __('Kontakt informacije') }}</p>
                                        @foreach ($contacts as $contact)
                                            <ul class="list-group list-group-flush">
                                                @if ($contact->title_con == $contact->visible_con)
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0">{!! $contact->icon_con !!}
                                                            {{ $contact->title_con }}</h6><br>
                                                        <span class="text-secondary">{{ $contact->content_con }}</span>
                                                    </li>
                                                @endif
                                            </ul>
                                        @endforeach
                                        <br>
                                    @endif
                                    @if ($count_socials != 0)
                                        <p class="font-weight-bold">{{ __('Društvene mreže') }}</p>
                                        @foreach ($socials as $social)
                                            <ul class="list-group list-group-flush">
                                                @if ($social->title_soc == $social->visible_soc)
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0">{!! $social->icon_soc !!}
                                                            {{ $social->title_soc }}</h6><br>
                                                        <a class="btn btn-dark" target="_blank"
                                                            href="{{ $social->content_soc }}" role="button">Pogledaj</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        @endforeach
                                    @endif

                                </div>

                            </div>
                        @endif
                </div>
                @endif

            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    @endsection
