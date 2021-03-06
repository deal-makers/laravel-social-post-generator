@extends('layouts/contentLayoutMaster')

@section('title', trans('locale.user.title'))

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
@endsection
@section('page-style')

@endsection

@section('content')
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
  <section id="horizontal-vertical">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}">{{ trans('locale.user.create') }}</a>
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table class="table nowrap scroll-horizontal-vertical" width="100%">
                  <thead>
                  <tr>
                    <th width="10%">#</th>
                    <th width="20%">@lang('locale.user.field.name')</th>
                    <th width="20%">@lang('locale.user.field.email')</th>
                    <th width="10%">@lang('locale.user.field.role')</th>
                    <th width="10%">@lang('locale.user.status.title')</th>
                    <th width="30%">@lang('locale.Actions')</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($data as $key => $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-info">{{ $v }}</label>
                          @endforeach
                        @endif
                      </td>
                      <td>
                        @if($user->status == "activated")
                          <span class="badge badge-success">{{ trans('locale.user.status.activate') }}</span>
                        @else
                          <span class="badge badge-warning">{{ trans('locale.user.status.deactivate') }}</span>
                        @endif
                      </td>
                      <td>
                        @if($user->email != "admin@admin.com" && $user->id != 1)
                          <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">{{ trans('locale.user.edit') }}</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                          {!! Form::submit(trans('locale.user.delete'), ['class' => 'btn btn-danger btn-sm']) !!}
                          {!! Form::close() !!}
                        @endif
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
@endsection
@section('page-script')
  <script src="{{ asset(mix('js/scripts/pages/users/index.js')) }}"></script>
@endsection
