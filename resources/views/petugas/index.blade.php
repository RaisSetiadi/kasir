<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Produk</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

    <body style="background: lightgray">
        @include('sweetalert::alert')
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center my-4">Data-Data Produk dari 52Mart</h3>
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <a href="{{ route('petugas.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">PASSWORD</th>
                                        <th scope="col">ROLE</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($petugas as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->password}}</td>
                                        <td>{!! $data->usertype !!}</td>
                                        <td class="text-center">
                                            <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        <td>
                                            <a href="{{ route('produk.destroy', $data->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                        </td>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $petugas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    </body>

    </html>
</x-app-layout>