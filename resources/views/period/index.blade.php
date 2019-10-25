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
                <h3 class="panel-title"> period 
                    <div class="pull-right">
                        <a href="{{route('period.create')}}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>  Add
                        </a>  
                    </div> 
                </h3>
            </div>                        
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-borderd " id= "periodData" >
                <thead>
                <tr>
                    <th> Number </th>
                    <th> Day </th>
                    <th> Period </th>
                    {{-- <th> Start Time</th> --}}
                    {{-- <th> End Time </th> --}}
                    <th> Action </th>
                   
                </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach($periods as $period)
                        <tr>
                            <td> {{$count++}}</td>
                            <td> {{$period-> day}}</td>
                            <td> {{$period-> periodCode}}</td>
                            {{-- <td> {{$period-> startTime}}</td>
                            <td> {{$period-> endTime}}</td> --}}
                            <td>
                                <a href="{{route('period.edit',$period->id)}}" class="btn btn-info btn-sm" title="Edit details">
                                    <i class="fa fa-pencil"></i> 
                                </a>

                                {{-- <a href="{{route('period.show',$period->id)}}" class="btn btn-info btn-sm" title="View details">
                                    <i class="fa fa-eye"></i> 
                                </a> --}}
                                <form action ="{{route('period.destroy',$period->id)}}" method ="POST" title="Delete details" style="display:inline" onsubmit="if(!confirm('Are you sure want to remove?')){ return false;}">
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

                    <tfoot>
                        <tr>
                    <th> Number </th>
                    <th> Day </th>
                    <th> Period </th>
                    {{-- <th> Start Time</th>
                    <th> End Time </th> --}}
                    <th> Action</th>
                    
                </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </body>
</html>
@endsection

@push('script')
<script>
$(document).ready(function(){
    $('#periodData').DataTable();
});
</script>
@endpush
