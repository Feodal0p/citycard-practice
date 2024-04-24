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
          Створення нового запису міста
        </div>
        <div class="col col-lg-2"></div>
      </div>
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <form action="{{ route('admin.city.create')}}" method='POST'>
            @csrf
            <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Name of the city</span>
                <input type="text" class="form-control" placeholder="Enter name of the city" name="name">
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
              <div class="input-group mb-3 mx-auto">
                <span class="input-group-text" id="inputGroup-sizing-default">Region of the city</span>
                <input type="text" class="form-control" placeholder="Enter region of the city" name="region">
                    @error('region')
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