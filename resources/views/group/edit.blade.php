@extends('layouts.master')
@section('content')
    <form action ="{{route('group.update',$group->id)}}" method ="post">
    <input type="hidden" name="_method" value="put">
    {{csrf_field()}}
    <h3 class="page-title">Tables</h3>
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"> Grade 6 </h3>
			</div>
			<div class="panel-body">
				<div class="box-body">
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
                                <label for = 'groupname'> Group Name </label>
                                <input type ="text" name ="group" id="group" value ="{{$group->groupName}}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    
                    <button type="submiit" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                            Save
                    </button> 

                    <form action ="{{route('group.index',$group->id)}}" method ="GET">
                        <button type="submit" class="btn  btn-info ">
                            <i class="fa fa-long-arrow-left"></i> 
                            Back
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </form>
    @endsection