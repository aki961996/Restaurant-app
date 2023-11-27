<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  m-2 p-2">
                <a href="{{route('categories.index')}}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">Category Back
                </a>
            </div>


            {{-- form --}}

            <form action="{{route('categories.update',$categories->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-12">

                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Category Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive
                            mail.</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">First
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" value="{{$categories->name}}"
                                        autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                {{-- error --}}
                                @if ($errors->any())

                                <div style="color: red">{{$errors->first('name')}}</div>

                                @endif
                            </div>

                            <div class="col-span-full">
                                <label for="description"
                                    class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$categories->description}}
                                    
                                    </textarea>



                                </div>
                                @if ($errors->any())

                                <div style="color: red">{{$errors->first('description')}}</div>

                                @endif
                                <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.
                                </p>
                            </div>



                            <div class="col-span-full">
                                <label for="image" class="block text-sm font-medium leading-6 text-gray-900">
                                    Image</label>
                                <div>
                                    <img src="{{asset('storage/categories/' . $categories->image)}}" alt=""
                                        style="width:100px;">
                                </div>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="image"
                                                class="relative cursor-pointer rounded-md  font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="image" name="image" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>

                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                        @if ($errors->any())

                                        <div style="color: red">{{$errors->first('image')}}</div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>


        <div class="mt-6 flex items-center justify-end gap-x-6">

            <x-primary-button>{{ __('Update') }}</x-primary-button>
        </div>

    </div>


    </form>

    {{-- end --}}


    </div>
    </div>
</x-admin-layout>