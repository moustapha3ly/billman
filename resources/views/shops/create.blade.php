@extends('layouts.master')

@section('content')
@include('includes.message')

	<h1>add shop</h1>
	
@if(isset($shop))


{!! Form::open(['route' => ['shop.update', $shop->id],  'method' => 'POST','files'=> true]) !!}
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('name', 'name :') !!}
			{!! Form::text('name', $shop->name, ['class'=>'form-control']) !!}
			@if ($errors->has('name'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('name') }}</strong>
				</span>
			@endif
            <input type="hidden" name="id" value="{{$shop->id}}">
		</div>	
		
		<div class="form-group col-sm-6">
			{!! Form::label('email', 'Email :') !!}
			{!! Form::text('email', $shop->email, ['class'=>'form-control']) !!}
			@if ($errors->has('email'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('email') }}</strong>
				</span>
			@endif
        </div>	
		<div class="form-group col-sm-6">
			{!! Form::label('website', 'website :') !!}
			{!! Form::text('website', $shop->website, ['class'=>'form-control']) !!}
			@if ($errors->has('website'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('website') }}</strong>
				</span>
			@endif
        </div>	
	
		<div class="form-group col-sm-6">
			{!! Form::label('logo', 'logo :') !!}
			<input type="file" name="logo" class="form-control" id="logo">
			@if ($errors->has('logo'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('logo') }}</strong>
				</span>
			@endif
        </div>	
		<div class="form-group col-sm-6"></div>
		<div class="form-group col-sm-6">
		<img src="{{ storage_path($shop->logo)}}" class=" w3-border w3-padding" alt="" width="100px" height="100">
        </div>	
	</div>
	

	
	<div class="row form-group ">
		<div class="col-sm-2">
			{!! Form::submit('update', ['class'=>'btn btn-primary col-sm-12']) !!}
	
		</div>

	{!! Form::close() !!}


    </div>
    @else
	{!! Form::open(['method'=>'POST', 'action'=>'ShopController@store','files'=> true]) !!}
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
	
		<div class="form-group col-sm-6">
			{!! Form::label('email', 'email :') !!}
			{!! Form::text('email', null, ['class'=>'form-control']) !!}
			@if ($errors->has('email'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>	
		
			
		<div class="form-group col-sm-6">
			{!! Form::label('website', 'website :') !!}
			{!! Form::text('website', null, ['class'=>'form-control']) !!}
			@if ($errors->has('website'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('website') }}</strong>
				</span>
			@endif
		</div>	
		<div class="form-group col-sm-6">
			{!! Form::label('logo', 'logo :') !!}
			<input type="file" name="logo" class="form-control" id="logo">
			@if ($errors->has('logo'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('logo') }}</strong>
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