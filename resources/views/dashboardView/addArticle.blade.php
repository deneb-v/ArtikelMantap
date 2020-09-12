@extends('Template.user')
@section('title')
    Add Article | Artikel Mantap
@endsection

@section('navItem')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin')}}">Manage Article</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('newArticle')}}">Add Article </a>
    </li>
@endsection

@section('content')
<div class="container pt-2 pb-2">
    <h2>Add New Article</h2>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <form action="{{ route('addArticle') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Title</label>
            <input name="txt_title" type="text" class="form-control" id="txt_title" placeholder="Title">
        </div>
        <div class="form-group">
            <label>Article Content</label>
            <textarea name="txt_content" class="form-control" id="txt_artContent" rows="14"></textarea>
        </div>
        <div class="form-group">
            <label>Writer name</label>
            <input name="txt_writer" type="text" class="form-control" id="txt_title" placeholder="Writer name">
        </div>
        <div class="form-group">
            <label>Article Image</label>
            <input name="img_article" type="file" class="form-control-file" id="img_article">
        </div>
        <div class="form-group">
            <label>Image Description</label>
            <input name="txt_imgDesc" type="text" class="form-control" id="txt_imgDesc" placeholder="Image Description">
        </div>
        <button type="submit" name="" id="" class="btn btn-primary" btn-lg btn-block">Add Article</button>
    </form>
</div>
@endsection

@section('more-script')
    $(document).ready(function() {
        $('#txt_artContent').summernote({
            height: 300
        });
    });
@endsection
