<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">

        {{-- <h1>Thank you</h1>
        <p>Your Reservation is Ready</p> --}}

        <!-- Reservation Message -->
        <div>
            <h2>Your Reservation is Confirmed!</h2>
            <p>Thank you for choosing our service. We look forward to serving you!</p>
        </div>

        <!-- Image -->
        <div class="flex justify-center w-full">
            <img src="{{asset('css/res.png')}}" alt="Reservation Image" width="500">
            <!-- Replace "path/to/your/image.jpg" with the actual path to your image -->
        </div>

    </div>

</x-guest-layout>