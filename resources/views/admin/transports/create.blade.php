@extends('layouts.base')

@section('content')
<div class="card w-50 text-center mx-auto">
    <div class="card-header">
      <div class="row">
        <div class="col col-lg-2 text-center">
          <a href="{{URL::previous()}}">
            <i class="bi bi-arrow-left h4"></i>
        </a>
        </div>
        <div class="col text-center">
          Створення нового запису транспорту для міста {{$city->region . " " . $city->name}}
        </div>
        <div class="col col-lg-2 text-end"></div>
      </div>
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <form action="{{ route('admin.transport.create', $city)}}" method='POST'>
            @csrf
            <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Тип транспорту</span>
                <input type="text" class="form-control" placeholder="Введіть тип транспорту" name="transport_type">
                    @error('transport_type')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
              <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Номер маршруту</span>
                <input type="text" class="form-control" placeholder="Введіть номер маршруту" name="route_number">
                    @error('route_number')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
              <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Опис маршруту</span>
                <input type="text" class="form-control" placeholder="Введіть опис маршруту" name="route_description">
                    @error('route_description')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
            <div class ="input-group mb-3">
              <input type="submit" class="btn btn-block btn-primary mx-auto" value="Створити">
            </div>
          </form>
      </blockquote>
    </div>
  </div>
@endsection