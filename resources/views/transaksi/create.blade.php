@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Transaction') }}</div>
                <div class="card-body">
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf

                        <div class="row mb-2 justify-content-end">
                            <label for="no_resi" class="col-md-5 col-form-label text-md-start">{{ __('No Resi') }}</label>

                            <div class="col-md-6">
                                <input id="no_resi" type="text" class="form-control @error('no_resi') is-invalid @enderror" name="no_resi" value="{{ old('no_resi') }}" required autocomplete="no_resi" autofocus>

                                @error('no_resi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="layanan" class="col-md-5 col-form-label text-md-start">{{ __('Layanan') }}</label>

                            <div class="col-md-6">
                                <input id="layanan" type="text" class="form-control @error('layanan') is-invalid @enderror" name="layanan" value="{{ old('layanan') }}" required autocomplete="layanan" autofocus>

                                @error('layanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="isi_kiriman" class="col-md-5 col-form-label text-md-start">{{ __('Isi Kiriman') }}</label>

                            <div class="col-md-6">
                                <input id="isi_kiriman" type="text" class="form-control @error('isi_kiriman') is-invalid @enderror" name="isi_kiriman" value="{{ old('isi_kiriman') }}" required autocomplete="isi_kiriman" autofocus>

                                @error('isi_kiriman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="nama_pengirim" class="col-md-5 col-form-label text-md-start">{{ __('Nama Pengirim') }}</label>

                            <div class="col-md-6">
                                <input id="nama_pengirim" type="text" class="form-control @error('nama_pengirim') is-invalid @enderror" name="nama_pengirim" value="{{ old('nama_pengirim') }}" required autocomplete="nama_pengirim" autofocus>

                                @error('nama_pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="alamat_pengirim" class="col-md-5 col-form-label text-md-start">{{ __('Alamat Pengirim') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_pengirim" type="text" class="form-control @error('alamat_pengirim') is-invalid @enderror" name="alamat_pengirim" value="{{ old('alamat_pengirim') }}" required autocomplete="alamat_pengirim" autofocus>

                                @error('alamat_pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="kprk" class="col-md-5 col-form-label text-md-start">{{ __('KPRK') }}</label>

                            <div class="col-md-6">
                                <input id="kprk" type="text" class="form-control @error('kprk') is-invalid @enderror" name="kprk" value="{{ old('kprk') }}" required autocomplete="kprk" autofocus>

                                @error('kprk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="ktrkirim" class="col-md-5 col-form-label text-md-start">{{ __('KTR Kirim') }}</label>

                            <div class="col-md-6">
                                <input id="ktrkirim" type="text" class="form-control @error('ktrkirim') is-invalid @enderror" name="ktrkirim" value="{{ old('ktrkirim') }}" required autocomplete="ktrkirim" autofocus>

                                @error('ktrkirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="nama_penerima" class="col-md-5 col-form-label text-md-start">{{ __('Nama Penerima') }}</label>

                            <div class="col-md-6">
                                <input id="nama_penerima" type="text" class="form-control @error('nama_penerima') is-invalid @enderror" name="nama_penerima" value="{{ old('nama_penerima') }}" required autocomplete="nama_penerima" autofocus>

                                @error('nama_penerima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="alamat_penerima" class="col-md-5 col-form-label text-md-start">{{ __('Alamat Penerima') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_penerima" type="text" class="form-control @error('alamat_penerima') is-invalid @enderror" name="alamat_penerima" value="{{ old('alamat_penerima') }}" required autocomplete="alamat_penerima" autofocus>

                                @error('alamat_penerima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="kodepos_penerima" class="col-md-5 col-form-label text-md-start">{{ __('Kode Pos Penerima') }}</label>

                            <div class="col-md-6">
                                <input id="kodepos_penerima" type="text" class="form-control @error('kodepos_penerima') is-invalid @enderror" name="kodepos_penerima" value="{{ old('kodepos_penerima') }}" required autocomplete="kodepos_penerima" autofocus>

                                @error('kodepos_penerima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="kota_tujuan" class="col-md-5 col-form-label text-md-start">{{ __('Kota Tujuan') }}</label>

                            <div class="col-md-6">
                                <input id="kota_tujuan" type="text" class="form-control @error('kota_tujuan') is-invalid @enderror" name="kota_tujuan" value="{{ old('kota_tujuan') }}" required autocomplete="kota_tujuan" autofocus>

                                @error('kota_tujuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="berat" class="col-md-5 col-form-label text-md-start">{{ __('Berat') }}</label>

                            <div class="col-md-6">
                                <input id="berat" type=number step=any class="form-control @error('berat') is-invalid @enderror" name="berat" value="{{ old('berat') }}" required autocomplete="berat" autofocus>

                                @error('berat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="bea_dasar" class="col-md-5 col-form-label text-md-start">{{ __('Bea Dasar') }}</label>

                            <div class="col-md-6">
                                <input id="bea_dasar" type="number" class="form-control @error('bea_dasar') is-invalid @enderror" name="bea_dasar" value="{{ old('bea_dasar') }}" required autocomplete="bea_dasar" autofocus>

                                @error('bea_dasar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="ppn" class="col-md-5 col-form-label text-md-start">{{ __('PPN') }}</label>

                            <div class="col-md-6">
                                <input id="ppn" type="text" class="form-control @error('ppn') is-invalid @enderror" name="ppn" value="{{ old('ppn') }}" required autocomplete="ppn" autofocus>

                                @error('ppn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="htnb" class="col-md-5 col-form-label text-md-start">{{ __('HTNB') }}</label>

                            <div class="col-md-6">
                                <input id="htnb" type="text" class="form-control @error('htnb') is-invalid @enderror" name="htnb" value="{{ old('htnb') }}" required autocomplete="htnb" autofocus>

                                @error('htnb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="jumlah" class="col-md-5 col-form-label text-md-start">{{ __('Jumlah') }}</label>

                            <div class="col-md-6">
                                <input id="jumlah" type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') }}" required autocomplete="jumlah" autofocus>

                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="tanggal_kirim" class="col-md-5 col-form-label text-md-start">{{ __('Tanggal Kirim') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal_kirim" type="date" class="form-control @error('tanggal_kirim') is-invalid @enderror" name="tanggal_kirim" value="{{ old('tanggal_kirim') }}" required autocomplete="tanggal_kirim" autofocus>

                                @error('tanggal_kirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="tanggal_terima" class="col-md-5 col-form-label text-md-start">{{ __('Tanggal Terima') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal_terima" type="date" class="form-control @error('tanggal_terima') is-invalid @enderror" name="tanggal_terima" value="{{ old('tanggal_terima') }}" required autocomplete="tanggal_terima" autofocus>

                                @error('tanggal_terima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="status" class="col-md-5 col-form-label text-md-start">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" required autocomplete="status" autofocus>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="sla" class="col-md-5 col-form-label text-md-start">{{ __('SLA') }}</label>

                            <div class="col-md-6">
                                <input id="sla" type="number" class="form-control @error('sla') is-invalid @enderror" name="sla" value="{{ old('sla') }}" required autocomplete="sla" autofocus>

                                @error('sla')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="aktual_sla" class="col-md-5 col-form-label text-md-start">{{ __('Aktual SLA') }}</label>

                            <div class="col-md-6">
                                <input id="aktual_sla" type="number" class="form-control @error('aktual_sla') is-invalid @enderror" name="aktual_sla" value="{{ old('aktual_sla') }}" required autocomplete="aktual_sla" autofocus>

                                @error('aktual_sla')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="status_sla" class="col-md-5 col-form-label text-md-start">{{ __('Status SLA') }}</label>

                            <div class="col-md-6">
                                <input id="status_sla" type="text" class="form-control @error('status_sla') is-invalid @enderror" name="status_sla" value="{{ old('status_sla') }}" required autocomplete="status_sla" autofocus>

                                @error('status_sla')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="zonecode" class="col-md-5 col-form-label text-md-start">{{ __('Zonecode') }}</label>

                            <div class="col-md-6">
                                <input id="zonecode" type="text" class="form-control @error('zonecode') is-invalid @enderror" name="zonecode" value="{{ old('zonecode') }}" required autocomplete="zonecode" autofocus>

                                @error('zonecode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="kprktujuan" class="col-md-5 col-form-label text-md-start">{{ __('KPRK Tujuan') }}</label>

                            <div class="col-md-6">
                                <input id="kprktujuan" type="text" class="form-control @error('kprktujuan') is-invalid @enderror" name="kprktujuan" value="{{ old('kprktujuan') }}" required autocomplete="kprktujuan" autofocus>

                                @error('kprktujuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="nilaibarang" class="col-md-5 col-form-label text-md-start">{{ __('Nilai Barang') }}</label>

                            <div class="col-md-6">
                                <input id="nilaibarang" type=number step=any class="form-control @error('nilaibarang') is-invalid @enderror" name="nilaibarang" value="{{ old('nilaibarang') }}" required autocomplete="nilaibarang" autofocus>

                                @error('nilaibarang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="noref" class="col-md-5 col-form-label text-md-start">{{ __('No Ref') }}</label>

                            <div class="col-md-6">
                                <input id="noref" type="text" class="form-control @error('noref') is-invalid @enderror" name="noref" value="{{ old('noref') }}" required autocomplete="noref" autofocus>

                                @error('noref')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="kodepelanggan" class="col-md-5 col-form-label text-md-start">{{ __('Kode Pelanggan') }}</label>

                            <div class="col-md-6">
                                <input id="kodepelanggan" type="text" class="form-control @error('kodepelanggan') is-invalid @enderror" name="kodepelanggan" value="{{ old('kodepelanggan') }}" required autocomplete="kodepelanggan" autofocus>

                                @error('kodepelanggan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="nilaicod" class="col-md-5 col-form-label text-md-start">{{ __('Nilai COD') }}</label>

                            <div class="col-md-6">
                                <input id="nilaicod" type=number step=any class="form-control @error('nilaicod') is-invalid @enderror" name="nilaicod" value="{{ old('nilaicod') }}" required autocomplete="nilaicod" autofocus>

                                @error('nilaicod')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="va" class="col-md-5 col-form-label text-md-start">{{ __('VA') }}</label>

                            <div class="col-md-6">
                                <input id="va" type="text" class="form-control @error('va') is-invalid @enderror" name="va" value="{{ old('va') }}" required autocomplete="va" autofocus>

                                @error('va')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="nopendkirim" class="col-md-5 col-form-label text-md-start">{{ __('No Pend Kirim') }}</label>

                            <div class="col-md-6">
                                <input id="nopendkirim" type="text" class="form-control @error('nopendkirim') is-invalid @enderror" name="nopendkirim" value="{{ old('nopendkirim') }}" required autocomplete="nopendkirim" autofocus>

                                @error('nopendkirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="beratvoulume" class="col-md-5 col-form-label text-md-start">{{ __('Berat Volume') }}</label>

                            <div class="col-md-6">
                                <input id="beratvoulume" type=number step=any class="form-control @error('beratvoulume') is-invalid @enderror" name="beratvoulume" value="{{ old('beratvoulume') }}" required autocomplete="beratvoulume" autofocus>

                                @error('beratvoulume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-end">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-secondary float-end">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection