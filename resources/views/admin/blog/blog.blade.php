@extends('admin.master')
@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">blog</li>
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
                    <div class="card-title">Blogs
                        <a href="{{url('/admin-blog/create')}}" class="btn btn-primary" title="Add Category"><i class="fas fa-plus float-right "></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Blog Title</th>
                            <th>Blog Category</th>
                            <th>User Name</th>
                            <th>Author Name</th>
                            <th>Short Description</th>
                            <th>Blog Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php($i = 1)
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$post->title}}</td>
                                <td>@foreach($post->blogCat as $cat) {{$cat->admincategory->cat_name}}@if(!$loop->last),@endif @endforeach</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->author}}</td>
                                <td>{{$post->short_desc}}</td>
                                <td><img src="{{$post->image}}" alt="" width="100"></td>
                                <td>{{$post->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{url('admin-blog/'.$post->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="{{url('admin-blog/'.$post->id.'/edit')}}"  class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    @if(auth()->user()->role == 1 || auth()->user()->role == 2)
                                    <a href=""  class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    @if($post->status == 1)
                                        <a href="{{url('admin-blog/unpublish/'.$post->id)}}"  class="btn btn-success"><i class="fas fa-arrow-up"></i></a>
                                    @else
                                        <a href="{{url('admin-blog/publish/'.$post->id)}}"  class="btn btn-warning"><i class="fas fa-arrow-down"></i></a>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Blog Title</th>
                            <th>Blog Category</th>
                            <th>User Name</th>
                            <th>Author Name</th>
                            <th>Short Description</th>
                            <th>Blog Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
