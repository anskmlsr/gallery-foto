@extends('layouts.master')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@section('content')
 
<section class="mt-32">
<div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-5xl text-center font-fontutama">GalleryKu</h3>
        </div>
    </section>
    <section class="mt-10">
        
   <section>
        <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
            <div class="rounded-full">
                <img src="" alt="" class="w-24 h-24 rounded-full" id="fotoprofile">
            </div>
            <h3 class="text-xl font-semibold" id="nama">
            </h3>
                <a href="/ubahprofil"><button class="bg-blue-800 px-5 py-1 text-white rounded-full bg-biru">Ubah Profile</button></a>
   
                <h3 class="text-xl font-semibold" id="nama">
            </h3>
            </div>
                <hr class="border border-black mt-5">
            </div>
            <div class="flex flex-col h-80 p-3 gap-5">
                <div class="flex p-3 gap-3">
                    <div class="font-semibold text-green-500">
                        Postingan
                    </div>
                </div>
            </div>
</div>
            </section>
        <section class="mt-4 max-w-screen-md mx-auto">
            @csrf
            <div class="flex flex-wrap items-center flex-container" id="dataprofile">
            </div>
    </section>
@endsection
@push('footerjsexternal')
    <script src="/javascript/profil.js"></script>
@endpush
