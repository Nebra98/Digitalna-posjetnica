@extends('layouts.app')
@section('content')
    <div class="container">


        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="row justify-content-center">


        <div class="card">

            <div class="card-header"><i class="fas fa-address-book"></i> Dodaj kontakt informacije</div>

            <div class="card-body">

                <div class="alert alert-info" role="alert">
                    <strong>Obavijest <br></strong>
                    <a href="https://fontawesome.com/v5/search" target="_blank" class="link-danger">Ikonice možete pronaći ovdje</a>
                </div>

                <form name="add_name" id="add_name" method="POST" action="{{ route('contact.store') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col">
                        <div class="col">
                            <div id="field">
                                <div id="field0" class="row">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <div class="col">
                                            <input type="text" name="title_con[]" placeholder="Naslov"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">

                                        <div class="col">
                                            <input type="text" name="content_con[]" placeholder="Sadržaj"
                                                class="form-control" />

                                        </div>
                                    </div>
                                    <!-- File Button -->
                                    <div class="form-group">

                                        <div class="col">
                                            <input type="text" name="icon_con[]" placeholder="Ikonica"
                                                class="form-control" />
                                            <input type="hidden" name="visible_con[]" value="0" />
                                            <input type="hidden" id="user_id" name="user_id[]"
                                                value="{{ Auth::user()->id }}">
                                            <div id="action_jsondisplay"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <button id="add-more" name="add-more" class="btn btn-primary">Dodaj još</button>
                                </div>
                            </div>
                            <br><br>

                        </div>
                    </div>
                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Spremi" />

                </form>
            </div>

        </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            //@naresh action dynamic childs
            var next = 0;
            $("#add-more").click(function(e) {
                e.preventDefault();
                var addto = "#field" + next;
                var addRemove = "#field" + (next);
                next = next + 1;
                var newIn = ' <div class="row" id="field' + next + '" name="field' + next +
                    '"><!-- Text input--><div class="form-group"> <label class="col-md-4 control-label" for="action_id"></label> <div class="col"> <input type="text" name="title_con[]" placeholder="Naslov" class="form-control" /> </div></div><br><br> <!-- Text input--><div class="form-group"> <label class="col-md-4 control-label" for="action_name"></label> <div class="col"> <input type="text" name="content_con[]" placeholder="Sadržaj" class="form-control" /> </div></div><br><br><!-- File Button --> <div class="form-group"> <label class="col-md-4 control-label" for="action_json"></label> <div class="col"> <input type="text" name="icon_con[]" placeholder="Ikonica" class="form-control" /><input type="hidden" name="visible_con[]" value="0" /><input type="hidden" id="user_id" name="user_id[]" value="{{ Auth::user()->id }}"> </div></div></div>';
                var newInput = $(newIn);
                var removeBtn = '<button id="remove' + (next - 1) +
                    '" class="btn btn-danger remove-me" >Ukloni</button></div></div><div id="field">';
                var removeButton = $(removeBtn);
                $(addto).after(newInput);
                $(addRemove).after(removeButton);
                $("#field" + next).attr('data-source', $(addto).attr('data-source'));
                $("#count").val(next);

                $('.remove-me').click(function(e) {
                    e.preventDefault();
                    var fieldNum = this.id.charAt(this.id.length - 1);
                    var fieldID = "#field" + fieldNum;
                    $(this).remove();
                    $(fieldID).remove();
                });
            });

        });
    </script>

@endsection
