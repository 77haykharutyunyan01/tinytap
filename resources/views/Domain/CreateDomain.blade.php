@include('Header')
<body>
@include('Navbar')
<div class="mt-10" style="display: flex; justify-content: center">
    <form action="{{route('create_domain')}}" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create Domain</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-8">
                        <label for="domain" class="block text-sm font-medium leading-6 text-gray-900">Domain</label>
                        <div class="mt-2">
                            <input id="domain" name="domain" required type="text" autocomplete="text" style="padding-left: 5px;" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div><div class="sm:col-span-8 flex">
                        <label for="default" style="margin-right: 30px;" class="block text-sm font-medium leading-6 text-gray-900">Default</label>
                        <input id="default" name="default" value="1" type="checkbox" autocomplete="text" style="padding-left: 5px;" class="rounded-md border-0 text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                    </div>
                    <div class="sm:col-span-4">
                        <label for="ip_address" class="block text-sm font-medium leading-6 text-gray-900">Server IP Address</label>
                        <div id="copy" class="mt-2" style="display: flex; align-items: flex-start; cursor: pointer;">
                            <input id="ip_address" type="text" disabled name="name" required autocomplete="given-name" value="{{$ipAddress}}" style="padding-left: 5px;" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm  ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <img width="20" height="24" src="https://img.icons8.com/material-outlined/24/copy.png" alt="copy"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
<script>
    let ipAddress = document.getElementById('ip_address');
    let copyButton = document.getElementById('copy');

    copyButton.addEventListener('click', () => {
        navigator.clipboard.writeText(ipAddress.value);
    })
</script>
</body>
</html>
