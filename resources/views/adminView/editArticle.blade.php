@extends('Template.admin')
@section('title')
    Edit Article | Artikel Mantap
@endsection

@section('navItem')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin')}}">Manage Article</a>
    </li>
    <li class="nav-item">
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

    <form action="{{ route('updateArticle',['id'=>$data->id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('patch')
        {{-- 'title',
            'content',
            'writer',
            'image',
            'imageDesc' --}}
        <div class="form-group">
            <label>Title</label>
            <input name="txt_title" type="text" class="form-control" id="txt_title" placeholder="Title" value="{{ $data->title }}">
        </div>
        <div class="form-group">
            <label>Article Content</label>
            <textarea name="txt_content" class="form-control" id="txt_artContent" rows="14"></textarea>
        </div>
        <div class="form-group">
            <label>Writer name</label>
            <input name="txt_writer" type="text" class="form-control" id="txt_title" placeholder="Writer name" value="{{ $data->writer }}">
        </div>
        <div class="form-group">
            <div>
                <label>Current Article Image</label>
                <img src="{{ asset('storage/'.$data->image) }}" alt="" srcset="" width="160px">
            </div>
            <label>New Article Image</label>
            <input name="img_article" type="file" class="form-control-file" id="img_article" >
        </div>
        <div class="form-group">
            <label>Image Description</label>
            <input name="txt_imgDesc" type="text" class="form-control" id="txt_imgDesc" placeholder="Image Description" value="{{ $data->imageDesc }}">
        </div>
        <button type="submit" name="" id="" class="btn btn-primary" btn-lg btn-block">Update Article</button>
    </form>
</div>
@endsection

@section('more-script')
    $(document).ready(function() {
        $('#txt_artContent').summernote({
            height: 300
        });
        $('#txt_artContent').summernote('pasteHTML','{!! $data->content !!}');
    });

@endsection
