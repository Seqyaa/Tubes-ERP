@extends('mainDashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Manufacturing</li>
                <li class="breadcrumb-item active">Data Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Produk</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <div class="card-body">
                                <a href="input-produk"><button type="button" class="btn btn-primary">Tambah
                                        Produk</button></a>
                                <a href="cetak-produk" target="_blank"><button type="button"
                                        class="btn btn-secondary">Cetak Produk</button></a>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Barcode</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $pdk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate($pdk->kode); !!}</td>
                                            <td width="20%">{{ $pdk->nama }}</td>
                                            <td>{{ $pdk->kode }}</td>
                                            <td width="20%">{{ 'Rp. ' . $pdk->harga }}</td>
                                            <td>{{ $pdk->stok }}</td>
                                            <td width="20%">
                                                <img src="{{ url('/img_produk/' . $pdk->gambar) }}" width="40%"
                                                    alt="" style="max-width: 7rem;">
                                            </td>
                                            <td>
                                                <a href="/home/produk/edit/{{ $pdk->id }}">Edit  | </a>
                                                <a href="/home/produk/delete/{{ $pdk->id }}">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
