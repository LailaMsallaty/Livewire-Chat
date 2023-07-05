<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row py-12 overflow-y-scroll">
        <div class="col-lg-4">
            <div class="card" style="margin-left:8px; height:300px;">

                <h3 class="text-center" style=" color:darkslategray;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Online Users</h3>
                <ul class="ml-5">
             @foreach($users as $user)
                    @if(Cache::has('user-is-online-' . $user->id))
                    <li><span style=" height: 13px;
                        width: 13px;
                        background-color:green;
                        border-radius: 100%;
                        display: inline-block;" class="dot"></span>
                        &nbsp;&nbsp;{{ $user->name }}</li>

                    @else
                    <li><span style=" height: 13px;
                        width: 13px;
                        background-color:gray;
                        border-radius: 100%;
                        display: inline-block;" class="dot"></span>&nbsp;&nbsp;{{ $user->name }}</li>
                    @endif
            @endforeach

                </ul>
            </div>
       </div>
        <div class="col-lg-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div style="background-color: red" class="p-6 bg-white border-b border-gray-200">

                    <livewire:chat />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
