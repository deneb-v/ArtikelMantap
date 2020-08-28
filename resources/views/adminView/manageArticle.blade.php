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
                <th scope="col">Article</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td>2019-08-27</td>
                <td>Astronom: Satelit SpaceX Bisa Ganggu Penemuan Astronomi</td>
                <td><img src="https://akcdn.detik.net.id/community/media/visual/2019/05/27/a134dccc-3389-4a99-938d-0a4cc73a6494_43.jpeg?w=700&q=90"
                        alt="" srcset="" width="60%"></td>
                <td>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora numquam quod ullam,
                        perferendis eligendi excepturi repellendus rem sapiente quia provident neque earum fuga
                        porro itaque, dolorum dignissimos libero ad non!</p>
                </td>
                <td><button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block">Edit</button></td>
                <td><button type="button" name="" id="" class="btn btn-danger" btn-lg btn-block">Delete</button>
                </td>
            </tr>

            <tr>
                <td scope="row">2</td>
                <td>2019-08-27</td>
                <td>Astronom: Satelit SpaceX Bisa Ganggu Penemuan Astronomi</td>
                <td><img src="https://akcdn.detik.net.id/community/media/visual/2019/05/27/a134dccc-3389-4a99-938d-0a4cc73a6494_43.jpeg?w=700&q=90"
                        alt="" srcset="" width="60%"></td>
                <td>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora numquam quod ullam,
                        perferendis eligendi excepturi repellendus rem sapiente quia provident neque earum fuga
                        porro itaque, dolorum dignissimos libero ad non!</p>
                </td>
                <td><button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block">Edit</button></td>
                <td><button type="button" name="" id="" class="btn btn-danger" btn-lg btn-block">Delete</button>
                </td>
            </tr>

            <tr>
                <td scope="row">3</td>
                <td>2019-08-27</td>
                <td>Astronom: Satelit SpaceX Bisa Ganggu Penemuan Astronomi</td>
                <td><img src="https://akcdn.detik.net.id/community/media/visual/2019/05/27/a134dccc-3389-4a99-938d-0a4cc73a6494_43.jpeg?w=700&q=90"
                        alt="" srcset="" width="60%"></td>
                <td>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora numquam quod ullam,
                        perferendis eligendi excepturi repellendus rem sapiente quia provident neque earum fuga
                        porro itaque, dolorum dignissimos libero ad non!</p>
                </td>
                <td><button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block">Edit</button></td>
                <td><button type="button" name="" id="" class="btn btn-danger" btn-lg btn-block">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
