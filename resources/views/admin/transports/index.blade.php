@extends('layouts.base')

@section('content')
<div class="card">
   <div class="card-header row w-100">
      <div class="col col-lg-2 text-center">
         <a href="{{ route('admin.city.index')}}">
             <i class="bi bi-arrow-left h4"></i>
         </a>
     </div>
       <div class="col text-center">
         Транспорт {{$city->region . " " . $city->name}}
       </div>
       <div class="col col-lg-2 text-end">
         <a href="{{ route('admin.transport.create', $city)}}">Добавити новий запис</a>
       </div>
    </div>
   </div>
   <div class="card-body text-center">
      <table class="table">
         <thead>
           <tr>
             {{-- <th scope="col">#</th> --}}
             <th scope="col">Тип</th>
             <th scope="col">Номер маршруту</th>
             <th scope="col">Опис маршруту</th>
             <th scope="col">Дія</th>
           </tr>
         </thead>
         <tbody>
            @if (!$transports->isEmpty())
               @foreach ($transports as $transport)
               <tr>
                  <td>
                     {{$transport->transport_type}}
                  </td>
                  <td>
                     {{$transport->route_number}}
                  </td>
                  <td>
                     {{$transport->route_description}}
                  </td>
                  <td>
                     <a href="{{ route('admin.transport.edit', [$city, $transport]) }}">
                        <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Редагувати"></i>
                     </a>
                     <form action="{{route('admin.transport.delete', [$city, $transport])}}" method="POST">
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