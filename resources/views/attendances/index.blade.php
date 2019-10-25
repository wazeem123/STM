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
			
			
								<!--<div id="grade6" class="tab-pane active"> -->
									<h4 class="smaller lighter green">
										
											Teacher Attendance
									</h4>

								    <div>
										<table id="grade6" class="table table-striped table-bordered table-hover">
											<thead>
											    <tr>
													<th>Teacher </th>
													<th>Present/Absent</th>
													
												</tr>
										    </thead>

											<tbody>
												@foreach($teachers as $teacher)
														
														<tr>
													
															<td>
															@foreach($teach as $teachs)
																@if($teachs->id == $teacher->teacher_id)
																{{$teachs -> teacherCode}}
																@endif
															@endforeach
															</td>
															<td>
																<div class = center>
																	@if($teacher->isPresent)
																		<a href="{{route('present',$teacher -> id )}}" class ="btn btn-primary">Present</a>
																	@else
																		<a href="{{route('absent',$teacher -> id)}}" class ="btn btn-danger">Absent</a>
																	@endif
																</div>
															</td>
                                                        </tr>
                                                        @endforeach
												</tbody>
			    							</table>
					    				</div>
									<!--</div>-->
								{{-- </div>
							</div><!-- /.widget-main -->
						</div><!-- /.widget-body -->
					</div><!-- /.widget-box -->
				</div><!-- /.col -->--}}
			</div>
					</div>
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

