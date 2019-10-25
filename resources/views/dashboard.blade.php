@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css">
            table,tr{
                border:2px solid teal;
            }

        </style>
    </head>
    <body>

	<div class="row">
	<form action ="{{route('updateIndex')}}" method ="post">
		{{csrf_field()}}
			<div class="widget-body">
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for = 'grade'> Grade </label>    
                                <div class="form-group {{ $errors->has('grade') ? 'has-error' : '' }}">
								
								<select class="chosen-select form-control" id="grade" name="grade" >  
										<option value="null" disabled selected>Select the grade</option>
										@foreach($grades as $grade )            
											<option value="{{$grade->id}}">{{$grade->gradeName}}</option>
										@endforeach
									</select>
                                    <span class="text-danger">{{ $errors->first('grade') }}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<button type="submit" class="btn btn-yellow"><i class="fa fa-exchange"></i> Show</button><br><br>
						</div>
					</div>
				  </form>
				</div>

						
						
			 
					
        <div class="row">
			<div class="col-sm-10">
				<div class="widget-box transparent" id="recent-box">	
					<div class="widget-body">
						<div class="widget-main padding-4">
							<div class="tab-content padding-8">
								<!--<div id="grade6" class="tab-pane active"> -->
									<h4 class="smaller lighter green">
										
											Timetable of grade {{$grd}}
									</h4>

								    <ul id="tasks" class="item-list">
								    <div>
									
										<table id="grade6" class="table table-striped table-bordered table-hover">
											<thead>
											    <tr>
													<th>Monday</th>
													<th>Tuesday</th>
													<th>Wednesday</th>
													<th>Thursday</th>
													<th>Friday</th>
												</tr>
										    </thead>

											<tbody>
												@for($i = 1  ; $i <= 8 ; $i++)
																											
													<tr>
															<td>	
															@foreach($timetables as $timetable)
																	@foreach($periods as $period)
																		@if ($timetable->period_id == $period->id and $period->periodCode == 'Mon-'.$i and $timetable->grade_id == $grades1)
																			@foreach($subjects as $subject)
																				@if ($subject -> id ==$timetable->subject_id)
																					{{$subject->subjectName}}
																				@endif
																			@endforeach
																		@endif
																	@endforeach
															@endforeach
															
															</td>
															
															<td>
															@foreach($timetables as $timetable)
																	@foreach($periods as $period)
																		@if ($timetable->period_id == $period->id and $period->periodCode == 'Tue-'.$i and $timetable->grade_id == $grades1)
																			@foreach($subjects as $subject)
																				@if ($subject -> id ==$timetable->subject_id)
																					{{$subject->subjectName}}
																				@endif
																			@endforeach
																		@endif
																	@endforeach
															@endforeach
															</td>
															<td>
															@foreach($timetables as $timetable)
																	@foreach($periods as $period)
																		@if ($timetable->period_id == $period->id and $period->periodCode == 'Wed-'.$i and $timetable->grade_id == $grades1)
																			@foreach($subjects as $subject)
																				@if ($subject -> id ==$timetable->subject_id)
																					{{$subject->subjectName}}
																				@endif
																			@endforeach
																		@endif
																	@endforeach
															@endforeach
															</td>
															<td>
															@foreach($timetables as $timetable)
																	@foreach($periods as $period)
																		@if ($timetable->period_id == $period->id and $period->periodCode == 'Thur-'.$i and $timetable->grade_id == $grades1)
																			@foreach($subjects as $subject)
																				@if ($subject -> id ==$timetable->subject_id)
																					{{$subject->subjectName}}
																				@endif
																			@endforeach
																		@endif
																	@endforeach
															@endforeach
															</td>
															<td>
															@foreach($timetables as $timetable)
																	@foreach($periods as $period)
																		@if ($timetable->period_id == $period->id and $period->periodCode == 'Fri-'.$i and $timetable->grade_id == $grades1)
																			@foreach($subjects as $subject)
																				@if ($subject -> id ==$timetable->subject_id)
																					{{$subject->subjectName}}
																				@endif
																			@endforeach
																		@endif
																	@endforeach
															@endforeach
															</td>																																					
														</tr>
													@endfor
												</tbody>
											</table>
											<table id="grade6" class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th>Monday</th>
															<th>Tuesday</th>
															<th>Wednesday</th>
															<th>Thursday</th>
															<th>Friday</th>
														</tr>
													</thead>
		
													<tbody>
														@for($i = 1  ; $i <= 8 ; $i++)
																													
															<tr>
																	<td>	
																	@foreach($timetables as $timetable)
																			@foreach($periods as $period)
																				@if ($timetable->period_id == $period->id and $period->periodCode == 'Mon-'.$i and $timetable->grade_id == $grades1)
																				@foreach($teachers as $teacher)
																				@if ($teacher -> id ==$timetable->teacher_id)
																					{{$teacher->teacherName}}
																				@endif
																			@endforeach
																				@endif
																			@endforeach
																	@endforeach
																	
																	</td>
																	
																	<td>
																	@foreach($timetables as $timetable)
																			@foreach($periods as $period)
																				@if ($timetable->period_id == $period->id and $period->periodCode == 'Tue-'.$i and $timetable->grade_id == $grades1)
																				@foreach($teachers as $teacher)
																				@if ($teacher -> id ==$timetable->teacher_id)
																					{{$teacher->teacherName}}
																				@endif
																			@endforeach
																				@endif
																			@endforeach
																	@endforeach
																	</td>
																	<td>
																	@foreach($timetables as $timetable)
																			@foreach($periods as $period)
																				@if ($timetable->period_id == $period->id and $period->periodCode == 'Wed-'.$i and $timetable->grade_id == $grades1)
																					@foreach($teachers as $teacher)
																						@if ($teacher -> id ==$timetable->teacher_id)
																							{{$teacher->teacherName}}
																						@endif
																					@endforeach
																				@endif
																			@endforeach
																	@endforeach
																	</td>
																	<td>
																	@foreach($timetables as $timetable)
																			@foreach($periods as $period)
																				@if ($timetable->period_id == $period->id and $period->periodCode == 'Thur-'.$i and $timetable->grade_id == $grades1)
																				@foreach($teachers as $teacher)
																				@if ($teacher -> id ==$timetable->teacher_id)
																					{{$teacher->teacherName}}
																				@endif
																			@endforeach
																				@endif
																			@endforeach
																	@endforeach
																	</td>
																	<td>
																	@foreach($timetables as $timetable)
																			@foreach($periods as $period)
																				@if ($timetable->period_id == $period->id and $period->periodCode == 'Fri-'.$i and $timetable->grade_id == $grades1)
																				@foreach($teachers as $teacher)
																				@if ($teacher -> id ==$timetable->teacher_id)
																					{{$teacher->teacherName}}
																				@endif
																			@endforeach

																				@endif
																			@endforeach
																	@endforeach
																	</td>																																					
																</tr>
															@endfor
														</tbody>
													</table>
					    				</div>
									<!--</div>-->
								</div>
							</div><!-- /.widget-main -->
						</div><!-- /.widget-body -->
					</div><!-- /.widget-box -->

				</div><!-- /.col -->
			</div>
            
    </body>
</html>
@endsection
@push('script')
<script>
$(document).ready(function(){


    $('#subjectData').DataTable();
});
</script>
@endpush

