@extends('admin.master')
@section('pageTitle')
    Category
@endsection
@section('pgSubTitle')
    Manage Category
@endsection

@section('content')
   <form action="{{ url('/update-order') }}" method="POST">
       <table>
           <tr>
               <td>Order Status</td>
               <td>
                   <select>
                       <option>Pending</option>
                       <option>Cancel</option>
                       <option>Successfull</option>
                   </select>
                   <input type="hidden" name="id" value="{{  }}"/>
               </td>
           </tr>
           <tr>
               <td>Payment Status</td>
               <td>
                   <select>
                       <option>Pending</option>
                       <option>Cancel</option>
                       <option>Successfull</option>
                   </select>
               </td>
           </tr>
           <tr>
               <td>Order Status</td>
               <td>
                   <input type="submit" name="btn" value="Update Order"/>
               </td>
           </tr>
       </table>
   </form>
@endsection

