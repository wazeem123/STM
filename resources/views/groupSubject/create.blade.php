@extends('layouts.master')
@section('content')
<h3 class="page-title">Tables</h3>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"> Grade 6 </h3>
        </div>
        <div class="panel-body">
            <div class="box-body"> 
                <form action ="{{route('groupSubject.store')}}" method ="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group {{ $errors->has('gid') ? 'has-error' : '' }}">
                                <label for = 'gid'> Group  </label>
                                <select name ="gid" id="gid" class="form-control">
                                   <option value=""> select the group </option>
                                    @foreach($group as $g=>$gi)
                                        <option value="{{$gi}}">{{$g}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('gid') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group {{ $errors->has('subid') ? 'has-error' : '' }}">
                                <label for = 'subid'> Subject  </label>
                                <select name ="subid" id="subid" class="form-control">
                                   <option value=""> select the subject</option>
                                    @foreach($subject as $s=>$su)
                                        <option value="{{$su}}">{{$s}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('subid') }}</span>
                            </div>
                        </div>
                    </div>
                <div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check-circle"></i> Save
                            </button>
                        </div>
                    </div>
                </form>
                <div class="col-md-6">
                        <div class="form-group">
                            <form action="{{route('groupSubject.index')}}">
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

    @endsection