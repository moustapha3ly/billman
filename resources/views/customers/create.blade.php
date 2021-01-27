@extends('layouts.master')

@section('content')
@include('includes.message')

	<h1>add customer</h1>
	
@if(isset($customer))


{!! Form::open(['route' => ['customer.update', $customer->id],  'method' => 'POST']) !!}
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('firstname', 'firstname :') !!}
			{!! Form::text('firstname', $customer->firstname, ['class'=>'form-control']) !!}
			@if ($errors->has('firstname'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('firstname') }}</strong>
				</span>
			@endif
            <input type="hidden" name="id" value="{{$customer->id}}">
		</div>	
		<div class="form-group col-sm-6">
			{!! Form::label('lastname', 'last name :') !!}
			{!! Form::text('lastname', $customer->lastname, ['class'=>'form-control']) !!}
			@if ($errors->has('lastname'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('lastname') }}</strong>
				</span>
			@endif
        </div>	
		<div class="form-group col-sm-6">
			{!! Form::label('email', 'Email :') !!}
			{!! Form::text('email', $customer->email, ['class'=>'form-control']) !!}
			@if ($errors->has('email'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('email') }}</strong>
				</span>
			@endif
        </div>	
		<div class="form-group col-sm-6">
			{!! Form::label('phone', 'Phone :') !!}
			{!! Form::text('phone', $customer->phone, ['class'=>'form-control']) !!}
			@if ($errors->has('phone'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('phone') }}</strong>
				</span>
			@endif
        </div>	
		<div class="form-group col-sm-6">
			{!! Form::label('shop', 'shop :') !!}
			<select name="shop" class="form-control" id="shop" required>
			@foreach($companies as $company)
			<option value="{{$company->id}}" <?php if($company->id==$customer->shop){echo 'selected';}?>>{{$company->name}}</option>
			@endforeach
			</select>
			@if ($errors->has('shop'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('shop') }}</strong>
				</span>
			@endif
			

			@if ($errors->has('shop'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('shop') }}</strong>
				</span>
			@endif
        </div>	
		<div class="form-group col-sm-6">
			{!! Form::label('website', 'website :') !!}
			{!! Form::text('website', $customer->website, ['class'=>'form-control']) !!}
			@if ($errors->has('website'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('website') }}</strong>
				</span>
			@endif
        </div>	
	</div>
	

	
	<div class="row form-group ">
		<div class="col-sm-2">
			{!! Form::submit('update', ['class'=>'btn btn-primary col-sm-12']) !!}
	
		</div>

	{!! Form::close() !!}


    </div>
    @else
	{!! Form::open(['method'=>'POST', 'action'=>'CustomerController@store']) !!}
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('firstname', 'firstname :') !!}
			{!! Form::text('firstname', null, ['class'=>'form-control']) !!}
			@if ($errors->has('firstname'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('firstname') }}</strong>
				</span>
			@endif
		</div>	
		<div class="form-group col-sm-6">
			{!! Form::label('lastname', 'lastname :') !!}
			{!! Form::text('lastname', null, ['class'=>'form-control']) !!}
			@if ($errors->has('lastname'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('lastname') }}</strong>
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
			{!! Form::label('phone', 'phone :') !!}
			{!! Form::text('phone', null, ['class'=>'form-control']) !!}
			@if ($errors->has('phone'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('phone') }}</strong>
				</span>
			@endif
		</div>	
		<div class="form-group col-sm-6">
			{!! Form::label('shop', 'shop :') !!}
			<select name="shop" class="form-control" id="shop" required>
			@foreach($companies as $company)
			<option value="{{$company->id}}">{{$company->name}}</option>
			@endforeach
			</select>
			@if ($errors->has('shop'))
				<span class="help-block ">
					<strong class="text-danger">{{ $errors->first('shop') }}</strong>
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
	</div>
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::submit('save', ['class'=>'btn btn-primary col-sm-3']) !!}
	
		</div>
	</div>

	{!! Form::close() !!}
@endif
@stop