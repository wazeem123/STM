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
                <h3 class="panel-title"> Teachers </h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th> Id </th>                        
                        <th> Grade  </th>
                        <th> Subject </th>

                    </tr>
                    <tr>
                        <td> {{$gradeSubject-> id}} </td>                        
                        <td> {{$gradeSubject-> grade_id}} </td>
                        <td> {{$gradeSubject-> subject_id}} </td>

                    </tr>
                </table>
            </div>
            <form action="{{route('gradeSubject.index')}}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-long-arrow-left"></i> Back
                    </button>
                </form>
        </div>
    </body>
</html>
@endsection