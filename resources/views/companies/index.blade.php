@extends('layouts.master')

@section('content')

	@include('includes.message')

	<h1>Companies</h1>
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
				      </tr>
				    </thead>
				    <tbody>
						@foreach($companies as $company)
						  <tr>
						  <td>{{$company->id}}</td>
							<td style="display: flex;"><a class="btn  btn-primary" href="{{route('company.edit', $company->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
							
							{!! Form::open(['method'=>'DELETE', 'action'=>['CompanyController@destroy', $company->id]]) !!}
							
							{!! Form::submit('X',['class'=>'btn  btn-danger ']) !!}	
							{!! Form::close() !!}
							</td>
							<td>{{$company->name}}</td>
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

