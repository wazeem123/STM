@extends('layouts.master')
@section('content')
<h3 class="page-title">Tables</h3>
    <div class="panel">
        <div class="panel-heading">
        <h3 class="panel-title"> Teacher </h3>
        </div>
        <div class="panel-body">
            <div class="box-body">
                {{--  @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif   --}}
                <form action ="{{route('teacher.store')}}" method ="post">    
                    {{csrf_field()}}                
                              
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <div class="form-group {{ $errors->has('teana') ? 'has-error' : '' }}">
                            <label for = 'teana'>  Teacher name </label>
                            <input type ="text" name ="teana" id="teana" autofocus placeholder = "Enter the teacher name " class="form-control">
                            <span class="text-danger">{{ $errors->first('teana') }}</span>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group {{ $errors->has('teacherCode') ? 'has-error' : '' }}">
                                <label for = 'teacherCode'>  Teacher code </label>
                                <input type ="text" name ="teacherCode" id="teacherCode" autofocus placeholder = "Enter the teacher code " class="form-control">
                                <span class="text-danger">{{ $errors->first('teacherCode') }}</span>
                                </div>
                            </div>
                            </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <form action ="{{route('teacher.store')}}" method ="post">    
                            {{csrf_field()}}        
                                <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button><br><br>
                            </form>
                        </div>
                    </div>
                
                    <div class="col-md-4">
                        <div class="form-group">
                            <form action="{{route('teacher.index')}}">
                            <button type="submit"  class="btn btn-primary">
                                <i class="fa fa-long-arrow-left"></i> Back
                            </button>
                            </form>   
                            
                        </div>
                    </div>
                    
                    
                </div>  
                </div> 
                
            </div>
        </div>  

   
@endsection