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
										
											Timetable of grade 6A
									</h4>

								    <div>
										<table id="grade6" class="table table-striped table-bordered table-hover">
                                                @php
                                                $date = date('d-m-Y');
                                            
                                                $nameOfDay = date('D', strtotime($date));
                                                $num1 = 1 ; $num2 = 2 ; $num3 = 3 ;$num4 = 4 ; $num5 = 5 ; $num6 = 6 ; $num7 = 7 ; $num8 = 8 ; $value = "true";
                                                @endphp
                                                    <thead>
                                                        <tr>		
                                                            <th>Grade</th>
                                                            <th>1st Period</th>
                                                            <th>2st Period</th>
                                                            <th>3st Period</th>
                                                            <th>4st Period</th>
                                                            <th>5st Period</th>
                                                            <th>6st Period</th>
                                                            <th>7st Period</th>
                                                            <th>8st Period</th>
                                                        </tr>
                                                    </thead>

											<tbody>
                                                    @foreach($reliefs as $relief)
                                                    <tr>
                                                        <td>{{$relief -> grade}}</td>
                                                        <!-- <td>{{$nameOfDay}}</td> -->	
                                                        <td>
                                                            @foreach($attendences as $attendence)
                                                                @if($attendence->teacher_id == $relief -> $num1 and $attendence->absent == '0')
                                                                <a role="button"  ><i class="btn btn-danger">{{$relief -> $num1}}</i></a>
                                                                    @break
                                                                @elseif($attendence->teacher_id == $relief -> $num1 and $attendence->absent == '1')
                                                                    {{$relief -> $num1}}
                                                                    @break
                                                                @elseif($loop->iteration == count($attendences) )
                                                                    {{$relief -> $num1}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($attendences as $attendence)
                                                                @if($attendence->teacher_id == $relief -> $num2 and $attendence->absent == '0')
                                                                <a role="button"  ><i class="btn btn-danger">{{$relief -> $num2}}</i></a>
                                                                    @break
                                                                @elseif($attendence->teacher_id == $relief -> $num2 and $attendence->absent == '1')
                                                                    {{$relief -> $num2}}
                                                                    @break
                                                                @elseif($loop->iteration == count($attendences) )
                                                                    {{$relief -> $num2}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($attendences as $attendence)
                                                                    @if($attendence->teacher_id == $relief -> $num3 and $attendence->absent == '0')
                                                                    <a role="button"  ><i class="btn btn-danger">{{$relief -> $num3}}</i></a>
                                                                        @break
                                                                    @elseif($attendence->teacher_id == $relief -> $num3 and $attendence->absent == '1')
                                                                        {{$relief -> $num3}}
                                                                        @break
                                                                    @elseif($loop->iteration == count($attendences) )
                                                                        {{$relief -> $num3}}
                                                                    @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($attendences as $attendence)
                                                                @if($attendence->teacher_id == $relief -> $num4 and $attendence->absent == '0')
                                                                <a role="button"  ><i class="btn btn-danger">{{$relief -> $num4}}</i></a>
                                                                    @break
                                                                @elseif($attendence->teacher_id == $relief -> $num4 and $attendence->absent == '1')
                                                                    {{$relief -> $num4}}
                                                                    @break
                                                                @elseif($loop->iteration == count($attendences) )
                                                                    {{$relief -> $num4}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($attendences as $attendence)
                                                                @if($attendence->teacher_id == $relief -> $num5 and $attendence->absent == '0')
                                                                <a role="button"  ><i class="btn btn-danger">{{$relief -> $num5}}</i></a>
                                                                    @break
                                                                @elseif($attendence->teacher_id == $relief -> $num5 and $attendence->absent == '1')
                                                                    {{$relief -> $num5}}
                                                                    @break
                                                                @elseif($loop->iteration == count($attendences) )
                                                                    {{$relief -> $num5}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($attendences as $attendence)
                                                                @if($attendence->teacher_id == $relief -> $num6 and $attendence->absent == '0')
                                                                <a role="button"  >{{$relief -> $num6}}</i></a>
                                                                    @break
                                                                @elseif($attendence->teacher_id == $relief -> $num6 and $attendence->absent == '1')
                                                                    {{$relief -> $num6}}
                                                                    @break
                                                                @elseif($loop->iteration == count($attendences) )
                                                                    {{$relief -> $num6}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($attendences as $attendence)
                                                                @if($attendence->teacher_id == $relief -> $num7 and $attendence->absent == '0')
                                                                <a role="button"  ><i class="btn btn-danger">{{$relief -> $num7}}</i></a>
                                                                    @break
                                                                @elseif($attendence->teacher_id == $relief -> $num7 and $attendence->absent == '1')
                                                                    {{$relief -> $num7}}
                                                                    @break
                                                                @elseif($loop->iteration == count($attendences) )
                                                                    {{$relief -> $num7}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($attendences as $attendence)
                                                                @if($attendence->teacher_id == $relief -> $num8 and $attendence->absent == '0')
                                                                <a role="button"  ><i class="btn btn-danger">{{$relief -> $num8}}</i></a>
                                                                    @break
                                                                @elseif($attendence->teacher_id == $relief -> $num8 and $attendence->absent == '1')
                                                                    {{$relief -> $num8}}
                                                                    @break
                                                                @elseif($loop->iteration == count($attendences) )
                                                                    {{$relief -> $num8}}
                                                                @endif
                                                            @endforeach
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

