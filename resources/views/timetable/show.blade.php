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
            <th> Id </th>
            <th>  period </th>
            <th>  Grade </th>
            <th>  Subject </th>
            <th>  Teacher  </th>
        </tr>
        <tr>
            <td> {{$timetable-> id}} </td>
            <td> {{$timetable-> Period->periodCode}} </td>
            <td> {{$timetable-> grade_id}} </td>
            <td> {{$timetable-> Subject->subjectCode}} </td>
            <td> {{$timetable-> Teacher->teacherName}} </td>


        </tr>
    </table>
    </div>
    <form action="{{route('timetable.index')}}">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-long-arrow-left"></i> Back
            </button>
        </form>
    </div>
    </body>
    </html>
@endsection

    
   