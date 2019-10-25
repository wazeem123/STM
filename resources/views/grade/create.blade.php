@extends('layouts.master')
@section('content')

    <form action ="{{route('grade.store')}}" method ="post">
    {{csrf_field()}}
    <h3 class="page-title">Tables</h3>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"> Grade </h3>
            </div>
            <div class="panel-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="form-group {{ $errors->has('gradeName') ? 'has-error' : '' }}">
                                    <label for = 'gradeName'> Grade </label>
                                    <input type ="text" name ="gradeName" id="gradeName" autofocus placeholder = "Enter the grade " class="form-control"><br><br>   
                         	        <span class="text-danger">{{ $errors->first('gradeName') }}</span>
			                	</div>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
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
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button><br><br>
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