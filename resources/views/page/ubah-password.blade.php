@extends('layouts.master')
@push('cssjsexternal')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content')

    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
        <form action="/ubahPassword" method="post">
            @csrf
            <h3 class="text-5xl text-center font-fontutama">GalleryKu</h3>
        
    
            <div class="max-[480px]:w-full">
                <div class="bg-white rounded-md shadow-md ">
                    <div class="flex flex-col px-4 py-4 ">

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
                        <label for>Password Lama</label for>
                        <input id="password_lama" type="password" name="password_lama" class="py-1 rounded-md border border-black-800">
                        <label for>Password Baru</label for>
                        <input id=" password_baru" type="password" name="password_baru" class="py-1 rounded-md border border-black-800">
                        <label for>Konfirmasi Password</label for>
                        <input id="confirm_password" type="password" name="confirm_password" class="py-1 rounded-md border border-black-800">
                        <button class="py-2 mt-4 text-white rounded-md bg-blue-800">Perbaharui</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>

</html>
@endsection