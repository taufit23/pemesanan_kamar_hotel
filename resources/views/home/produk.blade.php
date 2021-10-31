<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Pemesanan kamar hotel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
@foreach ($about as $tentang)


    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="/">{{ $tentang->nama_hotel }}</a>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item  {{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ route('index') }}" class="nav-link" data-nav-section="tentang">Tentang
                            kami</a>
                    </li>
                    <li class="nav-item  {{ Request::is('/produk') ? 'active' : '' }}">
                        <a href="{{ route('produk') }}" class="nav-link" data-nav-section="produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daftar_harga') }}">Daftar harga</a>
                    </li>
                </ul>

            </div>
        </nav>

        <main role="main" class="container my-5 py-5">
            <div data-section="produk" style="background-image: url(images/slide_2.jpg);"
                data-stellar-background-ratio="0.5">
                <div class="fh5co-overlay"></div>
                <div class="container">
                    <h1 class="text-center">Produk</h1>
                    <div class="row justify-content-center">
                        @foreach ($kamar as $produk)
                            <div class="card mx-3" style="width: 18rem;">
                                <img src="{{ asset('kamar/' . $produk->gambar_kamar) }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Jenis Produk : {{ $produk->type_kamar }}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Harga Produk<span class="float-right">Rp.
                                            {{ number_format($produk->harga_kamar, 0, '.', '.') }}</span></li>
                                </ul>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Harga Produk + breakfast<span class="float-right">Rp.
                                            {{ number_format($produk->harga_kamar + 80000, 0, '.', '.') }}</span>
                                    </li>
                                </ul>
                                <a href="{{ route('daftar_harga') }}"
                                    class="card-link btn btn-sm btn-outline-info m-2">Pesan Produk</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main><!-- /.container -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
    </body>
@endforeach


</html>
