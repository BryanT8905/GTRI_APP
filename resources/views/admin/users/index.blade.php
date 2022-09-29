<!--This is the main user managemnt page view which shows the users table-->
@extends('layout.app')

@section('content')

    <div class="pt-5 pb-5 align-items-center justify-content-center d-flex" style= "width: 40%;">
    <!-- create user button -->
    <a href="{{ route('users.create')}}" class="btn btn-info float-start" role="button">Create User</a>  
    </div>
    
    <!-- create table -->
    <div class=" container align-items-center justify-content-center d-flex ">
        <table style= "width: 100%;" class="table table-striped table-responsive-lg ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">User_Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <!-- add mySQL data to table -->
                @foreach($users as $user)
                 <tr>
                    <th scope="row" >{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info" role="button">Edit</a>
                    </td>
                    
                    <!--delete user, confirm before delete-->
                    <td class="col-lg-1">
                        <button class="btn btn-sm btn-danger btn-danger btn-flat show_confirm" data-toggle="tooltip" 
                        onclick="confirm('Are you sure you want to remove the user from this group?') || e.stopImmediatePropagation(); 
                        document.getElementById('delete-user-{{$user->id}}').submit()">Delete</button>
                            <form id="delete-user-{{$user->id}}" action="{{ route('users.destroy', $user->id)}}" method="POST"
                                style="display:none">
                                @csrf
                                @method("DELETE")
                               
                            </form>
                        </td>
                    </tr>
                 @endforeach
            </tbody>
        </table>

        </div>
        <div class="pt-5 pb-5 align-items-center justify-content-center w-100 d-flex">
         <!--pagination -->
        {{ $users->links() }}
        </div>
       
     
@endsection

