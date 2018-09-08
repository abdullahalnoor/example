@extends('admin.master') @section('title') Add Pricing Plan @endsection @section('css')
<link href="{{asset('assets/admin/css/fontawesome-iconpicker.min.css')}}" rel="stylesheet" type="text/css" />

<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
</style>
@endsection @section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> Add Pricing Plan Info
        </h3>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-plus"></i> Add Pricing Plan Info
                    </div>
                    <div class="panel-body">
                        <form action="{{route('admin.plan.store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">
                                        <strong style="text-transform:uppercase"> Plan Name </strong>
                                    </label>
                                    <input type="text" class="form-control" required id="name" name="name" placeholder="Plan Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="type">
                                        <strong style="text-transform:uppercase"> Plan Type </strong>
                                    </label>
                                    <input type="text" class="form-control" required id="type" name="type" placeholder="Plan Type">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="link">
                                                        <strong style="text-transform:uppercase"> Go to Plan : Link </strong>
                                                    </label>
                                                    <input type="url" class="form-control" id="link" name="link" required placeholder="Enter Link ">
                                                </div>
                                            </div>
                                    <div class="col-md-6" style="align-items: center;
                                    justify-content: center;">
                                        <div class="form-group">
                                            <label>
                                                <strong style="text-transform:uppercase">Upload Card Hover  Image</strong>
                                            </label>
                                            <input type="file" name="image"  required accept="image/*" class="file">
                                            <div class="input-group col-xs-12">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-image"></i>
                                                </span>
                                                <input type="text" class="form-control " disabled placeholder="Upload Image">
                                                <span class="input-group-btn">
                                                    <button class="browse btn btn-primary " type="button">
                                                        <i class="fa fa-image"></i> Upload </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           

                            <!--start dynamic field  -->
                            <div class="col-md-12">
                                <h1>
                                    <strong style="text-transform:uppercase;color: mediumvioletred">Add Plan Deatails One More Field </strong>
                                </h1>
                                <button type="button" class="btn btn-primary" id="addPlanField">Add Plan Deatails </button>
                                <br>
                            <br>
                            <br>
                            </div>
                            
                            <div class="row"  id="concateField">

                               
                            </div>

                            <!--end dynamic field  -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">CREATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection @section('js')
<script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/nicEdit.js')}}"></script>
<script src="{{asset('assets/admin/js/fontawesome-iconpicker.min.js')}}"></script>
<script>
    $(document).on('click', '.browse', function () {
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });
    $(document).on('change', '.file', function () {
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
    $(document).ready(function () {
        $(document).on('focus', '.socioicon', function () {
            $('.socioicon').iconpicker();
        });
    });
    $(document).ready(function () {
        var max = 1;
        $("#addPlanField").on('click', function (e) {
            e.preventDefault();
            appendField($('#concateField'));
        });
        $(document).on('click','.itemInputs',function(){
            $(this).closest('.removeItem').remove();
        });
         function appendField(formGroup) {
        max++;
        formGroup.append(
            ' <div class="col-md-12 removeItem">'+
            ' <div class="col-md-5">'+
                    '<div class="form-group">'+
                    '<div class="input-group">'+
                                               ' <span class="input-group-addon">fa</span>'+
                                                '<input id="social_icon" type="text" autocomplete="off" class="form-control socioicon" name="icon[]">'+
                                            '</div>'+
            
            ' </div>'+
            ' </div>'+
            ' <div class="col-md-5">'+
            '<div class="form-group">'+
            '<input type="text" class="form-control" id="name" name="title[]" placeholder="Enter Title " required>'+
            '</div>'+
            '</div>'+
            '<div class="col-md-2">'+
            ' <div class="form-group">'+
            '<button type="button" class="btn btn-danger btn-block itemInputs">Remove</button>'+
            '</div>'+
            '</div>'+
            '</div>'
        )
    }
    });
   
   
</script>
@endsection