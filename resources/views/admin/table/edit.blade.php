<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  m-2 p-2">
                <a href="{{route('tables.index')}}" class="btn btn-primary">Table
                    Back
                </a>
            </div>


            {{-- form --}}

            <form action="{{route('tables.update', $tables->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-12">

                    <div class="border-b border-gray-900/10 pb-12">



                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">First
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" value="{{$tables->name}}"
                                        autocomplete="given-name" class="block w-full mt-1">
                                </div>
                                @if ($errors->any())

                                <div style="color: red">{{$errors->first('name')}}</div>

                                @endif
                            </div>


                            <div class="sm:col-span-3">
                                <label for="guest_number" class="block text-sm font-medium text-gray-700">
                                    Guest Number</label>
                                <div class="mt-1">
                                    <input type="number" min="0.00" max="10000.00" value="{{$tables->guest_number}}"
                                        step="0.01" name="guest_number" id="guest_number" autocomplete=""
                                        class="block w-full mt-1">
                                </div>

                                @if ($errors->any())

                                <div style="color: red">{{$errors->first('guest_number')}}</div>

                                @endif
                            </div>



                            <div class="sm:col-span-3">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <div class="mt-1">
                                    <select id="status" name="status" class="form-multiselect block w-full mt-1">
                                        @foreach(App\Enums\TableStatus::cases() as $status)
                                        <option value="{{$status->value}}" @selected($tables->
                                            status->value == $status->value)>{{$status->name}}</option>
                                        @endforeach

                                    </select>

                                    @if ($errors->any())

                                    <div style="color: red">{{$errors->first('status')}}</div>

                                    @endif
                                </div>

                            </div>

                            <div class="sm:col-span-3">
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <div class="mt-1">
                                    <select id="location" name="location" class="form-multiselect block w-full mt-1">
                                        @foreach (App\Enums\TableLocation::cases() as $location)
                                        <option value="{{$location->value}}" @selected($tables->location->value ==
                                            $location->value) >{{$location->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->any())
                                    <div style="color: red">{{$errors->first('location')}}</div>
                                    @endif
                                </div>

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