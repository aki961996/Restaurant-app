<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
    


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

                                <form id="reservationForm" action="{{route('reservations.store.step.two')}}"
                                    method="POST">
                                    @csrf

                                    <div class="space-y-12">

                                        <div class="border-b border-gray-900/10 pb-12">


                                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">



                                                {{-- table --}}

                                                <div class="sm:col-span-3">
                                                    {{-- <label for="table_id"
                                                        class="block text-sm font-medium text-gray-700">Table</label>
                                                    <div class="mt-1">
                                                        <select id="table_id" name="table_id"
                                                            class="form-multiselect block w-full mt-1">
                                                            @foreach ($tables as $table)
                                                            <option value="{{$table->id}}" @selected($reservations->
                                                                table_id == $table->id)>
                                                                {{$table->name}} ({{$table->guest_number}} Guests)
                                                            </option>
                                                            @endforeach


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
                                                    </div> --}}

                                                    <label for="table_id"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Table
                                                        select</label>
                                                    <select id="table_id" name="table_id"
                                                        class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>Choose a Table</option>
                                                        @foreach ($tablez as $table)
                                                        <option value="{{ $table->id }}" @if($reservations->table_id
                                                            == $table->id) selected @endif>{{ $table->name }} ({{
                                                            $table->guest_number }} Guests)</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->any())
                                                    <div style="color: red">{{$errors->first('table')}}</div>
                                                    @endif
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

    {{-- <script>
        $(document).ready(function () {
        // Submit form via AJAX
        $('#reservationForm').submit(function (e) {
            e.preventDefault(); // Prevent normal form submission

            // Serialize form data
            var formData = $(this).serialize();

            // Perform AJAX request
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function (response) {
                   Swal.fire({
                    icon: 'success',
                    title: 'Reservation Successful',
                    text: 'Your reservation has been made successfully.',
                    }).then(function () {
                    // Redirect to the specified route
                    window.location.href = response.redirect;
                    });
                },
                error: function (error) {
                    // Handle error with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error submitting the form. Please try again.',
                    });
                }
            });
        });
    });
    </script> --}}
</x-guest-layout>