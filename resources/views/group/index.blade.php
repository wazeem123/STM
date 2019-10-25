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
                <h3 class="panel-title"> Grades {{request()->grade}} {{request()->division}} 
                    <div class="pull-right">
                        <a href="{{route('group.create')}}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>  Add
                        </a>  
                    </div> 
                </h3>
            </div>                        
            <div class="panel-body">
                <div class="table-responsive">
                    <table  class="table table-borderd " id ="groupData">
                        <thead>
                            <tr>
                                <th> Number</th>
                                <th> Group name</th>
                                <th> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($groups as $group)
                                <tr>
                                    <td> {{$count++}}</td>
                                    <td> {{$group-> groupName}}</td>
                                    <td>
                                        <a href="{{route('group.edit',$group->id)}}" class="btn btn-info btn-sm" title="Edit details">
                                            <i class="fa fa-pencil"></i> 
                                        </a>

                                        {{-- <a href="{{route('group.show',$group->id)}}" class="btn btn-info btn-sm" title="View details">
                                            <i class="fa fa-eye"></i> 
                                        </a> --}}
                                        <form action ="{{route('group.destroy',$group->id)}}" method ="POST" title="Delete details" style="display:inline" onsubmit="if(!confirm('Are you sure want to remove?')){ return false;}">
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
                                <th> Number</th>
                                <th> Group name</th>
                                <th> Actions</th>
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
    $('#groupData').DataTable();
});
</script>
@endpush
