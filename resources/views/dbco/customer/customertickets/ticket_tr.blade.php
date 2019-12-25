@if (count($tickets) > 0)
    @foreach ($tickets as $ticket)
        <tr class="ttr">
            <td>{{ $dbco_customer->ccustomername }}<br>{{date('Y-m-d H:i',strtotime($ticket->dticketdate))}}</td>
            <td> {{ $ticket->ctickettext }} </td>
            <td>@if(!is_null($ticket->cticketfilename))<a href="/lk/tickets/file/{{$ticket->iticketid}}" target="_blank"><img src="/dbco/images/download.png" style="width: 24px; 
margin-right: 10px;"> {{$ticket->cticketfilename}}</a>@endif </td></td>
        </tr>
    @endforeach
@else

@endif