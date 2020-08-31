@extends('Template.admin')
@section('title')
    Manage Article | Artikel Mantap
@endsection

@section('content')
<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date Added</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Image Description</th>
                <th scope="col">Article</th>
            </tr>
        </thead>
        <tbody>
            {{-- 'title',
            'content',
            'writer',
            'image',
            'imageDesc' --}}
            @foreach ($list as $item)
                <tr>
                    <td scope="row">{{$item->id}}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{asset('img/'.$item->image)}}" alt="" srcset="" width="160px"></td>
                    <td>{{ $item->imageDesc }}</td>
                    <td>
                        <p>{!!$item->content!!}</p>
                    </td>
                    <td><button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block">Edit</button></td>
                    <td><button type="button" name="" id="" class="btn btn-danger" btn-lg btn-block">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
