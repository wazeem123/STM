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
                <h3 class="panel-title"> Grade </h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th> Id </th>                        
                        <th>  Grade </th>
                        <th>  OrderNo </th>

                    </tr>
                    <tr>
                        <td> {{$grade-> id}} </td>                        
                        <td> {{$grade-> gradeName}} </td>
                        <td> {{$grade-> orderNo}} </td>

                    </tr>
                </table>
            </div>
            <form action="{{route('grade.index')}}">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-long-arrow-left"></i> Back
                </button>
            </form>
        </div>
    </body>
</html>
@endsection