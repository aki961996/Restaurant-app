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
                                        class="w-100 p-1 text-xs font-medium leading-noun text-center text-blue-100 bg-blue-600">
                                        Step Two
                                    </div>
                                </div>

                                {{-- form start --}}

                                <form action="{{route('reservations.store.step.two')}}" method="POST">
                                    @csrf

                                    <div class="space-y-12">

                                        <div class="border-b border-gray-900/10 pb-12">


                                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">



                                                {{-- table --}}

                                                <div class="sm:col-span-3">
                                                    <label for="table_id"
                                                        class="block text-sm font-medium text-gray-700">Table</label>
                                                    <div class="mt-1">
                                                        <select id="table_id" name="table_id"
                                                            class="form-multiselect block w-full mt-1">
                                                            {{-- @foreach ($tables as $table)
                                                            <option value="{{$table->id}}" @selected($reservations->
                                                                table_id == $table->id)>
                                                                {{$table->name}} ({{$table->guest_number}} Guests)
                                                            </option>
                                                            @endforeach --}}


                                                            @foreach ($tablez as $table)
                                                            <option value="{{ $table->id }}" @if($reservations->table_id
                                                                == $table->id) selected @endif>
                                                                {{ $table->name }} ({{ $table->guest_number }} Guests)
                                                            </option>
                                                            @endforeach

                                                        </select>

                                                        @if ($errors->any())

                                                        <div style="color: red">{{$errors->first('table')}}</div>

                                                        @endif
                                                    </div>

                                                </div>



                                            </div>
                                        </div>

                                    </div>


                                    <div class="mt-6 flex items-center justify-end gap-x-6">
                                        <a href="{{route('reservations.step.one')}}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Previous</a>
                                        {{-- <x-primary-button>{{ __('Make Reservation') }}</x-primary-button> --}}
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                            Make Reservation
                                        </button>

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