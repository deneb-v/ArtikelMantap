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
                    @auth
                        <input name="txt_name" type="text" class="form-control" id="txt_name" placeholder="Name" value="{{ Auth::user()->name }}">
                    @else
                        <input name="txt_name" type="text" class="form-control" id="txt_name" placeholder="Name">
                    @endauth
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
            <div id="comments">
                @forelse ($comment as $item)
                    <hr>
                    <div id="comment">
                        <h5>{{ $item->name }}</h5>
                        <p>{{ $item->comment }}</p>

                        <div class="modal fade" id="modal_addReply{{$item->id}}" tabindex="-1" aria-labelledby="modal_addReply{{$item->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Reply Comment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('postReply',$item->id) }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>Name</label>
                                                @auth
                                                    <input name="txt_name" type="text" class="form-control" id="txt_name" placeholder="Name" value="{{ Auth::user()->name }}">
                                                @else
                                                    <input name="txt_name" type="text" class="form-control" id="txt_name" placeholder="Name">
                                                @endauth
                                            </div>
                                            <div class="form-group">
                                                <label>Comment</label>
                                                <textarea class="form-control" id="txt_comment" name="txt_comment" rows="3"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Post Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="action">
                            <a data-toggle="collapse" href="#collapse{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$item->id}}">Show Reply</a>
                            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#modal_addReply{{$item->id}}">Reply</button>
                        </div>

                        <div class="collapse mt-3" id="collapse{{$item->id}}">
                            <?php
                                $counter = 0;
                            ?>
                            @foreach ($reply as $item2)
                                @if ($item2->id_komentar == $item->id)
                                    <div class="ml-5" id="reply">
                                        <hr>
                                        <h5>{{ $item2->name }}</h5>
                                        <p>{{ $item2->comment }}</p>
                                    </div>
                                    <?php
                                        $counter++;
                                    ?>
                                @endif
                            @endforeach
                            @if ($counter==0)
                                <div class="ml-5">
                                    <hr>
                                    <p class="text-center">No reply</p>
                                    <hr>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <hr>
                    <p class="text-center">No comment</p>
                @endforelse
            </div>
            <hr>
        </div>
    </div>
@endsection
