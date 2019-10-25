@extends('layouts.master')
@section('content')
<h3 class="page-title">Tables</h3>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"> Grade  </h3>
        </div>
			<div class="panel-body">
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
                                <form action ="{{route('grade.update',$grade->id)}}" method ="post">
                                <input type="hidden" name="_method" value="put">
                                {{csrf_field()}}
                               
                            <div class="form-group {{ $errors->has('orderNo') ? 'has-error' : '' }}">
                                <label for = 'gradeName'> Grade </label>
                                <input type ="text" name ="gradeName" id="gradeName" value ="{{$grade->gradeName}}" class="form-control">
                                <span class="text-danger">{{ $errors->first('gradeName') }}</span>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group {{ $errors->has('section') ? 'has-error' : '' }}">
                                <label for = 'section'> Section </label>
                                <input type ="text" name ="section" id="section"  placeholder = "Enter the section of grade " class="form-control"><br><br>   
                                <span class="text-danger">{{ $errors->first('section') }}</span>
                            </div> 
                        </div>
                    </div>
                </div>
                {{-- <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="form-group {{ $errors->has('orderNo') ? 'has-error' : '' }}">
                                <label for = 'orderNo'> Order Number </label>
                                <input type ="text" name ="orderNo" id="orderNo"  placeholder = "Enter the order of grade " class="form-control"><br><br>   
                                <span class="text-danger">{{ $errors->first('orderNo') }}</span>
                            </div>
                        </div>
                     </div>
                    </div> --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submiit" class="btn btn-success">
                                <i class="fa fa-plus"></i>      Save
                            </button>
                        </div>
                    </div>
    </form>
                     <div class="col-md-6">
                        <div class="form-group">
                            <form action="{{route('grade.index')}}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-long-arrow-left"></i> Back
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    @endsection