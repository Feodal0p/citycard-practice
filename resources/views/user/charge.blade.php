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
         <a href="{{ route('user.usage', $card)}}">Список використань</a>
      </div>
   </div>
   <div class="card-body text-center w-75 mx-auto">
      <table class="table">
         <thead>
           <tr>
             <th scope="col">Поповнення картки</th>
           </tr>
         </thead>
         <tbody>
            @if(!$charges->isEmpty())
            @foreach($charges as $charge)
            <tr>
                <td>
                    <div class="row">
                        <div class="col-1 text-end">
                            <i class="bi bi-credit-card text-primary h2"></i>
                        </div>
                        <div class="col-2 text-start ">
                            {{$charge->created_at}}
                        </div>
                        <div class="col-2 text-start">
                            Поповнення
                        </div>
                        <div class="col-6 text-end text-success">
                            {{number_format($charge->amount, 2)}}₴
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