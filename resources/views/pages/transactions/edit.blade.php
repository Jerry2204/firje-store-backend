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
            <strong>Ubah Transaksi</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('transaction.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Pemesan</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}" class="form-control @error('name') is-invalid
                    @enderror">
                    @error('name')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') ? old('email') : $item->email }}" class="form-control @error('email') is-invalid
                    @enderror">
                    @error('email')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone_number" class="form-control-label">Nomor HP</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : $item->phone_number }}" class="form-control @error('phone_number') is-invalid
                    @enderror">
                    @error('phone_number')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="form-control-label">Alamat Pemesan</label>
                    <input type="text" name="address" value="{{ old('address') ? old('address') : $item->address }}" class="form-control @error('address') is-invalid
                    @enderror">
                    @error('address')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Update Transaksi</button>
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
