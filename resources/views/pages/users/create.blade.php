@extends('layouts/contentLayoutMaster')

@section('title', trans('locale.user.create'))

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('page-style')

@endsection

@section('content')
  @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">There were some problems with your input</h4>
      @foreach ($errors->all() as $error)
        <i class="feather icon-info ml-2 align-middle"></i>
        <span class="mb-0 text-white-50">
          {{ $error }}
        </span>
        <p></p>
      @endforeach
    </div>
  @endif

  <div class="card">
    <div class="card-content">
      <div class="card-body card-dashboard">
        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Name:</strong>
              {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Email:</strong>
              {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Password:</strong>
              {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Confirm Password:</strong>
              {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Role:</strong>
              {!! Form::select('roles[]', $roles,[], array('class' => 'form-control select2')) !!}
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{ trans('locale.user.save') }}</button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@endsection

@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
  <script src="{{ asset(mix('js/scripts/pages/scrap-image.js')) }}"></script>
@endsection
