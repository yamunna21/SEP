@component('mail::message')
Hello From DERCS !

Thank you for your payment.<br>
Your payment of RM
{{$lol['body']}} is received.<br>
Your Repair Details are as follows:
{{$lol['repair']}}<br>

This is our comment from the experts:
{{$lol['comment']}}


Thanks,<br>
{{ $lol['staffincharge'] }}<br>
    Staff In Charge
@endcomponent
