<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Data Produk</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body style="background: lightgray">

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('produk.update', $produks->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="form-group">
                                    <label class="font-weight-bold">NAMA PRODUK</label>
                                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk', $produks->nama_produk) }}" placeholder="Masukkan Judul Post">

                                    <!-- error message untuk nama_produk -->
                                    @error('nama_produk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">HARGA</label>
                                    <textarea class="form-control @error('harga') is-invalid @enderror" name="harga" rows="5" placeholder="Masukkan Konten Post">{{ old('harga', $produks->harga) }}</textarea>

                                    <!-- error message untuk harga -->
                                    @error('harga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">STOK</label>
                                    <textarea class="form-control @error('stok') is-invalid @enderror" name="stok" rows="5" placeholder="Masukkan Konten Post">{{ old('stok', $produks->stok) }}</textarea>

                                    <!-- error message untuk stok -->
                                    @error('stok')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    </body>

    </html>
</x-app-layout>