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

        <main role="main" class="container my-5 py-5">
            <div class="card ">
                <div class="card-header">
                    Pesanan
                </div>
                @foreach ($pesanan as $pesan)
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Nama Pemesan <span
                                    class="float-right">{{ $pesan->nama_pemesan }}</span></li>
                            <li class="list-group-item">Jenis kelamin <span class="float-right">
                                    @if ($pesan->jenis_kelamin_pemesan == 'lk')
                                        Laki - laki
                                    @else
                                        Perempuan
                                    @endif
                                </span></li>
                            <li class="list-group-item">nomor identitas<span
                                    class="float-right">{{ $pesan->nomor_identitas_pemesan }}</span></li>
                            <li class="list-group-item">jenis kamar<span
                                    class="float-right">{{ $pesan->kamar->type_kamar }}</span></li>
                            <li class="list-group-item">Harga kamar<span
                                    class="float-right">{{ $pesan->kamar->harga_kamar }}</span></li>
                            <li class="list-group-item">waktu menginap<span
                                    class="float-right">{{ $pesan->durasi_menginap }} Hari</span></li>
                            <li class="list-group-item">Fasilitas breakfast<span class="float-right">
                                    @if ($pesan->layanan_kamar == 'y')
                                        Ada
                                    @else
                                        Tidak ada
                                    @endif
                                </span></li>
                            <li class="list-group-item">Harga bayar<span class="float-right">Rp.
                                    {{ number_format($pesan->total_bayar, 0, '.', '.') }}</span>
                            </li>
                        </ul>
                    </div>
                @endforeach
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
