@extends('layouts.master')
@section('content')
    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-5xl text-center font-fontutama">GalleryKu</h3>
        </div>
    </section>
    <section class="max-w-screen-md mx-auto ">
    @if($message = Session::get('success') )
          <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="text-sm font-medium ms-3">
                      {{ $message}}
                    </div>
                      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                  </div>
          @endif
       <form action="/ubahprofil" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap justify-between flex-container">
            <div class="flex flex-col items-center w-2/6 bg-white rounded-md shadow-md max-[480px]:w-full">
                <img src="{{ asset('assets/'.$user->url) }}" name="avatar" alt="" class="rounded-full w-36 h-36">
                <input type="file" id="avatar" name="avatar" class="items-center w-48 h-10 mt-4 border rounded-md">
           </div>
            <div class="w-3/5 max-[480px]:w-full">
                <div class="bg-white rounded-md shadow-md ">
                    <div class="flex flex-col px-4 py-4 ">
                        <h5 class="text-3xl text-center font-fontutama">Your Profile</h5>
                        <h5>Nama Lengkap</h5>
                        <input type="text" name="nama_lengkap" class="py-1 rounded-md border border-black-900" value="{{ $user->nama_lengkap }}">
                        <h5>Email</h5>
                        <input type="text" name="email"  class="py-1 rounded-md border border-black-900" value="{{ $user->email }}">
                        <h5>Alamat</h5>
                        <input type="text" name="alamat" class="py-1 rounded-md border border-black-900" value=" {{ $user->alamat }}">

                        </textarea>
                        <button class="py-2 mt-4 text-white rounded-md bg-blue-800">Perbaharui</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>

@endsection
