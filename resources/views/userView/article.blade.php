@extends('Template.user')
@section('title')
    {{ $art->title }} | Artikel Mantap
@endsection

@section('content')
    <div class="container pt-2" id="article">
        <div class="row" id="art-title">
            <div class="col text-center">
                <h1>{{ $art->title }}</h1>
                <p class="text-muted p-0 m-0">{{ $art->writer }}</p>
                <p class="text-muted ">{{ $art->updated_at }}</p>
            </div>
        </div>
        <div class="row" id="art-img">
            <div class="col">
                <div class="text-center">
                    <img src="{{ asset('storage/'.$art->image) }}"class="rounded" alt="...">
                    <p>{{ $art->imageDesc }}</p>
                </div>
            </div>
        </div>

        <div class="row" id="art-text">
            <div class="col-xl-2">
                {{-- blank --}}
            </div>
            <div class="col-xl-8">
                {!! $art->content !!}
            </div>
            <div class="col-xl-2">
                {{-- blank --}}
            </div>
        </div>

        <hr>

        <div class="mb-5">
            <h3>Send your comment!</h3>
            <hr>
            <form action="{{ route('postComment',$art->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Name</label>
                    <input name="txt_name" type="text" class="form-control" id="txt_name" placeholder="Title">
                </div>
                <div class="form-group">
                    <label>Comment</label>
                    <textarea class="form-control" id="txt_comment" name="txt_comment" rows="3"></textarea>
                </div>

                <button type="submit" name="" id="" class="btn btn-primary" btn-lg btn-block">Post Comment</button>
            </form>
        </div>

        <div>
            <h3>Comments</h3>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{$err}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('commentSuccess'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('commentSuccess')}}
                </div>
            @endif
            <div id="comment">
                @forelse ($comment as $item)
                    <hr>
                    <h5>{{ $item->name }}</h5>
                    <p>{{ $item->comment }}</p>
                @empty
                    <hr>
                    <p class="text-center">No comment</p>
                @endforelse
            </div>
            <hr>
        </div>
    </div>
@endsection
