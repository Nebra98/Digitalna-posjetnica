<div class="container">


    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="form-group">
        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>


        <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
        </div>

        <p class="font-weight-bold"><i class="fas fa-address-book"></i> {{ __('Kontakt informacije') }}</p>
        <hr>
        @foreach ($contacts as $contact)
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Naslov</label>
                        <input type="text" id="{{ $contact->title_con }}" name="title_con[]" class="form-control"
                            placeholder="Naslov" value="{{ $contact->title_con }}">
                    </div>
                    <div class="col-md-4">
                        <label>Sadržaj</label>
                        <input type="text" id="{{ $contact->content_con }}" name="content_con[]" class="form-control"
                            placeholder="Sadržaj" value="{{ $contact->content_con }}">
                    </div>
                    <div class="col-md-3">
                        <label>Ikonica</label>
                        <input type="text" id="{{ $contact->icon_con }}" name="icon_con[]" class="form-control"
                            placeholder="Ikonica" value="{{ $contact->icon_con }}">
                    </div>
                    <div class="col-md-2">
                        <label>Vidljivo</label>
                        <input class="form-check" type="checkbox" name="visible_con[]" value="{{ $contact->title_con }}"
                            {{ Str::contains($contact->visible_con, $contact->title_con) ? 'checked' : '' }}
                            style="margin-left: 2px; margin-top: 10px;">
                        <input type="hidden" id="user_id" name="user_id[]" value="{{ Auth::user()->id }}">
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Spremi" />
    </div>
</div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 1;


        $('#add_contact').click(function() {
            i++;
            $('#dynamic_field_contact').append('<tr id="rowcontact' + i +
                '" class="dynamic-added-contact"><td><input type="text" name="title_con[]" placeholder="Contact title" class="form-control" /></td><td><input type="text" name="content_con[]" placeholder="Contact content" class="form-control" /></td><td><input type="text" name="icon_con[]" placeholder="Contact icon" class="form-control" /></td><input type="hidden" name="visible_con[]" value="0" /><td><input type="hidden" id="user_id" name="user_id[]" value="{{ Auth::user()->id }}"><button type="button" name="remove" id="contact' +
                i + '" class="btn btn-danger btn_remove_contact">X</button></td></tr>');
        });


        $(document).on('click', '.btn_remove_contact', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#submit').click(function() {
            $.ajax({
                url: postURL,
                method: "POST",
                data: $('#add_name').serialize(),
                type: 'json',
                success: function(data) {
                    if (data.error) {
                        printErrorMsg(data.error);
                    } else {
                        i = 1;
                        $('.dynamic-added-contact').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display', 'block');
                        $(".print-error-msg").css('display', 'none');
                        $(".print-success-msg").find("ul").append(
                            '<li>Record Inserted Successfully.</li>');
                    }
                }
            });
        });


        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $(".print-success-msg").css('display', 'none');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }
    });
</script>
