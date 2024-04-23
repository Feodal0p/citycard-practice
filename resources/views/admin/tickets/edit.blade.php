@extends('layouts.base')

@section('content')
<div class="card w-50 text-center mx-auto">
    <div class="card-header">
     Редагування запису квитка
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <form action="{{ route('admin.ticket.update', [$city, $ticket])}}" method='POST'>
            @csrf
            @method('PATCH')
            <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Тип квитка</span>
                <input type="text" class="form-control" placeholder="Введіть тип квитка" name="type" value="{{old('type', $ticket->type)}}"> 
                    @error('type')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
              <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Тип транспорту</span>
                <input type="text" class="form-control" placeholder="Введіть тип транспорту" name="transport_type" value="{{old('transport_type', $ticket->transport_type)}}">
                    @error('transport_type')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
              <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Ціна</span>
                <input type="text" class="form-control" placeholder="Введіть ціну" name="price" value="{{old('price', $ticket->price)}}">
                    @error('price')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
            <div class ="input-group mb-3">
              <input type="submit" class="btn btn-block btn-primary mx-auto" value="Оновити">
            </div>
          </form>
      </blockquote>
    </div>
  </div>
@endsection