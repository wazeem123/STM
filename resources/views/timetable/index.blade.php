@extends('layouts.master')
@section('content')
<html>
<head>
    <style type="text/css">
     table,tr{
         border:2px solid teal;
     }

    </style>
</head>
    <body>		
        <h3 class="page-title">Tables</h3>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"> Grades {{request()->timetable}} 
                    <div class="pull-right">
                        <a href="{{route('timetable.create')}}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>  Add
                        </a>  
                    </div>  
                </h3>
            </div>                        
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderd " id="timetableData">
                    <thead>
                    <tr>
                        <th> Number</th>
                        <th>Grade </th>
                        <th> Period</th>
                        <th> Subject </th>
                        <th> Teacher </th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach($timetables as $timetable)

                            <tr>
                                <td> {{$count++}}</td>
                                
                                <td> {{$timetable->Grade->gradeName}}</td>
                                <td> {{$timetable->Period->periodCode}}</td>
                                <td> {{$timetable->Subject->subjectCode}}</td>
                                <td> {{$timetable->Teacher->teacherName}}</td>
                                <td>
                                    <a href="{{route('timetable.edit',$timetable->id)}}" class="btn btn-info btn-sm" title="Edit details">
                                        <i class="fa fa-pencil"></i> 
                                    </a>

                                    {{-- <a href="{{route('timetable.show',$timetable->id)}}" class="btn btn-info btn-sm" title="View details">
                                        <i class="fa fa-eye"></i> 
                                    </a> --}}
                                    <form action ="{{route('timetable.destroy',$timetable->id)}}" method ="POST" title="Delete details" style="display:inline" onsubmit="if(!confirm('Are you sure want to remove?')){ return false;}">
                                        <input type ="hidden" name ="_method" value ="delete" >
                                        {{{csrf_field()}}}
                                        <button type="submit" class="btn btn-danger btn-sm" >
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>

                                    {{-- @if(false)
                                    <td> 
                                        <form action ="{{route('timetable.destroy',$timetable->id)}}" method ="POST">
                                            <input type ="hidden" name ="_method" value ="delete">
                                            {{{csrf_field()}}}
                                            

                                            <button type="submit" class="btn btn-danger" >
                                                <i class="fa fa-trash-o"></i> Delete
                                            </button>
                                        </form>
                                    </td> 
                                    <td>
                                        
                                        <form action ="{{route('timetable.edit',$timetable->id)}}" method ="GET">                                                                
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-edit"></i>                                                 
                                                Edit
                                        </button>
                                        </form>
                                    </td> 
                                        
                                    
                                    <td>
                                        
                                        <form action ="{{route('timetable.show',$timetable->id)}}" method ="GET">
                                                                
                                           
                                            <button type="submit" class="btn  btn-info ">
                                                <i class="fa fa-eye"></i> 
                                                Info
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif --}}

                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th> Number</th>
                                <th>Grade </th>
                                <th> Period</th>
                                <th> Subject </th>
                                <th> Teacher </th>
                                <th> Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </body>     
</html>
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script>

    $(document).on('change','#grade_id',function() {

        //alert('hehe');
        //var timetableVal = $(this).val();
        
        //alert(timetableVal);
        $('.timetable').submit();
            });
    
</script>
@endsection

@push('script')
<script>
$(document).ready(function(){
    $('#timetableData').DataTable();
});
</script>
@endpush


