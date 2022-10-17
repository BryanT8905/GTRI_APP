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


<script>
    $(function () { 
        //Call to load edit user modal        
        $(document).on('click', '#profileButton', function(event) {
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
            $('.cancelBtn').click(function(){
                $("modal-backdrop").remove();
            });
        });

        $(document).ready(function(){
            $('.closeBtn').click(function(){
                $("modal-backdrop").hide();
            });
        });
    });   
    </script>