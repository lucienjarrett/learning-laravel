@if ($errors->any())
	<ul class="alert alert-danger" style="margin-top:20px">
		@foreach($errors->all() as $error)
		<li> {{ $error }}</li>
		@endforeach 
	</ul>
	
@endif 	