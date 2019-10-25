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
    <h3 class="page-title">Tables</h3>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><b> subjects<b>
                <div class="pull-right">
                    <a href="{{route('subject.create')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i>  Add
                    </a>  
                </div>    
            </h3>
        </div>                        
        <div class="panel-body">
            
            <table class="table table-borderd " id ="subjectData" >
            <thead>
            <tr>
                <th> Number </th>
                <th> Subject Code</th>
                <th> Subject Name</th>
                {{-- <th> Group Id</th> --}}
                <th> Action</th>
            </tr>
            </thead>
            <tbody>
                 @php
                    $count = 1;
                @endphp
                @foreach($subjects as $subject)
                    <tr>
                    <td> {{$count++}}</td>
                        <td> {{$subject-> subjectCode}}</td>
                        <td> {{$subject-> subjectName}}</td>
                        {{-- <td> {{$subject-> group_id}}</td> --}}
                        <td>
                            <a href="{{route('subject.edit',$subject->id)}}" class="btn btn-info btn-sm" title="Edit details">
                                <i class="fa fa-pencil"></i> 
                            </a>

                            {{-- <a href="{{route('subject.show',$subject->id)}}" class="btn btn-info btn-sm" title="View details">
                                <i class="fa fa-eye"></i> 
                            </a> --}}
                            <form action ="{{route('subject.destroy',$subject->id)}}" method ="POST" title="Delete details" style="display:inline" onsubmit="if(!confirm('Are you sure want to remove?')){ return false;}">
                                <input type ="hidden" name ="_method" value ="delete" >
                                {{{csrf_field()}}}
                                <button type="submit" class="btn btn-danger btn-sm" >
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tr>
                <th> Number </th>
                <th> Subject Code</th>
                <th> Subject Name</th>
                {{-- <th> Group Id</th> --}}
                <th> Action</th>
            </tr>
                <tfoot>
                </tfoot>
            </table>
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

