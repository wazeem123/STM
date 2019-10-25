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
            <table class ="table">
                <tr>
                    <td> Id </td>
                    <td>  Group  </td>
                    <td>  Suject  </td>

                </tr>
                <tr>
                    <td> {{$groupSubject-> id}} </td>
                    <td> {{$groupSubject->Group->groupName}} </td>
                    <td> {{$groupSubject-> Subject->subjectCode}} </td>      

                </tr>
            </table>
    </form>
            <form action="{{route('groupSubject.index')}}">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-long-arrow-left"></i> Back
                </button>
            </form>
    </div>
    </body>
</html>   
@endsection