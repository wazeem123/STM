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
                    <form action ="{{route('period.update',$period->id)}}" method ="post">
                    <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                    <div class="form-group {{ $errors->has('day') ? 'has-error' : '' }}">
                        <label for = 'day'> Day </label>
                        {{-- <select name="day" id="day" class="form-control">   
                                @foreach($day as $p=>$pe )
                                    @if($pe==$period->day)
                                        <option value="{{$pe}}" selected>{{$p}}</option>
                                    @else
                                        <option value="{{$pe}}">{{$p}}</option>
                                    @endif
                                @endforeach
                            </select> --}}
                        <input type ="text" name ="day" id="day" value = "{{$period->day}}"  class="form-control" ><br><br>
                        <span class="text-danger">{{ $errors->first('day') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('pcode') ? 'has-error' : '' }}">
                        <label for = 'pcode'> Period </label>
                        <input type ="text" name ="pcode" id="pcode" value = "{{$period->periodCode}}" class="form-control"><br><br>
                        <span class="text-danger">{{ $errors->first('pcode') }}</span>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('stime') ? 'has-error' : '' }}">
                        <label for = 'stime'> Start Time </label>
                        <input type ="text" name ="stime" id="stime" value = "{{$period->startTime}}" class="form-control"><br><br>
                        <span class="text-danger">{{ $errors->first('stime') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('etime') ? 'has-error' : '' }}">
                        <label for = 'etime'> End time </label>
                        <input type ="text" name ="etime" id="etime" value = "{{$period->endTime}}" class="form-control"><br><br>
                        <span class="text-danger">{{ $errors->first('etime') }}</span>
                    </div>
                </div>
            </div> --}}
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
                        <form action="{{route('period.index')}}">
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