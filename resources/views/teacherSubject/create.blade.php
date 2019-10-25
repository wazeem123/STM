@extends('layouts.master')
@section('content')
    <form action ="{{route('teacherSubject.store')}}" method ="post">
    {{csrf_field()}}
    <h3 class="page-title">Tables</h3>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"> Grade 6 </h3>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <div class="form-group {{ $errors->has('teaid') ? 'has-error' : '' }}">
                                    <label for = 'teaId'> Teacher   </label>
                                    <select name="teaid" id="teaid" class="form-control">   
                                    <option value="">select the teacher name</option>

                                        @foreach($teacher as $t=>$te )
                                            <option value="{{$te}}">{{$t}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('teaid') }}</span>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> 
                                <div class="form-group {{ $errors->has('sec') ? 'has-error' : '' }}">
                                    <label for = 'section'> Section  </label>
                                    <select name="sec" id="sec" class="form-control">
                                    <option value="">select the section</option>
                                    <option value="AL">AL</option>
                                    <option value="OL">OL</option>
                                    <option value="B">B</option>
                                    </select> 
                                    <span class="text-danger">{{ $errors->first('sec') }}</span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <div class="form-group {{ $errors->has('subid') ? 'has-error' : '' }}">
                                    <label for = 'subId'> Subjet   </label>
                                    <select name="subid" id="subid" class="form-control">   
                                    <option value="">select the subject</option>
                                        @foreach($subjects as $k=>$v )
                                            <option value="{{$v}}">{{$k}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('subid') }}</span>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <div class="form-group {{ $errors->has('medi') ? 'has-error' : '' }}">
                                    <label for = 'medium'> Medium Of Subject  </label>
                                    <select name="medi" id="medi" class="form-control">
                                    <option value="">select the medium</option>
                                    <option value="E">E</option>
                                    <option value="T">T</option>
                                    <option value="E/T">E/T</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('medi') }}</span>
                                 </div>   
                                </div>
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
                                <form action="{{route('teacherSubject.index')}}">
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