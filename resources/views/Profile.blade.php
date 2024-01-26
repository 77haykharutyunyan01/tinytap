@include('Header')
<body>
@include('Navbar')
<main class="px-4 mt-10 py-16 sm:px-6 lg:flex-auto lg:px-0 lg:py-20" style="display: flex;">
    <div class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
        <div>
            <div class="mt-2">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
            <p class="mt-1 hidden text-sm leading-6 text-gray-500">This information will be displayed publicly so be careful what you share.</p>
            </div>
            <div class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">
                <div class="pt-6 sm:flex" style="justify-content: space-between; min-width: 400px;">
                    <div class="font-medium text-gray-900 sm:w-64 sm:pr-6 mr-10">Name</div>
                    <div class="mt-1 gap-x-6 sm:mt-0">
                        <div class="text-gray-900">{{$owner->name}}</div>
{{--                        <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500">Update</button>--}}
                    </div>
                </div>
                <div class="pt-6 mt-6 sm:flex" style="justify-content: space-between;">
                    <div class="font-medium text-gray-900 sm:w-64 sm:pr-6">Email address</div>
                    <div class="mt-1 gap-x-6 sm:mt-0">
                        <div class="text-gray-900">{{$owner->email}}</div>
{{--                        <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500">Update</button>--}}
                    </div>
                </div>
                <div class="pt-6 mt-6 sm:flex" style="justify-content: space-between;">
                    <div class="font-medium text-gray-900 sm:w-64 sm:pr-6">Role</div>
                    <div class="mt-1 gap-x-6 sm:mt-0">
                        <div class="text-gray-900">{{$owner->roles->first()->name}}</div>
{{--                        <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500">Update</button>--}}
                    </div>
                </div>
                <div class="pt-6 mt-6 sm:flex" style="justify-content: space-between;">
                    <div class="font-medium text-gray-900 sm:w-64 sm:pr-6" style="margin-right: 30px">Api key</div>
                    <div class="gap-x-6 sm:mt-0">
                        <div class="text-gray-900">{{$owner->api_key}}</div>
{{--                        <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500">Update</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
