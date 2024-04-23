@extends('layouts.base')

@section('content')
<div class="card w-50 text-center mx-auto">
    <div class="card-header">
     Створення нового запису квитка
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <form action="{{ route('admin.ticket.create', $city)}}" method='POST'>
            @csrf
            <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Тип квитка</span>
                <input type="text" class="form-control" placeholder="Введіть тип квитка" name="type">
                    @error('type')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
              <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Тип транспорту</span>
                <input type="text" class="form-control" placeholder="Введіть тип транспорту" name="transport_type">
                    @error('transport_type')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
              <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Ціна</span>
                <input type="text" class="form-control" placeholder="Введіть ціну" name="price">
                    @error('price')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
            <div class ="input-group mb-3">
              <input type="submit" class="btn btn-block btn-primary mx-auto" value="Create">
            </div>
          </form>
      </blockquote>
    </div>
  </div>
@endsection