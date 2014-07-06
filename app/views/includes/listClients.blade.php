 <br />
	<p>	Seleccione un cliente <br />
	...
	</p> 
	@foreach($clients as $client) 
	<div class="row circle">
		<div>
			<a href="{{ url('users/executive/status/'.$client->id) }}">
				{{ HTML::image("img/plus-img.png", $client->name , array('class' => 'img-circle grey-cicle')) }} 
			</a> 
		</div>
		{{ $client->name }} 
	</div> 
	@endforeach  
<br />  