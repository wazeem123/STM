@extends('layouts.master')
@section('content')
<h3 class="page-title">Tables</h3>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"> Grade /subject  </h3>
        </div>
			<div class="panel-body">
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
                                <form action ="{{route('gradeSubject.update',$gradeSubject->id)}}" method ="post">
                                <input type="hidden" name="_method" value="put">
                                {{csrf_field()}}

                                <div class="form-group {{ $errors->has('grade_id') ? 'has-error' : '' }}">
                                <label for = 'grade_id'>  Grade </label>
                                <!-- <input type ="text" name ="grade_id" id="grade_id" autofocus placeholder = "Enter the grade " class="form-control"> -->
                                <select name="grade_id" id="grade_id" class="form-control" >   
                                    @foreach($grade as $g=>$gs )
                                        @if($gs== $gradeSubject->grade_id)
                                            <option value="{{$gs}}" selected>{{$g}}</option>
                                        @else
                                            <option value="{{$gs}}">{{$g}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('grade_id') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('subid') ? 'has-error' : '' }}">
                            <label for = 'subject_id'>  subject </label>
                                    <!-- <input type ="text" name ="subject_id" id="subject_id" autofocus placeholder = "Enter the grade " class="form-control"><br><br> -->
                     
                                    <select name="subject_id" id="subject_id" class="form-control" >   
                                    @foreach($subject as $s=>$sub )
                                        @if($sub== $gradeSubject->subject_id)
                                            <option value="{{$sub}}" selected>{{$s}}</option>
                                        @else
                                            <option value="{{$sub}}">{{$s}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('subject_id') }}</span>

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
                            <form action="{{route('gradeSubject.index')}}">
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