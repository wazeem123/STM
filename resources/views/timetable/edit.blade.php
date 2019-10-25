@extends('layouts.master')
@section('content')
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
                                <form action ="{{route('timetable.update',$timetable->id)}}" method ="post">
                                <input type="hidden" name="_method" value="put">
                                {{csrf_field()}}
                                <label for = 'period_id'> Period </label>
                                <select name="period_id" id="period_id"  class="form-control">   
                                    @foreach($period as $p=>$pe )
                                        @if($pe== $timetable->period_id)
                                            <option value="{{$pe}}" selected>{{$p}}</option>
                                        @else
                                            <option value="{{$pe}}">{{$p}}</option>
                                        @endif


                                    @endforeach
                                </select>

                            </div>    
                        </div>

                        <div class="col-md-6">
							<div class="form-group">
                                <label for = 'grade'> grade </label>
                                <select name="grade_id" id="grade_id" class="form-control" >   
                                    @foreach($grade as $g=>$gr )
                                        @if($g==$timetable->grade_id)
                                            <option value="{{$gr}}" selected>{{$g}}</option>
                                        @else
                                        <option value="{{$gr}}">{{$g}}</option>
                                        @endif                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        


    <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
   

    <label for = 'subject_id'> Subject  </label>
    <select name="subject_id" id="subject_id" class="form-control">   
        @foreach($subjects as $k=>$v )
            @if($v==$timetable->subject_id)
            <option value="{{$v}}" selected>{{$k}}</option>
            @else
            <option value="{{$v}}">{{$k}}</option>
            @endif

        @endforeach
    </select></div>    
    </div>
    <div class ="col-md-6">
        <div class="form-group">
            <label for = 'teacher_id'> Teacher  </label>
            <select name="teacher_id" id="teacher_id"  class="form-control">   
                @foreach($teacher as $t=>$te )
                    @if($te==$timetable->teacher_id)
                        <option value="{{$te}}" selected>{{$t}}</option>
                    @else
                        <option value="{{$te}}">{{$t}}</option>
                    @endif

                @endforeach
            </select>
        </div>
    </div>
        
</div>
    <button type="submiit" class="btn btn-success">
        <i class="fa fa-plus"></i>
            Save
    </button>  

    
    </form>
    </div>
    </div>
@endsection