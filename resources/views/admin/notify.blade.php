@if(Session::get('success'))
<div class="alert alert-success mt-2 alert-dismissible" data-dismiss="alert">
	<a href="" data-dismiss="alert" class="close">&times;</a>
    {{Session::get('success')}}
</div> 
@endif
@if(Session::get('delete'))
<div class="alert alert-danger mt-2 alert-dismissible" data-dismiss="alert">
	<a href="" data-dismiss="alert" class="close">&times;</a>
    {{Session::get('delete')}}
</div> 
@endif