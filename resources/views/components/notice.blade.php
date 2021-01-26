<div class="notice bg-gray-800 p-2 m-2 rounded-md">
    <h3 class="notice-subject text-base text-gray-200 font-bold">{{$subject}}</h3>
    <p class="notice-body leading-relaxed text-gray-500 max-w-md">{{$body}}</p>
    <div class="notice-tags block mt-1">
        <p class="notice-level rounded bg-blue-600 p-1 text-white font-bold uppercase text-sm inline-block mr-1">{{$level}}</p>
        <p class="notice-teacher rounded bg-green-600 p-1 text-white font-bold uppercase text-sm inline-block mr-1">{{$teacher}}</p>
        @if(isset($place) && strlen($place) > 0)<p class="notice-place rounded bg-indigo-600 font-bold p-1 text-white text-sm inline-block mr-1">{{$place}}</p>@endif
        @if(isset($time) && strlen($time) > 0)<p class="notice-time rounded bg-indigo-600 font-bold p-1 text-white text-sm inline-block mr-1">{{$time}}</p>@endif
        @if(isset($date) && strlen($date) > 0)<p class="notice-date rounded bg-indigo-600 font-bold p-1 text-white text-sm inline-block mr-1">{{$date}}</p>@endif
    </div>
</div>
