@extends('layouts.admin')

@section('content')


<style>

</style>


<button type="button" style="display:none" class="btn btn-primary" id="modal" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false" data-whatever="@mdo">Open modal for @mdo</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:max-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @if($report == 'students')
                    Total Students Class Wise
                    @endif
                    @if($report == 'religion')
                    Religions Class Wise
                    @endif
                    @if($report == 'caste')
                    Caste Class Wise
                    @endif
                    @if($report == 'gender')
                    Gender Class Wise
                    @endif

                </h5>
            </div>
            <div class="modal-body">
                @if($report == 'students')
                <table class="table">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                            <th>E</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($classes as $class)
                        <tr>
                            <td><span>{{$class->class}}</span></td>
                            <td>{{$students_dis->where('section' , 'A')->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('section' , 'B')->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('section' , 'C')->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('section' , 'D')->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('section' , 'E')->where('class' , $class->id)->count()}}</td>
                            <td><span style="font-size: 18px" class="badge badge-lg badge-warning">{{$students_dis->where('class' , $class->id)->count()}}</span></td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                @endif

                @if($report == 'religion')
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Class</th>
                            @foreach($religions as $religion)
                            <th>{{$religion->name}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($classes as $class)
                        <tr>
                            <td><span style="font-size: 18px" class="badge badge-lg badge-success">{{$class->class}}</span></td>
                            <td>{{$students_dis->where('religion' , 1)->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('religion' , 2)->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('religion' , 3)->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('religion' , 4)->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('religion' , 5)->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('religion' , 6)->where('class' , $class->id)->count()}}</td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
                @endif

                @if($report == 'caste')
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Class</th>
                            @foreach($castes as $caste)
                            <th>{{$caste->name}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($classes as $class)
                        <tr>
                            <td><span style="font-size: 18px" class="badge badge-lg badge-success">{{$class->class}}</span></td>
                            <td>{{$students_dis->where('cast' , 1)->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('cast' , 2)->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('cast' , 3)->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('cast' , 4)->where('class' , $class->id)->count()}}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                @endif
                @if($report == 'gender')
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($classes as $class)
                        <tr>
                            <td><span style="font-size: 18px" class="badge badge-lg badge-success">{{$class->class}}</span></td>
                            <td>{{$students_dis->where('gender' , 0)->where('class' , $class->id)->count()}}</td>
                            <td>{{$students_dis->where('gender' , 1)->where('class' , $class->id)->count()}}</td>
                            <td><span style="font-size: 18px" class="badge badge-lg badge-warning">{{$students_dis->where('class' , $class->id)->count()}}</span></td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="search" class="btn btn-primary">Export List</button>
            </div>
        </div>
    </div>
</div>


@stop

@section('script-plugins')

<script>
    $(document).ready(function() {
        $("#modal").trigger('click');
    });
</script>

@stop