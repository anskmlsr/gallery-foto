
<nav class="fixed top-0 z-20 w-full bg-white shadow-md">
        <div class="flex flex-wrap items-center justify-center max-w-screen-xl p-4 mx-auto">
            <a href="/explore" class="mr-4">BERANDA</a>
            <form action="/explore" method="get">
            <input type="text" class="px-4 py-1 mr-4 rounded-full" placeholder="Search ..." name="cari">
          </form>
            <a href="/pin" class="mr-4">POST</a>
            <div class="overflow-hidden flex items-center space-x-1 md:order-2 md:space-x-0 rtl:space-x-reverse">
                <img src="/assets/{{ Auth::user()->url }}" alt="" class="w-10 rounded-full" data-dropdown-toggle="user-dropdown-menu">
                <!-- Drop Down -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow "
                    id="user-dropdown-menu">
                    <ul class="py-2" role="none">
                        <li>
                            <a href="/profile"
                                class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">
                                <div class="inline-flex items-center">
                                    Profile
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/ubahpassword"
                                class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">
                                <div class="inline-flex items-center">
                                    Ubah Password
                                </div>
                            </a>
                        </li>
                        <a href="/album"
                                class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">
                                <div class="inline-flex items-center">
                                   Album
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/logout"
                                class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">
                                <div class="inline-flex items-center">
                                    Log Out
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Navigation -->
            </div>
        </div>
    </nav>