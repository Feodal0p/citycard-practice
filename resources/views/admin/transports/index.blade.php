@extends('layouts.base')

@section('content')
<div class="card">
   <div class="card-header row w-100">
      <div class="col text-end">
        Транспорт {{$city->region . " " . $city->name}}
      </div>
      <div class="col text-end">
         <a href="">Добавити новий запис</a>
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
            {{-- @if (!$transports->isEmpty())
               @foreach ($cities as $city)
               <tr>
               </tr>
                @endforeach
            @else
            <td colspan="4">Не знайдено жодного запису</td>
            @endif --}}
         </tbody>
       </table>
   </div>
</div>
@endsection