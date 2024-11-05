@extends('Staff.layouts.app')
@section('title', 'Pelayanan')
@section('content')

<section class="py-4 draggable" draggable="true">
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-start">
            <div class="w-full lg:w-10/12">

                <!-- Card 1 -->
                <div class="card card-plain card-blog mt-5">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-4/12">
                            <div class="relative rounded-lg overflow-hidden">
                                <img class="w-full h-auto rounded-lg shadow-md" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/color-cart.jpg" alt="Image">
                            </div>
                        </div>
                        <div class="w-full md:w-7/12 md:ml-6 mt-4 md:mt-0">
                            <h3 class="text-gray-800 font-semibold text-xl mb-2">
                                <a href="javascript:;" class="hover:text-blue-500">Surat Keterangan Tidak Mampu</a>
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Finding temporary housing for your dog should be as easy as renting an Airbnb. That’s the idea behind Rover, which raised $65 million to expand its pet sitting and dog-walking businesses.
                            </p>
                            <!-- Button Buat Surat -->
                            <a href="{{ route('Staff.surat_keterangan_tidak_mampu.index') }}" class="inline-block px-6 py-2 text-white font-semibold bg-blue-500 rounded-lg shadow hover:bg-blue-600 transition-colors duration-150 ease-in-out">Buat Surat</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card card-plain card-blog mt-5">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-4/12">
                            <div class="relative rounded-lg overflow-hidden">
                                <img class="w-full h-auto rounded-lg shadow-md" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/color-flower.jpg" alt="Image">
                            </div>
                        </div>
                        <div class="w-full md:w-7/12 md:ml-6 mt-4 md:mt-0">
                            <h3 class="text-gray-800 font-semibold text-xl mb-2">
                                <a href="javascript:;" class="hover:text-blue-500">Surat Keterangan Usaha</a>
                            </h3>
                            <p class="text-gray-600 mb-4">
                                If you’ve ever wanted to train a machine learning model and integrate it with IFTTT, a new offering from MateLabs. MateVerse, a platform where novices can spin out machine learning models easily.
                            </p>
                            <!-- Button Buat Surat -->
                            <a href="{{ route('Staff.surat_keterangan_usaha.index') }}" class="inline-block px-6 py-2 text-white font-semibold bg-blue-500 rounded-lg shadow hover:bg-blue-600 transition-colors duration-150 ease-in-out">Buat Surat</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card card-plain card-blog mt-5">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-4/12">
                            <div class="relative rounded-lg overflow-hidden">
                                <img class="w-full h-auto rounded-lg shadow-md" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/color-stair.jpg" alt="Image">
                            </div>
                        </div>
                        <div class="w-full md:w-7/12 md:ml-6 mt-4 md:mt-0">
                            <h3 class="text-gray-800 font-semibold text-xl mb-2">
                                <a href="javascript:;" class="hover:text-blue-500">Surat Keterangan Kematian</a>
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Venture investment in U.S. startups rose sequentially in the second quarter of 2017, boosted by large, late-stage financings and a few outsized early-stage rounds in tech and healthcare.
                            </p>
                            <!-- Button Buat Surat -->
                            <a href="{{ route('Staff.surat_keterangan_kematian.index') }}" class="inline-block px-6 py-2 text-white font-semibold bg-blue-500 rounded-lg shadow hover:bg-blue-600 transition-colors duration-150 ease-in-out">Buat Surat</a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="card card-plain card-blog mt-5">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-4/12">
                            <div class="relative rounded-lg overflow-hidden">
                                <img class="w-full h-auto rounded-lg shadow-md" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/color-stair.jpg" alt="Image">
                            </div>
                        </div>
                        <div class="w-full md:w-7/12 md:ml-6 mt-4 md:mt-0">
                            <h3 class="text-gray-800 font-semibold text-xl mb-2">
                                <a href="javascript:;" class="hover:text-blue-500">Surat Nikah</a>
                            </h3>
                            <p class="text-gray-600 mb-4">
                                New advancements in fintech are reshaping the financial sector, providing new opportunities for growth, and making online shopping more accessible and secure for everyone.
                            </p>
                            <!-- Button Buat Surat -->
                            <a href="javascript:;" class="inline-block px-6 py-2 text-white font-semibold bg-blue-500 rounded-lg shadow hover:bg-blue-600 transition-colors duration-150 ease-in-out">Buat Surat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
