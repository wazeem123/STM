@extends('layouts.master')
@section('content')
<style>
    .popup{
        width: 200px;
        height: 100px;
    }
</style>
    <form action ="{{route('timetable.store')}}" method ="post" id ="timetableForm">
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
                                <div class="form-group {{ $errors->has('grade_id') ? 'has-error' : '' }}">
                                <label for = 'grade'> grade </label>    
                                <select name="grade_id" id="grade_id" class="form-control grade-list">  
                                        <option value="">select the grade</option>
                                        @foreach($grade as $g=>$gr )            
                                            <option value="{{$gr}}">{{$g}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('grade_id') }}</span>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('period_id') ? 'has-error' : '' }}">
                                    <label for = 'period'> Period </label>    
                                    <select name="period_id" id="period_id" class="form-control period-list" >  
                                        <option value="">select the period</option>
                                        @foreach($period as $p=>$pe )            
                                            <option value="{{$pe}}">{{$p}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('period_id') }}</span>
                                </div>    
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('subject_id') ? 'has-error' : '' }}">
                                    <label for = 'subject_id'> Subject  </label>  
                                        <select name="subject_id" id="subject_id" class="form-control subject-list">
                                            <option value="">select the subject</option>
                                            @foreach($subjects as $k=>$v )
                                                <option value="{{$v}}">{{$k}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('subject_id') }}</span>
                                </div>    
                            </div>
                            <div class ="col-md-6">
                                <div class="form-group {{ $errors->has('teacher_id') ? 'has-error' : '' }}">
                                    <label for = 'teacher_id'> Teacher  </label>
                                    <select name="teacher_id" id="teaid" class="form-control teacher-list">
                                    <option value="">select the teacher </option>   
                                        @foreach($teacher as $t=>$te )
                                            <option value="{{$te}}">{{$t}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('teacher_id') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button><br><br>
                                </div>
                            </div>
    </form>
                             <div class="col-md-6">
                                <div class="form-group">
                                <form action="{{route('timetable.index')}}">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-long-arrow-left"></i> Back
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>

                     </div>
                 </div>

                

                
                {{-- <a id="url" href="{{route('timetable.store')}}"></a> --}}

<!-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
@endif -->

    
    @endsection
    @push('script')
    <script>
        $(function(){
            // alert();
        });
       
        $(document).on('change','.grade-list',function(){
            var target = "{{ route('timetable.show',1) }}";
            var grade_id = $(this).val();
            var element = $('.period-list');
            var subject1 = $('.subject-list');
            element.empty();
            subject1.empty();
            $.get(target+'?grade_id='+grade_id).done(function(res){
                var options = '';
                $.each(res.lists,function(i,v){
                    options += '<option value="'+v.id+'">'+v.periodCode+'</option>'
                });
                element.html(options);

                $.each(res.sublists,function(i,v){
                    //subject1 += '<option value="'+v.id+'">'+v.subjectCode+'</option>'
                   // alert(v.subjectCode);
                    subject1.append('<option value="'+v.id+'">'+v.subjectCode+'</option>');
                });
                //subject1.html(options);
            });          
        });

        $(document).on('change','.subject-list',function(){
            var target = "{{ route('subTeacher') }}";
            var subject1 = $(this).val();
            var grade1 = $('.grade-list').val();
            //alert(grade1);
            var teacher1 = $('.teacher-list');
            teacher1.empty();

            $.get(target+'?subject_id='+subject1+'&grade_id='+grade1).done(function(res){
               

                $.each(res.sublists,function(i,v){
                    //subject1 += '<option value="'+v.id+'">'+v.subjectCode+'</option>'
                   // alert(v.subjectCode);
                    teacher1.append('<option value="'+v.id+'">'+v.teacherName+'</option>');
                });
                //subject1.html(options);
            });          
        });

        // $(document).on('submit','#timetableForm',function(e){
        //     e.preventDefault();
        //     var url =$(this).attr('action');
        //     var sd = new FormData(this);
            
        //     if(confirm('Do you to want add more?')){
        //         $.ajax({
        //         type: 'post',
        //         url: url,
        //         data:new FormData(this),
        //         contentType:false,
        //         cache:false,
        //         processData:false,
        //         }).done(function (res) {
        //         if (res.success) {
        //             alert(res.message);
        //             element.closest(element.attr('data-set')).fadeOut();
        //         }
        //         if(res.refresh){
        //             // location.reload();
        //             window.location.href = "{{ URL('timetable/create')}}";
        //         }
        //         if (res.fail) {
        //             alert(res.message);
        //             element.closest(element.attr('data-set')).fadeOut();

        //             window.location.href = "{{ URL('/timetable')}}";

        //         }
        //         });
        //     }
           
        // });
    </script>
    @endpush
    