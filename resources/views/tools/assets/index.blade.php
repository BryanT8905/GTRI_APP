
@extends('layout.app')

@section('content')

<div id="mainPage" class="mb-5 px-0 py-5 mt-5 mainPageExpanded" >

<div class="d-sm-flex mb-4"> 
<h3>Manage Assets</h3> 
</div>
<div>
<!-- create asset button -->
    <a data-toggle="modal" id="assetButton" data-target="#assetModal" data-attr="{{ route('assets.create')}}" data-original-title="create" class="btn btn-success btn-md mx-2 py-1" role="button">Create Asset</a>


<!--datatables user table--> 
    <div class="container row pt-2">
        <div class="col">
            <table class="table dt-responsive table-striped asset_datatable shadow-sm" style="width:100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Manufacturer</th>
                        <th>Serial No.</th>
                        <th>Category</th>
                        <th>EOL</th>
                        <th>Location</th>
                        <th width="100px py-0 px-3">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
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
    let table = $('.asset_datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('assets.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'manufacturer', name: 'manufacturer'},
            {data: 'serial_no', name: 'serial_no'},
            {data: 'category', name: 'category'},
            {data: 'eol', name: 'eol'},
            {data: 'location', name: 'location'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


//Ajax call to load the create user modal
  $(document).on('click', '#assetButton', function(event) {
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
    $('body').on('click','.deleteAsset', function(){
        let asset_id = $(this).data("id");
        let token = $("meta[name='csrf-token']").attr("content");
        if(confirm("Are you sure you want to delete the asset?")==true){
            $.ajax({
            type:"post",
            url: "{{ route('assets.store') }}"+'/'+asset_id,
            data: {
                _token: token,
                _method: 'DELETE',
                id: asset_id,
            },

            success:function(data){
                table.draw();
                swal.fire("Asset Deleted");
                
            }
            
        })
        } 
    });
});

</script>
@endsection

