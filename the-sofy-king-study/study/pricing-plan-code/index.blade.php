@extends('admin.master') 
@section('title')
 Pricing Plan Info  
@endsection 
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> Pricing Plan Info 
        </h3>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-list"></i> Pricing Plan Info 
                    </div>
                    <div class="panel-body ">
                            @if($pricingPlan->all())
                        <table class="table table-responsive table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th> Name</th>
                                    <th> Type </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pricingPlan as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>
                                        <a href="{{route('admin.plan.edit',$item->id)}}" class="btn purple btn-sm">
                                           <i class="fa fa-edit"></i> EDIT PLAN
                                        </a>
                                        <a href="{{route('admin.plan.edit',$item->id)}}" class="btn purple btn-sm">
                                                <i class="fa fa-edit"></i> EDIT PLAN DETAILS
                                             </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                       <div class="alert alert-danger text-center">
                        <h1>
                            <strong>No Record Found...</strong>
                        </h1>
                       </div>
                        @endif
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>



@endsection 