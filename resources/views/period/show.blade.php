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
                <h3 class="panel-title"> Grade 6 </h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td> Id </td>
                        <td>  Day </td>
                        <td>  Period </td>
                        <td>  Start Time </td>
                        <td>  End Time </td>

                    </tr>
                    <tr>
                        <td> {{$period-> id}} </td>
                        <td> {{$period-> day}} </td>
                        <td> {{$period-> periodCode}} </td>
                        <td> {{$period-> startTime}} </td>
                        <td> {{$period-> endTime}} </td>


                    </tr>
                </table>
            </div>
            <form action="{{route('period.index')}}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-long-arrow-left"></i> Back
                    </button>
                </form>
        </div>
    </body>
</html>    
@endsection