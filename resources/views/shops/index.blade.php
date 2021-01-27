@extends('layouts.master')

@section('content')

	@include('includes.message')

	<h1>shops</h1>
	<!-- Start .nav nav-tabs -->
	<div class="tab-content">
		<div role="tabpanel1" class="tab-pane fade in active" id="product">
			<br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
				    <thead>
				      <tr>
				        <th>id</th>
				        <th>action</th>
				        <th>name</th>
				        <th>email</th>
				        <th>logo</th>
				        <th>website</th>
				      </tr>
				    </thead>
				    <tbody>
						@foreach($shops as $shop)
						  <tr>
						  <td>{{$shop->id}}</td>
							<td style="display: flex;"><a class="btn  btn-primary" href="{{route('shop.edit', $shop->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
							
							{!! Form::open(['method'=>'DELETE', 'action'=>['ShopController@destroy', $shop->id]]) !!}
							
							{!! Form::submit('X',['class'=>'btn  btn-danger ']) !!}	
							{!! Form::close() !!}
							</td>
							<td>{{$shop->name}}</td>
							<td>{{$shop->email}}</td>
							<td>
							
							<img src="{{ asset('storage/'.$shop->logo)}}" class=" w3-border w3-padding" alt="" width="100px" height="100"></td>
							<td>{{$shop->website}}</td>
						  </tr>
						@endforeach
				    </tbody>
			  	</table>
		  	</div><!-- /.table-responsive -->
		</div><!-- /.tab-pane -->
    </div><!-- /.tab-pane -->
		<!-- / View Material -->
        
@stop

@section('scripts')
<script>
</script>
@stop

