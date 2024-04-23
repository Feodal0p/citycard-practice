@extends('layouts.base')

@section('content')
<div class="card">
   <div class="card-header row w-100">
      <div class="col text-end">
         Міста
      </div>
      <div class="col text-end">
         <a href="{{ route('admin.city.create')}}">Добавити новий запис</a>
      </div>
   </div>
   <div class="card-body text-center">
      <table class="table">
         <thead>
           <tr>
             {{-- <th scope="col">#</th> --}}
             <th scope="col">Назва</th>
             <th scope="col">Транспорт</th>
             <th scope="col">Квитки</th>
             <th scope="col">Дія</th>
           </tr>
         </thead>
         <tbody>
            @if (!$cities->isEmpty())
               @foreach ($cities as $city)
               <tr>
                  {{-- <th scope="row">{{$city->id}}</th> --}}
                  <td>
                     {{$city->region . " " . $city->name}}
                  </td>
                  <td>
                     Кількість транспорту: {{count($transports->where('city_id', $city->id))}}
                     <p>
                        <a href="{{ route('admin.transport.index', $city) }}">Переглянути</a>
                     </p>
                  </td>
                  <td>Кількість квитків: {{count($tickets->where('city_id', $city->id))}}</td>
                  <td>
                     <a href="{{ route('admin.city.edit', $city) }}">
                        <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Редагувати назву"></i>
                     </a>
                     <form action="{{route('admin.city.delete', $city)}}" method="POST">
                        @csrf
                        @method('DELETE')    
                        <button type="submit" class="border-0 bg-transparent">
                           <i class="bi bi-trash" style="color: rgb(255, 0, 0)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Видалити запис"></i>
                        </button>
                     </form>
                  </td>
                </tr>
                @endforeach
            @else
            <td colspan="4">Не знайдено жодного запису</td>
            @endif
         </tbody>
       </table>
   </div>
</div>
@endsection