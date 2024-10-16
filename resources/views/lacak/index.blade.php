@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="position-center">
            <div class="position-absolute top-50 start-50 translate-middle">
                <form id="lacak_form" method="GET" action="{{ route('lacak.show') }}" class="mb-3">
                    <input type="text" id="no_resi" name="no_resi" placeholder="Cari Transaksi" value="{{ request('no_resi') }}" class="form-control" style="display:inline-block; width:auto;">
                    <button type="submit" class="btn btn-primary">Lacak</button>
                </form>
                @if(session('error'))
                    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection