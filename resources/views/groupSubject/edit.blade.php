@extends('layouts.master')
@section('content')
<h3 class="page-title">Tables</h3>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"> GroupSubject  </h3>
        </div>
			<div class="panel-body">
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
                            <form action ="{{route('groupSubject.update',$groupSubject->id)}}" method ="post">
                            <input type="hidden" name="_method" value="put">
                            {{csrf_field()}}
   
                            <div class="form-group {{ $errors->has('gid') ? 'has-error' : '' }}">
                                <label for = 'gid'> Group </label>
                                <select name="gid" id="gid" class="form-control" >   
                                    @foreach($group as $g=>$gr )
                                        @if($gr== $groupSubject->group_id)
                                            <option value="{{$gr}}" selected>{{$g}}</option>
                                        @else
                                            <option value="{{$gr}}">{{$g}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('gid') }}</span>
                            </div>
                        </div>    
						<div class="col-md-6">
                            <div class="form-group {{ $errors->has('subid') ? 'has-error' : '' }}">
                                <label for = 'subid'> Subject Id </label>
                                <select name="subid" id="subid" class="form-control" >   
                                    @foreach($subject as $s=>$sub )
                                        @if($sub== $groupSubject->subject_id)
                                            <option value="{{$sub}}" selected>{{$s}}</option>
                                        @else
                                            <option value="{{$sub}}">{{$s}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('subid') }}</span>
                            </div>
                        </div>
                    </div>
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
    
    
@endsection