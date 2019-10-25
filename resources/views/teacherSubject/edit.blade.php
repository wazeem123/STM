@extends('layouts.master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"> Grade /subject  </h3>
    </div>
    <div class="panel-body">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <form action ="{{route('teacherSubject.update',$teacherSubjects->id)}}" method ="post">
                    <input type="hidden" name="_method" value="put">
                         {{csrf_field()}}
                        <div class="form-group {{ $errors->has('teaId') ? 'has-error' : '' }}">
                            <label for = 'teaid'> Teacher ID </label>
                            <select name="teaid" id="teaid" class="form-control">   
                                @foreach($teacher as $t=>$te )
                                    @if($te==$teacherSubjects->teacher_id)
                                        <option value="{{$te}}" selected>{{$t}}</option>
                                    @else
                                        <option value="{{$te}}">{{$t}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('teaId') }}</span>
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('sec') ? 'has-error' : '' }}">
                            <label for = 'sec'> Section </label>
                            {{-- <select name="sec" id="sec" class="form-control">
                                <option value="Al">Al</option>
                                <option value="OL">OL</option>
                                <option value="B">B</option>
                            </select>  --}}
                            <input type ="text" name ="sec" id="sec" value ="{{$teacherSubjects->section}}" class="form-control">
                            <span class="text-danger">{{ $errors->first('sec') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('subid') ? 'has-error' : '' }}">
                            <label for = 'subId'> Subject ID </label>
                            <select name="subid" id="subid" class="form-control">   
                                @foreach($subject as $k=>$v )
                                    @if($v==$teacherSubjects->subject_id)
                                    <option value="{{$v}}" selected>{{$k}}</option>
                                    @else
                                    <option value="{{$v}}">{{$k}}</option>
                                    @endif

                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('subid') }}</span>
                        </div>
                        </div>
                        <div class ="col-md-6">
                            <div class="form-group {{ $errors->has('medi') ? 'has-error' : '' }}">
                                <label for = 'medium'> Medium </label>    
                                <input type ="text" name ="medi" id="medi" class="form-control" value ="{{$teacherSubjects->medium}}">
                                <span class="text-danger">{{ $errors->first('medi') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i>   Save
                    </button>
                </div>
            </div>                        
                        </form>
            <div class="col-md-6">
                <div class="form-group">
                    <form action="{{route('teacherSubject.index')}}">
                        <button type="submit"  class="btn btn-primary">
                            <i class="fa fa-long-arrow-left"></i> Back
                        </button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection