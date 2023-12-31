<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="py-12">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{route('categories.create')}}" class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-lime-950 rounded-full sm:w-full md:w-auto hover:bg-green-300 focus:outline-none">New Category
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Description
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Image
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg></a>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                                <span class="sr-only"></span>
                            </th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categorys as $data)
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->name}}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->description}}
                            </td>
                            <td class="px-6 py-4">

                                <img src="{{asset('storage/categories/' . $data->image)}}" alt="" style="width:100px;">
                            </td>

                            <td
                                class="px-3 py-4 text-right font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{route('categories.edit', $data->id)}}" class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-violet-900 rounded-full
                                    sm:w-full md:w-auto hover:bg-red-300 focus:outline-none">Edit</a>

                                <form method="POST" action="{{route('categories.destroy', $data->id) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-red-600 rounded-full sm:w-full md:w-auto hover:bg-green-300 focus:outline-none"
                                        type="submit">Delete</button>

                                </form>
                            </td>

                        </tr>

                        @endforeach



                    </tbody>
                </table>
            </div>
            <div class="">

                {!! $categorys->links() !!}

            </div>







        </div>
    </div>
</x-admin-layout>