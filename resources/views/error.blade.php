@extends('layouts.app')

@section('title', 'Error - ' . $title)

@section('content')

    <div class="absolute -translate-x-1/2 -translate-y-1/2 transform left-1/2 top-1/2 bg-gray-700 max-w-xl w-full">
        <div class="bg-blue-500 p-4 ">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1000 1000"
                 enable-background="new 0 0 1000 1000" xml:space="preserve" fill="white" class="w-auto h-14">
                <g>
                    <path
                        d="M939.4,906.7H60.6c-31.7,0-50.6-25.9-50.6-50.9V144.2c0-31.9,25.8-50.9,50.6-50.9h878.7c31.7,0,50.6,25.9,50.6,50.9v711.7C990,887.7,964.3,906.7,939.4,906.7z M84.3,832h831.4V168H84.3V832z"/>
                    <path
                        d="M327.8,405.9c-7.9,0-15.8-3-21.9-9.1l-80.5-81c-12.1-12.2-12.1-31.9,0-44c12.1-12.2,31.7-12.2,43.8,0l80.5,81c12.1,12.2,12.1,31.9,0,44C343.6,402.9,335.7,405.9,327.8,405.9z"/>
                    <path
                        d="M247.3,405.9c-7.9,0-15.8-3-21.9-9.1c-12.1-12.2-12.1-31.9,0-44l80.5-81c12.1-12.2,31.7-12.2,43.8,0c12.1,12.2,12.1,31.9,0,44l-80.5,81C263.1,402.9,255.2,405.9,247.3,405.9z"/>
                    <path
                        d="M752.7,406c-7.9,0-15.8-3-21.9-9.1l-80.5-81c-12.1-12.2-12.1-31.9,0-44c12.1-12.2,31.7-12.2,43.8,0l80.5,81c12.1,12.2,12.1,31.9,0,44C768.6,402.9,760.6,406,752.7,406z"/>
                    <path
                        d="M672.2,405.9c-7.9,0-15.8-3-21.9-9.1c-12.1-12.2-12.1-31.9,0-44l80.5-81c12.1-12.2,31.7-12.2,43.8,0c12.1,12.2,12.1,31.9,0,44l-80.5,81C688.1,402.9,680.1,405.9,672.2,405.9z"/>
                    <path
                        d="M772.4,711.1H227.6c-17.1,0-31-13.9-31-31.1c0-17.2,13.9-31.1,31-31.1h544.8c17.1,0,31,13.9,31,31.1C803.3,697.2,789.5,711.1,772.4,711.1z"/>
                    <path d="M542.1,711.1v58.7c0,0,0,20.2,61.9,20.2h66.6c0,0,61.9,0,61.9-60.2v-58.7H542.1z"/>
                </g>
            </svg>
            <h1 class="text-gray-200 font-bold text-lg">{{$title}}</h1>
            <p class="text-gray-700 text-xs">{{env('APP_PORTAL')}}</p>
        </div>
        <div class="bg-gray-800 p-4">
            <p class="text-gray-500 pt-2 text-sm align-middle">{{$message}}</p>
        </div>
    </div>

    <p class="absolute bottom-0 w-full text-center text-gray-400 pb-1 text-sm">By <a
            href="https://github.com/Jacobtread">Jacobtread</a></p>
@endsection
