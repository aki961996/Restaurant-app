<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div>
            @if(session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
            @endif
        </div>



        <div class="flex items-center justify-center p-12">

            <div class="flex item-center min-h-screen bg-gray-50">
                <div class="flex-1 h-full mx-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                    <div class="flex flex-col md:flex-row">

                        <div class="h-32 md:h-auto md:w-1/2">
                            <img class="object-cover w-full h-full" src="{{asset('css/reservation-5421878_1280.jpg')}}">
                        </div>

                        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                            <div class="w-full">
                                <h3 class="mb-4 text-xl font-bold text-blue-600">Make Reservation</h3>

                                <div class="w-full bg-gray-200 rounded-full">
                                    <div
                                        class="w-40 p-1 text-xs font-medium leading-noun text-center text-blue-100 bg-blue-600">
                                        Step One
                                    </div>
                                </div>

                                {{-- form start --}}

                                <form action="{{route('reservations.store.step.one')}}" method="POST">
                                    @csrf
                                    <div class="space-y-12">
                                        <div class="border-b border-gray-900/10 pb-12">
                                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                                <div class="sm:col-span-3">
                                                    {{-- <label for="name"
                                                        class="block text-sm font-medium leading-6 text-gray-900">First
                                                        name</label>
                                                    <div class="mt-2">
                                                        <input type="text" value="{{$reservations->name ?? ''}}"
                                                            name="name" id="name" autocomplete="given-name"
                                                            class="block w-full mt-1">

                                                    </div> --}}

                                                    <div>
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Name</label>
                                                        <input type="text" name="name" id="name"
                                                            value="{{$reservations->name ?? ''}}"
                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    @if ($errors->any())

                                                    <div style="color: red">{{$errors->first('name')}}</div>

                                                    @endif
                                                </div>

                                                <div class="sm:col-span-3">
                                                    {{-- <label for="last_name"
                                                        class="block text-sm font-medium leading-6 text-gray-900">
                                                        Last Name</label>
                                                    <div class="mt-2">
                                                        <input type="text" value="{{$reservations->last_name ?? ''}}"
                                                            name="last_name" id="last_name" autocomplete="given-name"
                                                            class="block w-full mt-1">
                                                    </div> --}}

                                                    <div>
                                                        <label for="last_name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Last
                                                            Name</label>
                                                        <input type="text" name="last_name" id="last_name"
                                                            value="{{$reservations->last_name ?? ''}}"
                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    @if ($errors->any())

                                                    <div style="color: red">{{$errors->first('last_name')}}</div>

                                                    @endif
                                                </div>
                                                <div class="sm:col-span-3">
                                                    {{-- <label for="email"
                                                        class="block text-sm font-medium leading-6 text-gray-900">
                                                        Email</label>
                                                    <div class="mt-2">
                                                        <input type="text" value="{{$reservations->email ?? ''}}"
                                                            name="email" id="email" autocomplete="given-name"
                                                            class="block w-full mt-1">
                                                    </div> --}}

                                                    <div>
                                                        <label for="email"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Email</label>
                                                        <input type="text" name="email" id="email"
                                                            value="{{$reservations->email ?? ''}}"
                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    @if ($errors->any())

                                                    <div style="color: red">{{$errors->first('email')}}</div>

                                                    @endif
                                                </div>

                                                <div class="sm:col-span-3">
                                                    {{-- <label for="tel_number"
                                                        class="block text-sm font-medium leading-6 text-gray-900">
                                                        Telephone Number</label>
                                                    <div class="mt-2">
                                                        <input type="number" value="{{$reservations->tel_number ?? ''}}"
                                                            name="tel_number" id="tel_number" autocomplete="given-name"
                                                            class="block w-full mt-1">
                                                    </div> --}}
                                                    <div>
                                                        <label for="tel_number"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Telephone
                                                            Number</label>
                                                        <input type="text" name="tel_number" id="tel_number"
                                                            value="{{$reservations->tel_number ?? ''}}"
                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    @if ($errors->any())

                                                    <div style="color: red">{{$errors->first('tel_number')}}</div>

                                                    @endif
                                                </div>

                                                <div class="sm:col-span-3">
                                                    {{-- <label for="res_date"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                                        Reservation Date</label>
                                                    <div class="mt-2">
                                                        <input type="datetime-local"
                                                            value="{{ $reservations && $reservations->res_date instanceof \DateTime ? $reservations->res_date->format('Y-m-d\TH:i:s') : '' }}"
                                                            name="res_date"
                                                            min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                                                            max="{{ $max_date->format('Y-m-d\TH:i:s') }}" id="res_date"
                                                            autocomplete="given-name" class="block w-full mt-1" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500
                                                            focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                            dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                    </div> --}}

                                                    <div>
                                                        <label for="res_date"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Reservation
                                                            Date
                                                        </label>
                                                        <input type="datetime-local" name="res_date" id="res_date"
                                                            value="{{ $reservations && $reservations->res_date instanceof \DateTime ? $reservations->res_date->format('Y-m-d\TH:i:s') : '' }}"
                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                                                            max="{{ $max_date->format('Y-m-d\TH:i:s') }}">
                                                    </div>
                                                    @if ($errors->any())

                                                    <div style="color: red">{{$errors->first('res_date')}}</div>

                                                    @endif
                                                </div>

                                                <div class="sm:col-span-3">
                                                    {{-- <label for="guest_number"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                                        Guest Number</label>
                                                    <div class="mt-1">
                                                        <input type="number"
                                                            value="{{$reservations->guest_number ?? ''}}" min="0.00"
                                                            max="10000.00" step="0.01" name="guest_number"
                                                            id="guest_number" autocomplete="" class="block w-full mt-1"
                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500
                                                            focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                            dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div> --}}

                                                    <div>
                                                        <label for="guest_number"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Guest
                                                            Number
                                                        </label>
                                                        <input type="number" name="guest_number" id="guest_number"
                                                            value="{{$reservations->guest_number ?? ''}}"
                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            min="0.00" max="10000.00">
                                                    </div>

                                                    @if ($errors->any())
                                                    <div style="color: red">{{$errors->first('guest_number')}}</div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex items-center justify-end gap-x-6">
                                        <x-primary-button>{{ __('Next') }}</x-primary-button>

                                    </div>
                                </form>
                                {{-- form end --}}
                            </div>



                        </div>

                    </div>

                </div>
            </div>
        </div>





    </div>

</x-guest-layout>