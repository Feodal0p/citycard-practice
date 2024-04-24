@extends('layouts.base')

@section('content')
<div class="card">
   <div class="card-header row w-100">
    <div class="col col-lg-2 text-center">
        <a href="{{route('user.index')}}">
            <i class="bi bi-arrow-left h4"></i>
        </a>
    </div>
      <div class="col text-center">
         Картка - {{$card->number}}
      </div>
      <div class="col col-lg-2 text-end">
         <a href="{{ route('user.charge', $card)}}">Список поповнень</a>
      </div>
   </div>
   <div class="card-body text-center w-75 mx-auto">
      <table class="table">
         <thead>
           <tr>
             <th scope="col">Використання картки</th>
           </tr>
         </thead>
         <tbody>
            @if(!$usages->isEmpty())
            @foreach($usages as $usage)
            <tr>
                <td>
                    <div class="row">
                        <div class="col-1 text-end">
                            <i class="bi bi-bus-front text-primary h2"></i>
                        </div>
                        <div class="col-2 text-start">
                            {{$usage->created_at}}
                        </div>
                        <div class="col-2 text-start">
                            {{$ticket = $usage->ticket()->first()->transport_type}}
                        </div>
                        <div class="col-6 text-end text-danger">
                            {{number_format($usage->amount, 2)}}₴
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <td colspan="4">
                Не знайдено жодного запису
            </td>
            @endif
         </tbody>
       </table>
   </div>
</div>
@endsection