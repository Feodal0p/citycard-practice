@extends('layouts.base')

@section('content')
    <div class="row w-100">
    @if (!$cards->isEmpty())
        @foreach($cards as $card)
            <div class="card mx-auto" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title">{{$card->balance}}₴</h5>
                <h6 class="card-subtitle mb-2 text-muted">Тип: {{$card->type}}</h6>
                <p class="card-text">Номер: {{$card->number}}</p>
                <div class="row w-100">
                    <div class="col text-start">
                        <a href="{{ route('user.charge', $card)}}" class="card-link">Історія поповнень</a>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('user.usage', $card)}}" class="card-link">Історія використань</a>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    @else
    </div>
    <div class="card mx-auto" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title">До цього номеру не прив'язано жодної картки</h5>
            <form action="{{route('user.index')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-block btn-primary">
                    Створити картку
                </button>
             </form>
            {{-- <div class="mx-auto">
                <Button class="btn btn-block btn-primary">Добавити картку</Button>
            </div> --}}
        </div>
    </div>
    @endif
@endsection