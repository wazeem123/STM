@extends('layouts.master')
@section('content')
<html >
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
            <h3 class="panel-title"> Teachers and Subjects </h3>
        </div>
        <div class="panel-body">
    <table class="table" >
        <tr>
            <td> Id </td>
            <td>  Teacher ID </td>
            <td>  Section </td>
            <td>  Subject ID </td>
            <td>  medium </td>

        </tr>
        <tr>
            <td> {{$teacherSubjects-> id}} </td>
            <td> {{$teacherSubjects-> Teacher->teacherName}} </td>
            <td> {{$teacherSubjects-> section}} </td>
            <td> {{$teacherSubjects-> Subject->subjectCode}} </td>
            <td> {{$teacherSubjects-> medium}} </td>            

        </tr>
    </table>
</div>

    
<form action="{{route('teacherSubject.index')}}">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-long-arrow-left"></i> Back
        </button>
    </form>
</div>
    
</body>
</html>
@endsection
