
    <div class="container">


        @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
        @endif

        <div class="form-group">
            <form name="add_name" id="add_name" method="POST" action="{{ route('personal.store') }}" enctype="multipart/form-data">  
               {{ csrf_field() }}
   
               <div class="alert alert-danger print-error-msg" style="display:none">
               <ul></ul>
               </div>
   
   
               <div class="alert alert-success print-success-msg" style="display:none">
               <ul></ul>
               </div>
   
   
               <div class="table-responsive">  
                   <table class="table table-bordered" id="dynamic_field_personal">  
                       <tr>  
                           <td><input type="text" name="title_per[]" placeholder="Personal title" class="form-control" /></td> 
                           <td><input type="text" name="content_per[]" placeholder="Personal content" class="form-control" /></td> 
                           <td><input type="text" name="icon_per[]" placeholder="Personal icon" class="form-control" /></td>
                           <input type="hidden" name="visible_per[]" value="0" />
                           <input type="hidden" id="user_id" name="user_id[]" value="{{ Auth::user()->id }}">
                           <td><button type="button" name="add" id="add_personal" class="btn btn-success">Add More</button></td>  
                       </tr>  
                   </table>  
                   <input type="submit" name="submit" id="submit" class="btn btn-info" value="Spremi" />  
               </div>
   
   
            </form>  
       </div> 

    </div>

    <script type="text/javascript">
        $(document).ready(function(){      
          var postURL = "<?php echo url('addmore'); ?>";
          var i=1;  
    
    
          $('#add_personal').click(function(){  
               i++;  
               $('#dynamic_field_personal').append('<tr id="rowpersonal'+i+'" class="dynamic-added-personal"><td><input type="text" name="title_per[]" placeholder="Personal title" class="form-control" /></td><td><input type="text" name="content_per[]" placeholder="Personal content" class="form-control" /></td><td><input type="text" name="icon_per[]" placeholder="Personal icon" class="form-control" /></td><input type="hidden" name="visible_per[]" value="0" /><td><input type="hidden" id="user_id" name="user_id[]" value="{{ Auth::user()->id }}"><button type="button" name="remove" id="personal'+i+'" class="btn btn-danger btn_remove_personal">X</button></td></tr>');  
          });  
    
    
          $(document).on('click', '.btn_remove_personal', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          });  
    
    
          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
    
    
          $('#submit').click(function(){            
               $.ajax({  
                    url:postURL,  
                    method:"POST",  
                    data:$('#add_name').serialize(),
                    type:'json',
                    success:function(data)  
                    {
                        if(data.error){
                            printErrorMsg(data.error);
                        }else{
                            i=1;
                            $('.dynamic-added-personal').remove();
                            $('#add_name')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display','block');
                            $(".print-error-msg").css('display','none');
                            $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                        }
                    }  
               });  
          });  
    
    
          function printErrorMsg (msg) {
             $(".print-error-msg").find("ul").html('');
             $(".print-error-msg").css('display','block');
             $(".print-success-msg").css('display','none');
             $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
             });
          }
        });  
    </script>

