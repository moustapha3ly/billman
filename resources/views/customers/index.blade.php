@extends('layouts.master')

@section('content')

	@include('includes.message')

	<h1>customers</h1>
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
				        <th>First Name</th>
				        <th>Last Name</th>
				        <th>Shop</th>
				        <th>Email</th>
				        <th>Phone</th>
				        <th>website</th>
				      </tr>
				    </thead>
				    <tbody>
						@foreach($customers as $customer)
						  <tr>
						  <td>{{$customer->id}}</td>
							<td style="display: flex;"><a class="btn  btn-primary" href="{{route('customer.edit', $customer->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
							
							{!! Form::open(['method'=>'DELETE', 'action'=>['CustomerController@destroy', $customer->id]]) !!}
							
							{!! Form::submit('X',['class'=>'btn  btn-danger ']) !!}	
							{!! Form::close() !!}
							</td>
							<td>{{$customer->firstname}}</td>
							<td>{{$customer->lastname}}</td>
							<td>{{$customer->name}}</td>
							<td>{{$customer->email}}</td>
							<td>{{$customer->phone}}</td>
							<td>{{$customer->website}}</td>
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

