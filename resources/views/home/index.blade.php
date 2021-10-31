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
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a href="#tentang" class="nav-link " data-nav-section="tentang">Tentang kami</a>
                    </li>
                    <li class="nav-item {{ Request::is('/produk') ? 'active' : '' }}">
                        <a href="{{ route('produk') }}" class="nav-link " data-nav-section="produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daftar_harga') }}">Daftar harga</a>
                    </li>
                </ul>

            </div>
        </nav>

        <main role="main" class="container">
            <div id="tentang" data-section="tentang" class="my-5 py-5">
                <div class="fh5co-2col fh5co-bg to-animate-2" style="background-image: url(images/res_img_1.jpg)"></div>
                <div class="fh5co-2col fh5co-text">
                    <h2 class="heading to-animate">Tentang kami</h2><br>
                    <h2>{{ $tentang->nama_hotel }}</h2>
                    <p class="to-animate">{{ $tentang->deksipsi_hotel }}</p>
                    <span class="badge badge-primary ">Contact Telpon : {{ $tentang->no_telp_hotel }} </span>
                    <span class="badge badge-secondary ">Contact email :
                        {{ $tentang->email_hotel }}</span>

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
