@extends('layouts.base')

@section('content')
    @if (!$cards->isEmpty())
        @foreach($cards as $card)
            <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">{{$card->balance}}₴</h5>
                <h6 class="card-subtitle mb-2 text-muted">Тип:{{$card->type}}</h6>
                <p class="card-text">Номер:{{$card->number}}</p>
                <a href="#" class="card-link">Історія поповнень</a>
                <a href="#" class="card-link">Історія поїздок</a>
            </div>
            </div>
        @endforeach
    @else
        <p> you don't have a card
    @endif
@endsection