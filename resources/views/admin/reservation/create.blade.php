<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  m-2 p-2">
                <a href="{{route('reservation.index')}}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">Reservation
                    Back
                </a>
            </div>


            {{-- form --}}

            <form action="{{route('reservation.store')}}" method="post">
                @csrf
                <div class="space-y-12">

                    <div class="border-b border-gray-900/10 pb-12">


                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">First
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="given-name"
                                        class="block w-full mt-1">
                                </div>
                                @if ($errors->any())

                                <div style="color: red">{{$errors->first('name')}}</div>

                                @endif
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">
                                    Last Name</label>
                                <div class="mt-2">
                                    <input type="text" name="last_name" id="last_name" autocomplete="given-name"
                                        class="block w-full mt-1">
                                </div>
                                @if ($errors->any())

                                <div style="color: red">{{$errors->first('last_name')}}</div>

                                @endif
                            </div>
                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                                    Email</label>
                                <div class="mt-2">
                                    <input type="text" name="email" id="email" autocomplete="given-name"
                                        class="block w-full mt-1">
                                </div>
                                @if ($errors->any())

                                <div style="color: red">{{$errors->first('email')}}</div>

                                @endif
                            </div>

                            {{-- table --}}

                            <div class="sm:col-span-3">
                                <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
                                <div class="mt-1">
                                    <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1">
                                        @foreach ($tables as $table)
                                        <option value="{{$table->id}}">{{$table->name}}</option>
                                        @endforeach

                                    </select>

                                    @if ($errors->any())

                                    <div style="color: red">{{$errors->first('table')}}</div>

                                    @endif
                                </div>

                            </div>


                            <div class="sm:col-span-3">
                                <label for="tel_number" class="block text-sm font-medium leading-6 text-gray-900">
                                    Telephone Number</label>
                                <div class="mt-2">
                                    <input type="number" name="tel_number" id="tel_number" autocomplete="given-name"
                                        class="block w-full mt-1">
                                </div>
                                @if ($errors->any())

                                <div style="color: red">{{$errors->first('tel_number')}}</div>

                                @endif
                            </div>


                            <div class="sm:col-span-3">
                                <label for="res_date" class="block text-sm font-medium leading-6 text-gray-900">
                                    Reservation Date</label>
                                <div class="mt-2">
                                    <input type="datetime-local" name="res_date" id="res_date" autocomplete="given-name"
                                        class="block w-full mt-1">
                                </div>
                                @if ($errors->any())

                                <div style="color: red">{{$errors->first('res_date')}}</div>

                                @endif
                            </div>


                            <div class="sm:col-span-3">
                                <label for="guest_number" class="block text-sm font-medium text-gray-700">
                                    Guest Number</label>
                                <div class="mt-1">
                                    <input type="number" min="0.00" max="10000.00" step="0.01" name="guest_number"
                                        id="guest_number" autocomplete="" class="block w-full mt-1">
                                </div>

                                @if ($errors->any())

                                <div style="color: red">{{$errors->first('guest_number')}}</div>

                                @endif
                            </div>








                        </div>
                    </div>

                </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>

    </div>


    </form>

    {{-- end --}}


    </div>
    </div>
</x-admin-layout>