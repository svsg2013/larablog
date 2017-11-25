@extends('template')
@section('title')
    Create news - @parent
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-20">
                            {!! Form::open(['url' => 'food','class'=>'form-horizontal','role'=>'form']) !!}
                                <div class="form-group">
                                    {!! Form::label('title','Title',['class'=>'col-md-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::text('txtName',old('txtName'),['placeholder'=>'To type here','class'=>'form-control']) !!}
                                    </div>
                                </div>
                                 <div class="form-group">
                                     {!! Form::label('input select','Input Select',['class'=>'col-md-2 control-label']) !!}
                                     <div class="col-md-10">
                                         {!! Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...','class'=>'form-control']) !!}
                                     </div>
                                 </div>
                                <div class="form-group">
                                    {!! Form::label('Summary','Summary',['class'=>'col-md-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::textarea('txtSummary',old('txtSummary'),['placeholder'=>'To type here','class'=>'form-control','rows'=>5]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Content','Content',['class'=>'col-md-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::textarea('txtContent',old('txtContent'),['class'=>'form-control','id'=>'editor1']) !!}
                                        <script>
                                            CKEDITOR.replace( 'editor1' );
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Select thumbnail','Select thumbnail',['class'=>'col-md-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::file('fileImg',['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label(' ',' ',['class'=>'col-md-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::button('Submit',['class'=>'btn btn-custom waves-effect waves-light btn-md','type'=>'submit']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
