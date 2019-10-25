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
                    <h3 class="panel-title"><b>Teacher Detailes <b>
                        <div class="pull-right">
                            <a href="{{route('teacher.create')}}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i>  Add
                            </a>  
                        </div>
                    </h3>
                </div>                
                <div class="panel-body"> 
                    <div class="table-responsive">

                        
                    <table class ="table" id="teacherData" >
                    <thead>
                    <tr>
                        <th> Number</th>                        
                        <th> Teacher Name</th>
                        <th>Teacher Code </th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                        $count = 1;
                    @endphp
                        @foreach($teachers as $teacher)                        
                            <tr>
                                <td> {{$count++}} </td>           
                                <td> {{$teacher-> teacherName}}</td>
                                <td> {{$teacher-> teacherCode}}</td>
                                <td>
                                    <a href="{{route('teacher.edit',$teacher->id)}}" class="btn btn-info btn-sm" title="Edit details">
                                        <i class="fa fa-pencil"></i> 
                                    </a>
                                    {{-- <a href="{{route('teacher.show',$teacher->id)}}" class="btn btn-info btn-sm" title="View details">
                                        <i class="fa fa-eye"></i> 
                                    </a> --}}
                                    <form action ="{{route('teacher.destroy',$teacher->id)}}" method ="POST" title="Delete details" style="display:inline" onsubmit="if(!confirm('Are you sure want to remove?')){ return false;}">
                                        <input type ="hidden" name ="_method" value ="delete">
                                        {{{csrf_field()}}}
                                        <button type="submit" class="btn btn-danger btn-sm" >
                                            <i class="fa fa-trash-o"></i> 
                                        </button>
                                    </form>
                                </td>
                                {{-- <td> 
                                   
                                </td> 
                                <td>
                                    
                                    <form action ="{{route('teacher.edit',$teacher->id)}}" method ="GET">
                                                            
                                    <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-edit"></i>                                                 
                                                Edit
                                        </button>
                                    </form>
                                </td> 
                                    
                                <td>
                                    <form action ="{{route('teacher.show',$teacher->id)}}" method ="GET">
                                        <button type="submit" class="btn  btn-info ">
                                            <i class="fa fa-eye"></i>    Info
                                        </button>
                                    </form>         --}}
                                </td> 
                            </tr>

                        @endforeach
                        </tbody>
                        <tfoot>
                    <tr>
                        <th> Number</th>                        
                        <th> Teacher Name</th>
                        <td> Teacher Code</td>
                        <th>Action</th>
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
    //alert('sd');
    $('#teacherData').DataTable();
});
</script>
@endpush

