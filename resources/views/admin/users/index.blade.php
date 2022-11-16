<!--This is the main user management page view which shows the users table-->
@extends('layout.app')

@section('content')

<div id="mainPage" class="mb-5 px-0 py-5 mt-5 mainPageExpanded" >

<div class="d-sm-flex mb-4"> 
<h3>Current Users</h3> 
</div>
<div>
<!-- create user button -->
    <a data-toggle="modal" id="userButton" data-target="#userModal" data-attr="{{ route('users.create')}}" data-original-title="create" class="btn btn-success btn-md mx-2 py-1" role="button">Create User</a>


<!--datatables user table--> 
    <div class="container row pt-2">
        <div class="col">
            <table class="table dt-responsive table-striped user_datatable shadow-sm" style="width:100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th width="100px py-0 px-3">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for creating and editing users. Dynamically loads create and edit forms -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog bg-light modal-user modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-secondary btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="userBody">
      </div>
      <div class="row mb-5 mx-3">
        <div class="d-flex justify-content-right ml-5 align-items-right">
            <button type="button" class="btn btn-outline-secondary btn-md btnCancel" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
// AJAX call to populate datatable
$(function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    let table = $('.user_datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'username', name: 'username'},
            {data: 'email', name: 'email'},
            {data: 'department', name: 'department'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


//Ajax call to load the create user modal
  $(document).on('click', '#userButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                success: function(result) {
                    $('#userModal').modal("show");
                    $('#userBody').html(result).show();
                    
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
                
            })
        });
//Call to load edit user modal        
        $(document).on('click', '.editUser', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                success: function(result) {
                    $('#userModal').modal("show");
                    $('#userBody').html(result).show();
                    
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    
                },
                timeout: 8000

            })
        });
 //Calls to remove modal backdrop when cancel button and close(x) icon buttton is clicked in the modal       
    $(document).ready(function(){
        $('.btnCancel').click(function(){
            $(".modal-backdrop").remove();
        });
    });

    $(document).ready(function(){
        $('.btn-close').click(function(){
            $(".modal-backdrop").remove();
        });
    });
 //Ajax call to delete user when delete button is click       
    $('body').on('click','.deleteUser', function(){
        let user_id = $(this).data("id");
        let token = $("meta[name='csrf-token']").attr("content");
        if(confirm("Are you sure you want to delete this user?")==true){
            $.ajax({
            type:"post",
            url: "{{ route('users.store') }}"+'/'+user_id,
            data: {
                _token: token,
                _method: 'DELETE',
                id: user_id,
            },

            success:function(data){
                table.draw();
                swal.fire("User Deleted");
                
            }
            
        })
        } 
    });
});

</script>
@endsection

