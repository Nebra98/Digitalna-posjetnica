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
        <p class="font-weight-bold"><i class="fas fa-users"></i> {{ __('Društvene mreže') }}</p>
        <hr>
        @foreach ($socials as $social)
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Naslov</label>
                        <input type="text" id="{{ $social->title_soc }}" name="title_soc[]" class="form-control"
                            placeholder="Naslov" value="{{ $social->title_soc }}">
                    </div>
                    <div class="col-md-4">
                        <label>Sadržaj</label>
                        <input type="text" id="{{ $social->title_soc }}" name="content_soc[]" class="form-control"
                            placeholder="Sadržaj" value="{{ $social->content_soc }}">
                    </div>
                    <div class="col-md-3">
                        <label>Ikonica</label>
                        <input type="text" id="{{ $social->icon_soc }}" name="icon_soc[]" class="form-control"
                            placeholder="Ikonica" value="{{ $social->icon_soc }}">
                    </div>
                    <div class="col-md-2">
                        <label>Vidljivo</label>
                        <input class="form-check" type="checkbox" name="visible_soc[]" value="{{ $social->title_soc }}"
                            {{ Str::contains($social->visible_soc, $social->title_soc) ? 'checked' : '' }}
                            style="margin-left: 2px; margin-top: 10px;">
                            <input type="hidden" id="user_id" name="user_id[]" value="{{ Auth::user()->id }}">
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
        <input type="submit" name="submit" class="btn btn-info" value="Spremi" />

    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 1;


        $('#add_social').click(function() {
            i++;
            $('#dynamic_field_social').append('<tr id="rowsocial' + i +
                '" class="dynamic-added-social"><td><input type="text" name="title_soc[]" placeholder="Social title" class="form-control" /></td><td><input type="text" name="content_soc[]" placeholder="Social content" class="form-control" /></td><td><input type="text" name="icon_soc[]" placeholder="Social icon" class="form-control" /></td><input type="hidden" name="visible_soc[]" value="0" /><td><input type="hidden" id="user_id" name="user_id[]" value="{{ Auth::user()->id }}"></td></tr>'
            );
        });


        $(document).on('click', '.btn_remove_social', function() {
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
                        $('.dynamic-added-social').remove();
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
