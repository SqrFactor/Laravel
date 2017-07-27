@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Change Setting
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('setting.update') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Setting Website">Website Name</label>
                    <input type="text" class="form-control" value="{{$settings->site_name}}" name="SettingInputName">
                </div>
                <div class="form-group">
                    <label for="Setting Address">Contact Address</label>
                    <input type="text" class="form-control" value="{{$settings->address}}" name="SettingInputAddress">
                </div>
                <div class="form-group">
                    <label for="Setting Email">Contact Email</label>
                    <input type="text" class="form-control" value="{{$settings->contact_email}}" name="SettingInputEmail">
                </div>
                <div class="form-group">
                    <label for="Setting Email">Contact Number</label>
                    <input type="text" class="form-control" value="{{$settings->contact_number}}" name="SettingInputNumber">
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Save Setting </button>
                </div>
            </form>
        </div>
         

    </div>


@stop