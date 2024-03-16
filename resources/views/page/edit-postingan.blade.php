@extends('layouts.master')
@section('content')
    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-5xl text-center font-fontutama">GalleryKu</h3>
        </div>
    </section>
    <section class="mt-10">
        <div class="max-w-screen-md mx-auto">
            <form action="/savepin" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-2/5  max-[480px]:w-full px-2">
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
            <section class="mt-1">
                <div class="max-w-screen-md mx-auto flex justify-center">
                    <div class="flex flex-wrap items-center flex-container">
                    <div class="flex flex-row gap-3">
                    <div class="mt-6">
                      <div class="w-[363px] h-[192px]">
                        <div class="mt-4 mb-2">
                            <label for="default-input" class="ml-2 mb-2 text-xl font-medium dark:text-dark">Judul</label>
                            <input type="text" id="default-input" name="judul_baru" class=" block p-2 w-full text-sm text-gray-900 bg-gay-50 rounded-lg border border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{foto->judul_foto}}">
                        </div>
                        <div class="mb-2">
                            <form class="max-w-sm mx-auto">
                                <label for="message" class="block ml-2 text-xl font-medium text-gray-900 dark:text-dark">Deskripsi</label>
                                <input id="message" rows="4" name="deskripsi_baru" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$foto->deskripsi_foto">
                                <div class="w-[363px] h-[192px]">
                                    <div class="mb-2">
                                    <h3 class="mt-4 text-xl font-medium">Pilih Album</h3>
                                <select name="album" id="" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach($album as $album)
                                       <option value="{ $album->id }}">{{ $album->nama_album}}</option>

                                    @endforeach
                                </select>
                                <div class="mb-2 mt-8">
                                <button type="submit" id="default-input" class="rounded-md block p-1 border w-32 bg-blue-900 text-white"> Post </button>
                                </div>
                                </div>
                                </div>
                                </select>
                            </div>
                            


    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>