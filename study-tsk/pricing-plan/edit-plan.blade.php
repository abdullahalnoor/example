@extends('admin.master') @section('title') Update Pricing Plan @endsection @section('css')
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
        <h3 class="page-title uppercase bold"> Update Pricing Plan Info
        </h3>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-plus"></i> Update Pricing Plan Info
                    </div>
                    <div class="panel-body">
                        <form action="{{route('admin.plan.update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">
                                                <strong style="text-transform:uppercase"> Plan Name </strong>
                                            </label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$pricingPlan->name}}">
                                            <input type="hidden" name="plan_id" value="{{$pricingPlan->id}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">
                                                <strong style="text-transform:uppercase"> Plan Type </strong>
                                            </label>
                                            <input type="text" class="form-control" id="type" name="type" value="{{$pricingPlan->type}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link">
                                        <strong style="text-transform:uppercase"> Go to Plan : Link </strong>
                                    </label>
                                    <input type="url" class="form-control" id="link" name="link" value="{{$pricingPlan->link}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link">
                                                <strong style="text-transform:uppercase"> Current Card Hover Image : </strong>
                                            </label>
                                            <img src="{{asset($pricingPlan->image)}}" class="img-thumbnail" style="height: 120px;">

                                        </div>
                                    </div>
                                    <div class="col-md-6" style="align-items: center;
                                    justify-content: center;">
                                        <div class="form-group">
                                            <label>
                                                <strong style="text-transform:uppercase">Change Image</strong>
                                            </label>
                                            <input type="file" name="image" accept="image/*" class="file">
                                            <div class="input-group col-xs-12">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-image"></i>
                                                </span>
                                                <input type="text" class="form-control " disabled placeholder="Change Image">
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
                                    <strong style="text-transform:uppercase;color: mediumvioletred"> Delete ,Update & Add Plan Deatails One More Field </strong>
                                </h1>
                                <button type="button" class="btn btn-primary" id="addPlanField">Add Plan Deatails </button>
                                <br>
                                <br>
                                <br>
                            </div>

                            <div class="row" id="concateField">

                                @foreach($pricingPlanDetail as $item)
                                <div class="col-md-12 removeItem">

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">fa</span>
                                                <input id="social_icon" autocomplete="off" type="text" class="form-control socioicon" name="icon[]" value="{{$item->icon}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="title[]" value="{{$item->title}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" data-route="{{route('admin.plan-detail.delete',$item->id)}}" class="btn btn-danger btn-block itemInputs">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!--end dynamic field  -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
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
    $(document).ready(function () {
        $(document).on('focus', '.socioicon', function () {
            $('.socioicon').iconpicker();
        });
    });
    $(document).on('click', '.browse', function () {
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });
    $(document).on('change', '.file', function () {
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });

    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var max = 1;
        $("#addPlanField").on('click', function (e) {
            e.preventDefault();
            appendField($('#concateField'));
        });
        $('.removeItem').on('click', '.itemInputs', function () {
            //    var id = $(this).data('id');
            var rt = $(this).data('route');
            $.get(rt, function (data) {
                    $(this).closest('.removeItem').remove();
                })
                .done(function (data) {
                    location.reload();
                });

        });

         $(document).on('click', '.newItemInputs', function () {
            $(this).closest('.removeNewItem').remove();
        });

        function appendField(formGroup) {
            max++;
            formGroup.append(
                ' <div class="col-md-12 removeNewItem">' +
                ' <div class="col-md-5">' +
                '<div class="form-group">' +
                '<div class="input-group">' +
                ' <span class="input-group-addon">fa</span>' +
                '<input id="social_icon" type="text" autocomplete="off" class="form-control socioicon" name="icon[]">' +
                '</div>' +
                ' </div>' +
                ' </div>' +
                ' <div class="col-md-5">' +
                '<div class="form-group">' +
                '<input type="text" class="form-control" id="name" name="title[]" placeholder="Enter Title " required>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-2">' +
                ' <div class="form-group">' +
                '<button type="button" class="btn btn-danger btn-block newItemInputs">Remove</button>' +
                '</div>' +
                '</div>' +
                '</div>'
            )
        }
    });
</script>
@endsection