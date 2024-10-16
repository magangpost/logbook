@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="position-center">
            <div class="position-absolute top-20 start-50 translate-middle-x">
                @if($transaksi)
                <div class="header">
                    HASIL TRACKING PENGIRIMAN DENGAN NOMER RESI {{ $transaksi->no_resi }} ADALAH :
                </div>
                <div class="card mx-auto mt-5" style="width: 18rem;">
                    <ul class="list-group justify-content-center list-group-flush">
                        @foreach($transaksi->lacak as $item)
                        @if($item['status'] === 'DELIVERED')
                            <li class="list-group-item">
                                <div class="tracking-iteeem">
                                    <img class="buletbulet" src="{{asset('assets/img/Pizza_Boxes.png')}}"></img>
                                    <div class="lengkaap">
                                        <div class="tangggaall">{{ $item['waktu'] }}</div>
                                        <div class="sssttaatuss">{{ $item['status'] }}</div>
                                        <div class="deeeskripsssi">{{ $item['deskripsi'] }}</div>
                                    </div>
                                </div>
                            </li>
                        @elseif($item['status'] === 'ON DELIVER')
                            <li class="list-group-item">
                                <div class="tracking-iteeem">
                                    <img class="buletbulet" src="{{asset('assets/img/Move.png')}}"></img>
                                    <div class="lengkaap">
                                        <div class="tangggaall">{{ $item['waktu'] }}</div>
                                        <div class="sssttaatuss">{{ $item['status'] }}</div>
                                        <div class="deeeskripsssi">{{ $item['deskripsi'] }}</div>
                                    </div>
                                </div>
                            </li>
                        @elseif($item['status'] === 'PACKAGING')
                            <li class="list-group-item">
                                <div class="tracking-iteeem">
                                    <img class="buletbulet" src="{{asset('assets/img/Opened_Box.png')}}"></img>
                                    <div class="lengkaap">
                                        <div class="tangggaall">{{ $item['waktu'] }}</div>
                                        <div class="sssttaatuss">{{ $item['status'] }}</div>
                                        <div class="deeeskripsssi">{{ $item['deskripsi'] }}</div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                @else
                    <p>No transaction found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection