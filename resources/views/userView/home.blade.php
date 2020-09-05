@extends('Template.user')
@section('title')
    Home | Artikel Mantap
@endsection

@section('content')

@foreach ($artikel as $art)
    <div class="container pt-2" id="article">
        <div class="row">

        </div>
        <div class="row" id="art-img">
            <div class="col-xl-4 text-center">
                <img src="{{ asset('storage/'.$art->image) }}" class="rounded w-50" alt="...">
            </div>
            <div class="col-xl-8 d-flex flex-column justify-content-center">
                <a style="font-size: 1.5rem" href="{{ route('artikel',$art->id) }}">{{ $art->title }}</a>
                {{-- <h4>{{ $art->title }}</h4> --}}
                <p class="text-muted p-0 m-0">{{ $art->writer }} - {{ $art->updated_at }}</p>
            </div>
        </div>
    </div>

    <hr>
@endforeach
{{ $artikel->links() }}
@endsection
