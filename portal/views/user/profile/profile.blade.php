@extends('user.master')


@section('content')
 <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h2 > Add Your Profile Info</h2>
            </div>
             
             

              <ul class="nav  nav-pills nav-justified">
                <li class="{{ Request::is('Profile') ? 'class="active"' : '' }}"><a data-toggle="tab" id="proIndex" href="#home">Profile</a></li>

                <li data-toggle="tab" class="{{ Request::is('documents') ? 'class="active"' : '' }}"><a href="#menu1" id="docIndex" >Documents</a></li>

                <li data-toggle="tab" class="{{ Request::is('system') ? 'class="active"' : '' }}"><a href="#menu2" id="itIndex">It System</a></li>

                <li data-toggle="tab" class="{{ Request::is('qualification') ? 'class="active"' : '' }}"><a href="#menu3" id="qualityIndex">Qualification</a></li>

                <li data-toggle="tab" class="{{ Request::is('experience') ? 'class="active"' : '' }}"><a href="#menu4" id="expIndex">Experience</a></li>

                <li data-toggle="tab" class="{{ Request::is('language') ? 'class="active"' : '' }}"><a href="#menu4" id="langIndex">Spoken Language</a></li>
              </ul>

          
              <div id="index">
                
              </div>
              <div id="modals">
                
              </div>

               
                </div>
              </div>
           
          </div>
        <!-- /.col -->

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('js')

<script type="text/javascript">
   $(document).ready(function () {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    // start profile script
    $('#proIndex').on('click',function(){
      $.get('{{URL::to("lucum/view-profile-info")}}',function(data){
          $('#index').empty().append(data);
      });
    });
    $('#index').on('click','#btnAddImg',function(e){
        e.preventDefault();
        $.get('{{URL::to("lucum/add-profile-image")}}',function(data){
            $('#modals').append(data);
            $('#addImage').modal('show');
        });
    });
     $('#modals').on('submit','#ImgFrmData',function(e){
          e.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
            url:'{{URL::to("lucum/store-profile-image")}}',
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            type:'POST',
          })
          .done(function(data){
             // alert(data);
            $('#modals #message').empty().append('<li class="list-group-item  text-center btn-success">Data Inserted Successfully...</li>');
              $('#index').empty().append(data);
          })
          .fail(function(error){
              $('#modals #message').empty();
              var errors = error.responseJSON;
              var data =errors.errors;
              $.each(data,function(item,index){
                // console.log(index);
                  $('#modals #message').append(' <li class="list-group-item btn-danger text-center">'+index+'</li><hr>');
              });
          });
       });
    // start document script
     $('#docIndex').on('click',function(){
        $.get('{{URL::to("lucum/document")}}',function(data){
            $('#index').empty().append(data);
        });
     });
     $('#index').on('click','#btnAddDoc',function(e){
        e.preventDefault();
        $.get('{{URL::to("lucum/add-document")}}',function(data){
            $('#modals').empty().append(data);
            $('#addDocInfo').modal('show');
        });

     });
      $('#modals').on('submit','#docFrmData',function(e){
          e.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
            url:'{{URL::to("lucum/store-document")}}',
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            type:'POST',
          })
          .done(function(data){
             // alert(data);
            $('#modals #message').empty().append('<li class="list-group-item  text-center btn-success">Data Inserted Successfully...</li>');
              $('#index').empty().append(data);
          })
          .fail(function(error){
            // console.log(error.responseJSON);
              $('#modals #message').empty();
              var errors = error.responseJSON;
             // console.log(errors.errors);
              var data =errors.errors;
              $.each(data,function(item,index){
                // console.log(index);
                  $('#modals #message').append(' <li class="list-group-item btn-danger text-center">'+index+'</li><hr>');
              });
          });
       });


    // start experience script
        $('#expIndex').on('click',function(e){
          e.preventDefault();
          $.get('{{URL::to("lucum/experience")}}',function(data){
            $('#index').empty().append(data);
          });
        });

       $('#index').on('click','#btnAddExp',function(e){
        e.preventDefault();
          $.get('{{URL::to("lucum/add-experience")}}',function(data){
              $('#modals').empty().append(data);
              $('#addExpInfo').modal('show');
          });
       });
       $('#modals').on('submit','#expFrmData',function(e){
          e.preventDefault();
          var frmData = $(this).serialize();
          // $.post('{{URL::to("lucum/store-experience")}}',frmData,function(data,xhrStatus,xhr){
          //   $('#index').empty().append(data);
          // });
          $.ajax({
            url:'{{URL::to("lucum/store-experience")}}',
            type:'POST',
            data:frmData,
          })
          .done(function(data){
            $('#modals #message').empty().append('<li class="list-group-item  text-center btn-success">Data Inserted Successfully...</li>');
              $('#index').empty().append(data);
          })
          .fail(function(error){
            // console.log(error.responseJSON);
              $('#modals #message').empty();
              var errors = error.responseJSON;
             // console.log(errors.errors);
              var data =errors.errors;
              $.each(data,function(item,index){
                // console.log(index);
                  $('#modals #message').append(' <li class="list-group-item btn-danger text-center">'+index+'</li><hr>');
              });
          });
       });
    // start qualification script
    $('#qualityIndex').on('click',function(){
      $.get('{{URL::to("lucum/qualification")}}',function(data){
        $('#index').empty().append(data);
      });
    });

    $('#index').on('click','#btnAddQuality',function(e){
      e.preventDefault();
      $.get('{{URL::to("lucum/add-qualification")}}',function(data){
        $('#modals').empty().append(data);
        $('#addQualityInfo').modal('show');
      });
    });
    $('#modals').on('submit','#quaFrmData',function(e){
      e.preventDefault();
      var frmData = $(this).serialize();
      $.ajax({
        url:'{{URL::to("lucum/store-qualification")}}',
        type:'POST',
        data:frmData,
      })
      .done(function(data){
        $('#modals #message').empty().append('<li class="list-group-item text-center btn-success">Qualification Info Save Successfully....</li>');
        $('#index').empty().append(data);
      })
      .fail(function(error){
          $('#modals #message').empty();
              var errors = error.responseJSON;
              var data =errors.errors;
              $.each(data,function(item,index){
                  $('#modals #message').append(' <li class="list-group-item btn-danger text-center">'+index+'</li><hr>');
              });
      });
    });
    // start it system index page script
    $('#itIndex').on('click',function(){
      $.get('{{URL::to("lucum/it-system")}}',function(data){
        $('#index').empty().append(data);
      });
    }); 
    $('#index').on('click','#btnAddIt',function(e){
        e.preventDefault();
      $.get('{{URL::to("lucum/add-it-system")}}',function(data){
          $('#modals').empty().append(data);
          $('#addItInfo').modal('show');
      });
    });
    $('#modals').on('submit','#itFrmData',function(e){
        e.preventDefault();
        var frmData = $(this).serialize();
        $.ajax({
          url:'{{URL::to("lucum/store-it-system")}}',
          type:'POST',
          data:frmData,
        })
        .done(function(data){
          $('#modals #message').empty().append('<li class="list-group-item text-center btn-success">Data Inserted Successfully...</li>');
          $('#index').empty().append(data);
        })
        .fail(function(error){
            var errors = error.responseJSON;
            var data   = errors.errors;
            $.each(data,function(index,item){
               $('#modals #message').append(' <li class="list-group-item btn-danger text-center">'+item+'</li><hr>');
            });
        });
    });
    // start language page script
    $('#langIndex').on('click',function(){
      $.get('{{URL::to("lucum/language")}}',function(data){
        $('#index').empty().append(data);
      });
    });
    $('#index').on('click','#btnAddLang',function(event){
     event.preventDefault();
      $.get('{{URL::to("lucum/add-language")}}',function(data){
        $('#modals').empty().append(data);
        $('#addLangInfo').modal('show');
      });
    });
   $('#modals').on('submit','#lanFrmData',function(event){
     event.preventDefault();
      var frmData = $(this).serialize();
      $.ajax({
        url:'{{URL::to("lucum/store-language")}}',
        type:'POST',
        data:frmData,
      })
      .done(function(data){
        $('#modals #message').empty().append('<li class="list-group-item  text-center btn-success">Data Inserted Successfully...</li>');
        $('#index').empty().append(data);
      })
      .fail(function(error){
          $('#modals #message').empty();
              var errors = error.responseJSON;
              var data =errors.errors;
              $.each(data,function(index,item){
                  $('#modals #message').append(' <li class="list-group-item btn-danger text-center">'+item+'</li><hr>');
              });
      });
   });
  
  });// document ready fun end

</script>
@endsection