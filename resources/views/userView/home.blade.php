@extends('Template.user')
@section('title')
    Home | Artikel Mantap
@endsection

@section('content')

@foreach ($artikel as $art)
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
    </div>

    <hr>
@endforeach

@endsection
