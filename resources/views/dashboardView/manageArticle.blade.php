@extends('Template.admin')
@section('title')
    Manage Article | Artikel Mantap
@endsection

@section('navItem')
    <li class="nav-item active">
        <a class="nav-link" href="{{route(Auth::user()->role)}}">Manage Article</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('newArticle'.Auth::user()->role)}}">Add Article </a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    @if (Session::has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date Added</th>
                <th scope="col">Writer</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Image Description</th>
                <th scope="col">Article</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
                <tr>
                    <td scope="row">{{$item->id}}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->writer }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{asset('storage/'.$item->image)}}" alt="img" srcset="" width="160px"></td>
                    <td>{{ $item->imageDesc }}</td>
                    <td>
                        {!!$item->content!!}
                    </td>
                    @if (Auth::user()->id == $item->writer_id)
                        <td><a href="{{ route('edit', ['id'=>$item->id]) }}" class="btn btn-primary btn-block">Edit</a></td>
                    @endif
                    <td>
                        <form action="{{ route('deleteArticle'.Auth::user()->role, ['id'=>$item->id]) }}" method="post">
                            {{ csrf_field() }}
                            @method('delete')
                            <button onclick="return confirm('Delete {{$item->title}} article?')" class="btn btn-danger btn-block">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
