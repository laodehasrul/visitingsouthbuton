<x-mail::message>
# Pesan Dari {{$contactMessage['fullname']}}
## Email : {{$contactMessage['email']}}
{{$contactMessage['message']}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
