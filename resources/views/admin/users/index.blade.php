<!--This is the main user managemnt page view which shows the users table-->
@extends('layout.app')

@section('content')

<!-- Button trigger modal -->



    
<div class="pt-5 pb-5 align-items-center justify-content-center d-flex" style= "width: 40%;">  
</div>
<div class="container">
<!-- create user button -->

<a data-toggle="modal" id="userButton" data-target="#userModal" data-attr="{{ route('users.create')}}" title="create" class="btn btn-success " role="button">Create User</a>  

</button> 
    <div class="row pt-5">
        <div class="col-12">
            <table class="table dt-responsive table-striped user_datatable ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-user modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
      </div>
      <div class="modal-body" id="userBody">
      </div>
    </div>
  </div>
</div>

<!-- AJAX calls to populate datatable and delete user -->
<script type="text/javascript">
  $(function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    let table = $('.user_datatable').DataTable({
        responsive:true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'username', name: 'username'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  $(document).on('click', '#userButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#userModal').modal("show");
                    $('#userBody').html(result).show();
                    
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
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
                
            }
            
        })
        } 
    });
});  
</script>
@endsection

