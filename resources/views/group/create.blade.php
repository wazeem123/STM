@extends('layouts.master')
@section('content')<!DOCTYPE html>
    <form action ="{{route('group.store')}}" method ="post">
    {{csrf_field()}}
    <h3 class="page-title">Tables</h3>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"> Teacher </h3>
            </div>
            <div class="panel-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('group') ? 'has-error' : '' }}">
                                <label for = 'group'> Group Name </label>
                                <input type ="text" name ="group" id="group"autofocus placeholder = "Enter the group name " class="form-control"><br><br>
                                <span class="text-danger">{{ $errors->first('group') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button><br><br>
                            </div>
                        </div>
    </form>
                        <div class="col-md-6">
                            <div class="form-group">
                                <form action="{{route('group.index')}}">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-long-arrow-left"></i> Back
                                    </button>
                                </form>
                            </div>
                         </div>
                    </div>
            </div>
        </div>    
    <!-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
    @endif     -->
@endsection