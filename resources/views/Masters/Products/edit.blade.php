@extends('Template.index')

@section('content')

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('product.update', $product->id_produk) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" class="form-control" value="{{ $product->nama }}" required>
                </div>
                <div class="form-group">
                    <label>Merk</label>
                    <select class="form-control" name="merk">
                        <option value="1">Hilo</option>
                        <option value="2">Dancow</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <Textarea name="deskripsi" class="form-control">
                    {{ $product->deskripsi }}
                    </Textarea>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $product->harga }}" required>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ $product->stok }}" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>
@endsection