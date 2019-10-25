@extends('layouts.master')
@section('content')
<h3 class="page-title">Tables</h3>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"> Teacher  </h3>
        </div>
			<div class="panel-body">
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<!-- <div class="form-group"> -->
                                <form action ="{{route('teacher.update',$teacher->id)}}" method ="post">
                                <input type="hidden" name="_method" value="put">
                                {{csrf_field()}}
                                <div class="form-group {{ $errors->has('teana') ? 'has-error' : '' }}">
                                <label for = 'teana'> Teacher Name </label>
                                <input type ="text" name ="teana" id="teana" value ="{{$teacher->teacherName}}" class="form-control">
                                <span class="text-danger">{{ $errors->first('teana') }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
							<!-- <div class="form-group"> -->
                                <form action ="{{route('teacher.update',$teacher->id)}}" method ="post">
                                <input type="hidden" name="_method" value="put">
                                {{csrf_field()}}
                                <div class="form-group {{ $errors->has('teacherCode') ? 'has-error' : '' }}">
                                <label for = 'teana'> Teacher Code </label>
                                <input type ="text" name ="teacherCode" id="teacherCode" value ="{{$teacher->teacherCode}}" class="form-control">
                                <span class="text-danger">{{ $errors->first('teacherCode') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i>      Save
                                </button>
                            </div>
                        </div>
                            </form>
                        <div class="col-md-6">
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