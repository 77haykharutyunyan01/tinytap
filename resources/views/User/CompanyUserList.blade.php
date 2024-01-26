@include('Header')
<body>
@include('Navbar')
<div class="mt-4 px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all users.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="{{route('create_user_view')}}">Add User</a></button>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Name</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Owner Name</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created_at</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @if($users ?? null)
                    @foreach($users as $user)
                        <tr class="even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{$user->name}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user->companies->first()->owner->name}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user->created_at}}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-3">
                                {{--                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>--}}
                            </td>

                            @if($user->companies->first()->owner_id !== $user->id)
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-3">
                                <a id="delete-button" href="{{route('delete_user') . '?userId=' . $user->id}}" class="text-red-600 hover:text-indigo-900">Delete</a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    @endif
                    <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
