@extends('layouts.app')

@section('title', 'Notices for ' . $date)

@push('meta')
    <meta property="og:title" content="KAMAR Notices"/>
    <meta property="og:description" content="There are a total of {{sizeof($notices)}} for {{$date}}"/>
    <meta property="og:type" content="website"/>
@endpush

@section('content')
    @if($embed == false)
        <div class="title m-2 mb-4">
            <h1 class="text-gray-300 text-lg font-bold">KAMAR Notices</h1>
            <span class="text-blue-500">{{env('APP_PORTAL', 'Unknown')}}</span>
            <p class="text-gray-400 block mb-2">Loaded {{sizeof($notices)}} notice(s)</p>
            <p class="p-1 bg-green-600 px-2 font-bold text-white rounded mr-2 inline-block">{{$date}}</p>
            @if ($cache)
                <p class="p-1 bg-yellow-600 font-bold text-white rounded inline-block">CACHED</p>
            @endif
            <nav class="mt-4">
                <a class="p-2 bg-blue-500 text-white font-bold rounded inline-block" href="/{{date('d-m-Y', strtotime($date . ' -1 day'))}}">&laquo; Previous</a>
                <label class="bg-blue-500 p-2 mx-2 rounded text-white inline-block">Date
                    <input type="date" class="bg-transparent" id="date" value="{{$htmlDateFormatted = date('Y-m-d', strtotime($date))}}">
                </label>
                <a class="p-2 bg-blue-500 text-white font-bold rounded inline-block"  href="/{{date('d-m-Y', strtotime($date . ' +1 day'))}}">Next &raquo;</a>
            </nav>
        </div>
        <script>
            let dateInput = document.getElementById('date');
            dateInput.value  = '{{$htmlDateFormatted}}'
            dateInput.onchange = function () {
                if(dateInput.value.length > 0) {
                    let parts = dateInput.value.split("-");
                    if(parts.length === 3) {
                        const day = parts[2];
                        const month = parts[1];
                        const year = parts[0];
                        const date = `${day}-${month}-${year}`;
                        document.location.href = '/' + date;
                    }
                }
            }
        </script>
    @endif
    <div class="notices">
        @foreach($notices as $notice)
            @if (isset($notice->place, $notice->date, $notice->time))
                <x-meeting-notice level="{{$notice->level}}" subject="{{$notice->subject}}"
                                  body="{{$notice->body}}" teacher="{{$notice->teacher}}"
                                  place="{{$notice->place}}" date="{{$notice->date}}"
                                  time="{{$notice->time}}"></x-meeting-notice>
            @else
                <x-notice level="{{$notice->level}}" subject="{{$notice->subject}}"
                          body="{{$notice->body}}" teacher="{{$notice->teacher}}"></x-notice>
            @endif

        @endforeach
    </div>
@endsection
