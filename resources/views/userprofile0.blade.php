@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>{{ __('Edit User Profile') }}</h1>
            <form action="/userprofile" method="post">
                @if ($errors->any())
                    info('form submit error')
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">{{ __('User Title') }}</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', $title) }}">
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">{{ __('User Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $name) }}">
                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('hospital') ? ' has-error' : '' }}">
                    <label for="hospital">{{ __('User Company/Hospital') }}</label>
                    <textarea class="form-control" id="hospital" name="hospital" placeholder="Hospital">{{ old('hospital', $hospital) }}</textarea>
                    @if($errors->has('hospital'))
                        <span class="help-block">{{ $errors->first('hospital') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address">{{ __('User Address') }}</label>
                    <textarea class="form-control" id="address" name="address" placeholder="Address">{{ old('address', $address) }}</textarea>
                    @if($errors->has('address'))
                        <span class="help-block">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                    <label for="remark">{{ __('User Remark') }}</label>
                    <textarea class="form-control" id="remark" name="remark" placeholder="Remark">{{ old('remark', $remark) }}</textarea>
                    @if($errors->has('remark'))
                        <span class="help-block">{{ $errors->first('remark') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">{{ __('User Submit') }}</button>
            </form>
        </div>
    </div>
@endsection
