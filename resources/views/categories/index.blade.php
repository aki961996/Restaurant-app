<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach($categorys as $categories)


            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                <img class="w-full h-48" src="{{ asset('storage/categories/' . $categories->image)}}" alt="Image" />
                <div class="px-6 py-4">
                    <a href="{{route('fcategories.show', $categories->id)}}">
                        <h4
                            class="mb-3 text-xl font-semibold tracking-light text-black-600 hover:text-green-400 uppercase">
                            {{$categories->name}}

                        </h4>
                    </a>





                </div>

            </div>

            @endforeach




        </div>
    </div>
</x-guest-layout>