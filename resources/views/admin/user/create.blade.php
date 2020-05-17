@extends('admin.master')
@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add User
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    {{Form::open(['url'=>'/user','method' => 'post'])}}
                        <div class="form-group">
                            {{Form::label('Name')}}
                            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Email')}}
                            {{Form::text('email','',['class'=>'form-control'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Address')}}
                            {{Form::text('address','',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('Phone')}}
                            {{Form::text('phone','',['class'=>'form-control'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('Password')}}
                            {{Form::password('password',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('Role')}}
                            {{Form::select('role',['0'=>'Select Role','1'=>'Super Admin','2'=>'Admin','3'=>'Moderator'],'0',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::submit('Add User',['class'=>'btn btn-primary'])}}
                        </div>
                    {{Form::close()}}

                </div>
            </div>
            <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
@endsection
