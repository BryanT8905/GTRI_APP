@extends('layout.app')

@section('content')



<div  class=" px-5 h-100 mainPageExpanded" style="padding-top: 150px;">
    <h3 class="mb-5">Permissions</h3> 

<div class="card shadow-sm" style="width: 60%;">
  <div class="card-header">
    User Management
  </div>
  <div class="card-body">
  <table class="container-fluid justify-content-center table table-responsive-md shadow-md">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">IT Administrator</th>
            <th scope="col">Manager</th>
            <th scope="col">Technical Support</th>
            <th scope="col">User</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th class="py-3" scope="row">View</th>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th class="py-3" scope="row">Create</th>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th class="py-3" scope="row">Edit</th>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th class="py-3" scope="row">Delete</th>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
        </tbody>
    </table>
    
  </div>
</div>
  <br>
  <br> 

<div class="card shadow-sm" style="width: 60%;">
  <div class="card-header">
    Asset Management
  </div>
  <div class="card-body">
  <table class="container-fluid justify-content-center table table-responsive-md shadow-md">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">IT Administrator</th>
            <th scope="col">Manager</th>
            <th scope="col">Technical Support</th>
            <th scope="col">User</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th class="py-3" scope="row">View</th>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th class="py-3" scope="row">Create</th>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th class="py-3" scope="row">Edit</th>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th class="py-3" scope="row">Delete</th>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td class="px-5"><i class="fa fa-check text-primary" aria-hidden="true"></i></td>
            <td></td>
            <td></td>
            </tr>
        </tbody>
    </table>
    
  </div>
</div>
<br>
<br>

   
 </div>

 @endsection

    

    