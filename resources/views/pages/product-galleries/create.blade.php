@extends('layouts.default')

@push('after-style')
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <select name="products_id" id="products_id" class="form-control @error('products_id') is-invalid
                    @enderror">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                    </select>
                    @error('products_id')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo" class="form-control-label">Foto Barang</label>
                    <input type="file" name="photo" accept="image/*" value="{{ old('photo') }}" class="form-control @error('photo') is-invalid
                    @enderror">
                    @error('photo')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_default" class="form-control-label">Jadikan Default</label>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input @error('is_default') is-invalid
                        @enderror" name="is_default" id="is_default" value="1">
                        Ya
                      </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input @error('is_default') is-invalid
                        @enderror" name="is_default" id="is_default" value="0">
                        Tidak
                      </label>
                    </div>
                    @error('is_default')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Foto Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('after-script')
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
        .create( document.querySelector( '.ckeditor' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
</script>
@endpush
