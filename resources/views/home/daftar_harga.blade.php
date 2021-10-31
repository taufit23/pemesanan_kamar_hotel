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
                    <li class="nav-item">
                        <a href="{{ route('daftar_harga') }}" type="button" class="nav-link" data-toggle="modal"
                            data-target="#staticBackdrop">
                            Pesan kamar
                        </a>
                    </li>

                </ul>

            </div>
        </nav>

        <main role="main" class="container my-5 py-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis kamar</th>
                        <th scope="col">Harga kamar</th>
                        <th scope="col">Harga kamar + Breakfast</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kamar as $harga)
                        <tr>
                            <th>
                                {{ $kamar->count() * ($kamar->currentPage() - 1) + $loop->iteration }}
                            </th>
                            <td>
                                <a href="#">{{ $harga->type_kamar }}</a>
                            </td>
                            <td>
                                Rp. {{ number_format($harga->harga_kamar, 0, '.', '.') }}
                            </td>
                            <td>
                                Rp. {{ number_format($kamar_breakfast, 0, '.', '.') }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info btn-outline-primary text-light"
                                    data-toggle="modal" data-target="#staticBackdrop">
                                    Pesan
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <h4 class="text-center">Data Not Found</h4>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </main>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Pesan kamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('buat_pesanan') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="col-4">
                                    <label for="" class="mr-1">Nama pemesan : </label>
                                </div>
                                <div class="col-8">

                                    <input type="text" class="form-control" placeholder="Sample : Taufit Hidayat"
                                        aria-label="nama_pemesan" aria-describedby="basic-addon1" name="nama_pemesan">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="col-4">
                                    <label for="" class="mr-1">Jenis kelamin pemesan : </label>
                                </div>
                                <div class="col-8">
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="jenis_kelamin1" value="lk">
                                        <label class="form-check-label" for="jenis_kelamin">
                                            Laki laki
                                        </label>
                                    </div>
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="jenis_kelamin1" value="pr">
                                        <label class="form-check-label" for="jenis_kelamin">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="col-4">
                                    <label for="" class="mr-1">Nomor identitas pemesan : </label>
                                </div>
                                <div class="col 8">

                                    <style>
                                        input::-webkit-outer-spin-button,
                                        input::-webkit-inner-spin-button {
                                            -webkit-appearance: none;
                                            margin: 0;
                                        }

                                        /* Firefox */
                                        input[type=number] {
                                            -moz-appearance: textfield;
                                        }

                                    </style>
                                    <input name="nomor_identitas_pemesan" class="form-control"
                                        placeholder="Sample : 3021534525489725"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type="number" maxlength="16" />
                                </div>
                            </div>
                            <label for="basic-url">Produk</label>
                            <div class="input-group mb-3">
                                <div class="col 4">
                                    <label for="" class="mr-1">Jenis produk : </label>
                                </div>
                                <div class="col-8">

                                    <select name="jenis_kamar" class=" form-control ice-cream" id="jenis_kamar">
                                        @foreach ($kamar as $produk)
                                            <option value="{{ $produk->type_kamar }}">
                                                {{ $produk->type_kamar . ' Harga = ' . $produk->harga_kamar }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="col-4">
                                    <label for="" class="mr-1">Waktu pesanan : </label>
                                </div>
                                <div class="col-8">
                                    <div class="input-group-append">
                                        <input type="datetime" value="{{ $waktu_pesan }}" class="form-control"
                                            name="waktu_pesanan" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="col-4">
                                    <label for="" class="mr-1">Waktu menginap : </label>
                                </div>
                                <div class="col-8">
                                    <div class="input-group-append">
                                        <input type="number" class="form-control" name="waktu_menginap">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="col-4">
                                    <label for="" class="mr-1">fasilitas breakfast? : </label>
                                </div>
                                <div class="col-8">
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="radio" name="breakfast" id="breakfast1"
                                            value="y">
                                        <label class="form-check-label" for="breakfast">
                                            Fasilitas breakfast
                                        </label>
                                    </div>
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-primary">Pesan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
    </body>
@endforeach


</html>
