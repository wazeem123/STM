@extends('layouts.master')
@section('content')
    <form action ="{{route('period.store')}}" method ="post">
    {{csrf_field()}}
    <h3 class="page-title">Tables</h3>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"> Period </h3>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for = 'day'> Day </label>    
                                    <select name="day" id="day" class="form-control">
                                        <option value="">select the day</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('pcode') ? 'has-error' : '' }}">
                                            <div class="form-group">
                                    <label for = 'pcode'> Period </label>    
                                    <input type ="text" name ="pcode" id="pcode" placeholder = "type the period code (Mon-1)" class="form-control">
                                    <span class="text-danger">{{ $errors->first('pcode') }}</span>
                                    
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for = 'stime'> Start Time </label>
                                    <input type ="text" name ="stime" id="stime" placeholder = "type the start time" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for = 'etime'> End Time </label>
                                    <input type ="text" name ="etime" id="etime" placeholder = "type the end time" class="form-control">
                                </div>
                            </div>
                        </div> --}}
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
                                <form action="{{route('period.index')}}">
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