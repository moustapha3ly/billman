@extends('layouts.master')

@section('content')
@include('includes.message')

	<h1>add company</h1>
@if(isset($company))


{!! Form::open(['route' => ['company.update', $company->id],  'method' => 'POST']) !!}
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('name', 'name :') !!}
			{!! Form::text('name', $company->name, ['class'=>'form-control']) !!}
			@if ($errors->has('name'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('name') }}</strong>
				</span>
			@endif
            <input type="hidden" name="id" value="{{$company->id}}">
		</div>	

	</div>
	

	
	<div class="row form-group ">
		<div class="col-sm-2">
			{!! Form::submit('update', ['class'=>'btn btn-primary col-sm-12']) !!}
	
		</div>

	{!! Form::close() !!}


    </div>
    @else
	{!! Form::open(['method'=>'POST', 'action'=>'CompanyController@store']) !!}
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('name', 'name :') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
			@if ($errors->has('name'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>	

	</div>
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::submit('save', ['class'=>'btn btn-primary col-sm-3']) !!}
	
		</div>
	</div>

	{!! Form::close() !!}
@endif
@stop