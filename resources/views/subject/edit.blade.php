@extends('layouts.master')
@section('content')
<h3 class="page-title">Tables</h3>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"> Subjects </h3>
    </div>
    <div class="panel-body">
        <div class="box-body">
        <!-- @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif -->
            <div class="row">
                <div class="col-md-6">
                    <!-- <div class="form-group"> -->
                        <form action ="{{route('subject.update',$subject->id)}}" method ="post">
                        <input type="hidden" name="_method" value="put">
                        {{csrf_field()}}
                        
                    <div class="form-group {{ $errors->has('subcode') ? 'has-error' : '' }}">
                        <label for = 'subcode'> Subject Code </label>
                        <input type ="text" name ="subcode" id="subcode" value= "{{$subject->subjectCode}}" class="form-control">
                        <span class="text-danger">{{ $errors->first('subcode') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- <div class="form-group"> -->
                    <div class="form-group {{ $errors->has('subna') ? 'has-error' : '' }}">
                        <label for = 'subna'> Subject Name </label>
                        <input type ="text" name ="subna" id="subna" value= "{{$subject->subjectName}}" class="form-control">
                        <span class="text-danger">{{ $errors->first('subna') }}</span>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                    <!-- <div class="form-group"> -->
                    <div class="form-group {{ $errors->has('gid') ? 'has-error' : '' }}">
                        <label for = 'gid'> Group Id </label>
                        <input type ="text" name ="gid" id="gid" value= "{{$subject->group_id}}" class="form-control">
                        <span class="text-danger">{{ $errors->first('gid') }}</span>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submiit" class="btn btn-success">
                            <i class="fa fa-plus"></i>    Save
                        </button> 
                    </div>
                </div>
                
                        
                        </form>

                <div class="col-md-6">
                    <div class="form-group">
                        <form action="{{route('subject.index')}}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-long-arrow-left"></i> Back
                            </button>
                        </form>

                    </div>
                </div>
            </div>
    </div>
@endsection