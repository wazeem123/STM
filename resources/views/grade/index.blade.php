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
            <h3 class="panel-title"> Grades
                <div class="pull-right">
                    <a href="{{route('grade.create')}}" class =" btn btn-success">
                        <i class =" fa fa-plus"></i> Add
                    </a>
                </div>
            </h3>
        </div>                        
        <div class="panel-body">
            <table  class="table table-borderd " id ="gradeData">
                <thead>
                    <tr>
                        <th> Number</th>
                        <th> Grade Name</th>
                        <th> Section</th>
                        {{-- <th> Order Numer</th> --}}
                        <th> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach($grades as $grade)
                        <tr>
                            <td> {{$count++}}</td>
                            <td> {{$grade-> gradeName}}</td>
                            <td> {{$grade-> section}}</td>
                            {{-- <td> {{$grade-> orderNo}}</td> --}}
                            <td>
                                <a href="{{route('grade.edit',$grade->id)}}" class ="btn btn-info btn-sm" title ="Edit Details">
                                    <i class ="fa fa-pencil"></i>
                                </a>
                                {{-- <a href="{{route('grade.show',$grade->id)}}" class ="btn btn-info btn-sm" title ="View Details">
                                    <i class = "fa fa-eye"></i>
                                </a> --}}
                                <form action ="{{route('grade.destroy',$grade->id)}}" method ="POST" title="Delete details" style="display:inline" onsubmit="if(!confirm('Are you sure want to remove?')){ return false;}" >
                                    <input type ="hidden" name ="_method" value ="delete">
                                    {{{csrf_field()}}}
                                    <button type="submit" class="btn btn-danger" >
                                        <i class="fa fa-trash-o"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th> Number</th>
                        <th> Grade Name</th>
                        <th> Section</th>
                        {{-- <th> Order Numer</th> --}}
                        <th> Actions</th>
                    </tr>
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

    $('#gradeData').DataTable();
});
</script>
@endpush


