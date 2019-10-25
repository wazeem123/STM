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
                <h3 class="panel-title"> Group </h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td> Id </td>
                        <td>  Group Name </td>
                    </tr>
                    <tr>
                        <td> {{$group-> id}} </td>
                        <td> {{$group-> groupName}} </td>
                    </tr>
                </table>

    
            </div>
        </div>
    </body>
</html>   
@endsection