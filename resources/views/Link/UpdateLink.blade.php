@include('Header')
<body>
@include('Navbar')
<div style="display: flex; justify-content: center">
    <div class="border-b border-gray-900/10 pb-12 mt-10" style="width: 30%">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Update Link</h2>
<form action="{{route('update_link')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$link?->id}}">
    <input type="hidden" name="company_id" value="{{$link->company_id}}">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name" autocomplete="given-name" value="{{$link->name}}" style="padding-left: 5px;" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="link" class="block text-sm font-medium leading-6 text-gray-900">Link</label>
                <div class="mt-2">
                    <input type="text" name="original_link" id="link" autocomplete="link" value="{{$link->original_link}}" style="padding-left: 5px;" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <input id="title" name="title" type="text" autocomplete="title" value="{{$link->title}}" style="padding-left: 5px;" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="col-span-full">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                    <textarea type="text" name="description" id="description" autocomplete="description" style="padding-left: 5px; min-height: 100px;" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$link->description}}</textarea>
                </div>
            </div>

            <div class="col-span-full mt-10">
                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                        </svg>
                        <div class="mt-4 text-sm leading-6 text-gray-600">
                            <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="image" name="image" type="file" class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG, GIF, WEBP up to 10MB</p>
                    </div>
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                <div class="mt-2">
                    <select id="status" name="status" autocomplete="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option>{{$link->status}}</option>
                        <option>{{$link->status === 'active' ? 'Inactive' : 'Active'}}</option>
                    </select>
                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="domain" class="block text-sm font-medium leading-6 text-gray-900">Domain</label>
                <div class="mt-2">
                    <select id="domain" name="domain_id" autocomplete="domain" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        @if($current_domain)
                            <option value="{{$current_domain->id}}">{{$current_domain->name}}</option>
                        @endif
                        @if($domains)
                        @foreach($domains as $domain)
                            <option value="{{$domain->id}}">{{$domain->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-start gap-x-6">
            <div class="ml-40"></div>
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900"><a href="{{route('get_link')}}">Cancel</a></button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
</form>
    </div>
</div>
</body>
