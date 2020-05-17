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
                            <li class="breadcrumb-item active">Blog</li>
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
                    <div class="card-title">Edit Blog
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" action="{{url('/admin-blog/'.$adminBlog->id)}}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
{{--                                {{dd($adminBlog->blogCat->cat_id)}}--}}
                                <select name="cat_id[]" class="form-control" multiple>
                                    <option value="">---Select Category---</option>

                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @foreach($adminBlog->blogCat as $cat) {{$cat->cat_id == $category->id ? 'selected':''}} @endforeach>{{$category->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Blog Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Blog Title" value="{{$adminBlog->title}}">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control" placeholder="Blog Title">
                                <input type="hidden" name="blog_id" value="{{$adminBlog->id}}" class="form-control" placeholder="Blog Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Author Name</label>
                                <input type="text" name="author" class="form-control" placeholder="Author" value="{{$adminBlog->author}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Blog Short Description</label>
                                <input type="text" name="short_desc" class="form-control" placeholder="Blog Short" value="{{$adminBlog->short_desc}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Blog Long Description</label>
                                <textarea id="editor1" name="long_desc" class="form-control">{{$adminBlog->long_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Blog Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{asset($adminBlog->image)}}" width="100">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Blog Publication Status</label>
                                <input type="radio" name="status" value="1" {{$adminBlog->status == 1 ? 'checked':''}}> Published
                                <input type="radio" name="status" value="0" {{$adminBlog->status == 0 ? 'checked':''}}> Unpublished
                            </div>
                            <button type="submit" class="btn btn-primary">Update Blog</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
@endsection
