@extends('layouts.base')

@section('content')
<div class="card w-50 text-center mx-auto">
    <div class="card-header">
     Редагування міста
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <form action="{{ route('admin.city.update', $city)}}" method='POST'>
            @csrf
            @method('PATCH')
            <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Назва міста</span>
                <input type="text" class="form-control" placeholder="Введіть назву міста" name="name" value="{{old('name', $city->name)}}">
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
              <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Область міста</span>
                <input type="text" class="form-control" placeholder="Введіть область міста" name="region" value="{{old('region', $city->region)}}">
                    @error('region')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
            <div class ="input-group mb-3">
              <input type="submit" class="btn btn-block btn-primary mx-auto" value="Update">
            </div>
          </form>
      </blockquote>
    </div>
  </div>
@endsection