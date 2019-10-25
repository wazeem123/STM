@extends('layouts.master')
@section('content')

    <form action ="{{route('gradeSubject.store')}}" method ="post">
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
                            <div class="form-group">
                                <div class="form-group {{ $errors->has('grade_id') ? 'has-error' : '' }}">
                                    <label for = 'grade_id'>  Grade </label>
                                    <select name="grade_id" id="grade_id" class="form-control" >  
                                        <option value="">select the grade</option>
                                        @foreach($grade as $g=>$gr )            
                                            <option value="{{$gr}}">{{$g}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('grade_id') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group {{ $errors->has('subject_id') ? 'has-error' : '' }}">
                                    <label for = 'subject_id'>  subject code</label>
                                    <select name="subject_id" id="subject_id" class="form-control">
                                        <option value="">select the subject code</option>
                                        @foreach($subject as $k=>$v )
                                            <option value="{{$v}}">{{$k}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('subject_id') }}</span>
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
                            <form action="{{route('gradeSubject.index')}}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-long-arrow-left"></i> Back
                                </button>
                            </form>
                        </div>
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
    @endif -->
@endsection