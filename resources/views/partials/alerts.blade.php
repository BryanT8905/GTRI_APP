<!--sweetAlert success flash message-->
@if(Session::has('success'))
  <script type="text/javascript">
     Swal.fire({
         title:'Success!',
         text:"{{Session::get('success')}}",
         timer:5000,
         type:'success'
     }).then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
 @endif
