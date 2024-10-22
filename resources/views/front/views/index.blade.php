@extends('front.layouts.app')

@section('title', 'Ayo Berbagi Kesesama')

@section('content')
    {{-- max-w-[640px] --}}
    <section class="bg-white">
        {{-- bagian header pb-[134px] --}}
        <div class="min-h-64 mx-auto flex flex-col bg-white overflow-x-hidden">
            {{-- header w-full flex flex-col bg-gradient-to-b from-[#3CBBDB] to-[#EAD380] rounded-b-[50px] overflow-hidden --}}
            <div
                class="header relative w-full bg-[url('/public/img/header-image.webp')] bg-cover bg-center bg-no-repeat bg-fixed flex flex-col overflow-hidden inset-0 bg-black bg-opacity-50 h-[500px]">

                {{-- overlay bg-black bg-opacity-50 --}}
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>

                <nav class="z-10 pt-5 px-3 flex justify-between items-center">
                    <div class="flex items-center gap-[10px]">
                        <div class="w-10 h-10 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/loc.svg') }}" alt="icon">
                        </div>
                        <div class="flex flex-col text-white">
                            <p class="text-xs leading-[18px]">Location</p>
                            <p class="font-semibold text-sm">Bekasi, Indonesia</p>
                        </div>
                    </div>
                    {{-- <a href="" class="w-10 h-10 flex shrink-0">
                        <img src="{{ asset('assets/images/icons/menu.svg') }}" alt="icon">
                    </a> --}}
                </nav>
                <div class="mt-[100px] z-10 place-content-center items-center ">
                    <h1
                        class="font-extrabold lg:text-5xl  text-2xl leading-[40px] text-white text-center lg:leading-[70px] ">
                        Bersama Kita Bantu Sesama<br>untuk Masa Depan Lebih Baik
                    </h1>
                    <div class="flex justify-center p-5 ">
                        <div class="space-x-4">
                            {{-- button untuk login --}}
                            <a href="/login"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 lg:py-3.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-auto">
                                Masuk
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            {{-- button untuk register --}}
                            <a href="/register"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 lg:py-3.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-auto">
                                Daftar
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- card tab --}}
        <div id="kategori" class="container w-[500px] p-5 lg:w-[800px] md:w-[630px] justify-center mx-auto">
            <div class="w-full bg-white border rounded-[30px] border-[#E8E9EE]">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                    id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                    <li class="me-2">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                            aria-selected="true"
                            class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Tentang</button>
                    </li>

                    <li class="me-2">
                        <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                            aria-controls="services" aria-selected="false"
                            class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Tujuan</button>
                    </li>

                    <li class="me-2">
                        <button id="visimisi-tab" data-tabs-target="#visimisi" type="button" role="tab"
                            aria-controls="visimisi" aria-selected="false"
                            class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Visi
                            Misi</button>
                    </li>

                </ul>
                <div id="defaultTabContent">
                    <div class="hidden p-4 bg-white rounded-[30px] md:p-8 " id="about" role="tabpanel"
                        aria-labelledby="about-tab">
                        <img src="{{ asset('img/KBSBW - Transparent.webp') }}" alt="logo-kbs" class="h-[130px]">
                        <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-600 ">Sejarang Organisasi</h2>
                        <p class="mb-3 text-gray-500 dark:text-gray-400">Web KBS berperan sebagai jembatan untuk
                            menghubungkan sumber daya yang ada dengan mereka yang memerlukan bantuan. Pada tangal 6
                            september Organisasi tersebut dinamakan "Komunitas Bantu Sodara," sebagai simbol persahabatan
                            dan kepedulian di antara para karyawan.</p>
                        {{-- <a href="#"
                            class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700">
                            Learn more
                            <svg class=" w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                        </a> --}}
                    </div>

                    <div class="hidden p-4 bg-white rounded-[30px] md:p-8" id="services" role="tabpanel"
                        aria-labelledby="services-tab">
                        <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-600">Tujuan KBS</h2>
                        <!-- List -->
                        <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                </svg>
                                <span class="leading-tight">Menyediakan bantuan berupa sembako dan barang-barang kebutuhan
                                    dasar bagi masyarakat yang mengalami kesulitan ekonomi.</span>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                </svg>
                                <span class="leading-tight">Memberikan bantuan keuangan untuk situasi darurat, seperti
                                    biaya medis mendesak atau perbaikan rumah yang mendesak.</span>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                </svg>
                                <span class="leading-tight">menjadi wadah atau tempat untuk berbagi kepada yang
                                    membutuhan</span>
                            </li>
                        </ul>
                    </div>

                    <div class="hidden p-4 bg-white rounded-[30px] md:p-8 max-h-[250px] overflow-y-auto overflow-x-hidden"
                        id="visimisi" role="tabpanel" aria-labelledby="visimisi-tab">
                        <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-600 ">Visi</h2>
                        <p class="mb-3 text-gray-500 dark:text-gray-400">Menjadi komunitas yang peduli dan responsif,
                            berkomitmen untuk mengurangi penderitaan dan meningkatkan kualitas hidup orang-orang yang kurang
                            mampu melalui bantuan langsung yang efektif dan berkelanjutan.</p>

                        <br>
                        <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-600 ">Misi</h2>
                        <ul type="1" class="list-decimal mb-3 text-gray-500 dark:text-gray-400 p-3">
                            <li>Memberikan Bantuan Sembako: Menyediakan paket sembako yang berisi kebutuhan pangan dasar
                                kepada keluarga miskin untuk membantu mereka memenuhi kebutuhan gizi sehari-hari.</li>
                            <li>Menyalurkan Bantuan Finansial: Menyediakan dukungan keuangan langsung kepada individu dan
                                keluarga yang membutuhkan untuk membantu mereka menghadapi kebutuhan mendesak dan
                                pengeluaran penting.</li>
                            <li>Fasilitasi Akses ke Bantuan Lainnya: Mengidentifikasi dan memberikan akses ke bentuk bantuan
                                lain seperti peralatan rumah tangga, pakaian, dan kebutuhan sehari-hari yang dapat
                                meningkatkan kualitas hidup penerima bantuan.</li>
                            <li>Mengorganisir Program Bantuan Berkala: Mengelola distribusi bantuan secara rutin dan berkala
                                untuk memastikan bahwa bantuan yang diberikan konsisten dan dapat diandalkan bagi penerima
                                manfaat.</li>
                            <li>Menggali dan Mengelola Sumber Daya: Bekerja sama dengan donatur, mitra, dan relawan untuk
                                mengumpulkan dan mengelola sumber daya yang dibutuhkan untuk mendukung program bantuan
                                sosial ini.</li>
                            <li>Meningkatkan Kesadaran dan Partisipasi: Meningkatkan kesadaran tentang kondisi ekonomi yang
                                dihadapi oleh orang miskin dan mendorong partisipasi masyarakat dalam upaya bantuan sosial
                                melalui kampanye dan kegiatan komunitas.</li>
                        </ul>
                    </div>

                    <div class="hidden p-4 bg-white rounded-[30px] md:p-8 dark:bg-gray-800" id="visimisi"
                        role="tabpanel" aria-labelledby="visimisi-tab">
                        <dl
                            class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
                            <div class="flex flex-col">
                                <dt class="mb-2 text-3xl font-extrabold">73M+</dt>
                                <dd class="text-gray-500 dark:text-gray-400">Developers</dd>
                            </div>
                            <div class="flex flex-col">
                                <dt class="mb-2 text-3xl font-extrabold">100M+</dt>
                                <dd class="text-gray-500 dark:text-gray-400">Public repositories</dd>
                            </div>
                            <div class="flex flex-col">
                                <dt class="mb-2 text-3xl font-extrabold">1000s</dt>
                                <dd class="text-gray-500 dark:text-gray-400">Open source projects</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        {{-- bagian kategori --}}
        <div id="kategori" class="container w-[500px] p-5 lg:w-[800px] md:w-[630px] justify-center mx-auto">
            <div id="popular-fundrising" class="mt-8">
                <div class="px-4 flex justify-between items-center">
                    <h2 class="font-bold text-lg">Populer Kategori</h2>
                    <a href="" class="p-[6px_12px] rounded-full bg-[#E8E9EE] font-semibold text-sm">Explore All</a>
                </div>

                {{-- carousel category --}}
                <div class="main-carousel mt-[14px]">

                    @foreach ($categories as $category)
                        <div class="px-2 first-of-type:pl-4 last-of-type:pr-4">
                            <a href="{{ route('front.category', $category) }}"
                                class="fundrising-card rounded-[30px] w-[135px] min-h-[160px] flex flex-col items-center gap-3 p-5 border border-[#E8E9EE]">
                                <div class="w-[60px] h-[60px] flex shrink-0 overflow-hidden">
                                    <img src="{{ Storage::url($category->icon) }}" alt="icon">
                                </div>
                                <span class="font-semibold text-center my-auto">{{ $category->name }}</span>
                            </a>
                        </div>
                    @endforeach

                </div>
                {{-- akhir carousel --}}

            </div>
        </div>

        {{-- bagian penggalangan dana --}}
        <div id="galang-donasi" class="container w-[500px] p-5 lg:w-[800px] md:w-[630px] justify-center mx-auto">
            <div id="best-choices" class="mt-8 -mb-6">
                <div class="px-4 flex justify-between items-center">
                    <h2 class="font-bold text-lg">Kita Bantu <br>Penggalangan Donasi</h2>
                    <a href="" class="p-[6px_12px] rounded-full bg-[#E8E9EE] font-semibold text-sm">Explore All</a>
                </div>
                {{-- carousel penggalangan dana --}}
                <div class="main-carousel mt-[14px]">
                    @forelse ($fundraisings as $fundraising)
                        <div class="px-2 first-of-type:pl-4 last-of-type:pr-4 mb-6">
                            <div class="flex flex-col gap-[14px] rounded-2xl border border-[#E8E9EE] p-[14px] w-[208px]">
                                <a href="{{ route('front.details', $fundraising) }}">
                                    <div class="rounded-2xl w-full h-[120px] flex shrink-0 overflow-hidden">
                                        <img src="{{ Storage::url($fundraising->thumbnail) }}"
                                            class="w-full h-full object-cover" alt="thumbnail">
                                    </div>
                                </a>
                                <div class="flex flex-col gap-[6px]">
                                    <a href="{{ route('front.details', $fundraising) }}"
                                        class="font-bold line-clamp-2 hover:line-clamp-none">{{ $fundraising->name }}</a>
                                    <p class="text-xs leading-[18px]">Target <span class="font-bold text-[#FF7815]">Rp
                                            {{ number_format($fundraising->target_amount, 0, ',', '.') }}</span></p>
                                </div>
                                {{-- progres bar --}}
                                <progress id="fund" value="{{ $fundraising->getPercentageAttribute() }}"
                                    max="100" class="w-full h-[6px] rounded-full overflow-hidden"></progress>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada penggalangan Donasi yang dibuat</p>
                    @endforelse

                </div>
                {{-- akhir carousel --}}

            </div>
        </div>

        {{-- bagian daftar penggalangan donasi --}}
        <div class="container w-[500px] p-5 lg:w-[800px] md:w-[630px] justify-center mx-auto">
            <div id="latest-fundrising" class="mt-8">
                <div class="px-4 flex justify-between items-center">
                    <h2 class="font-bold text-lg">Latests <br>Fundraisings</h2>
                    <a href="" class="p-[6px_12px] rounded-full bg-[#E8E9EE] font-semibold text-sm">Explore All</a>
                </div>

                {{-- daftar penggalangan donasi terakhir --}}
                <div class="flex flex-col gap-4 mt-[14px] px-4">
                    @forelse ($fundraisings as $fundraising)
                        <a href="{{ route('front.details', $fundraising) }}" class="card">
                            <div
                                class="w-full border border-[#E8E9EE] flex items-center p-[14px] gap-3 rounded-2xl bg-white">
                                <div class="w-20 h-[90px] flex shrink-0 rounded-2xl overflow-hidden">
                                    <img src="{{ Storage::url($fundraising->thumbnail) }}"
                                        class="w-full h-full object-cover" alt="thumbnail">
                                </div>
                                <div class="flex flex-col gap-1">
                                    <p class="font-bold line-clamp-1 hover:line-clamp-none">{{ $fundraising->name }}</p>
                                    <p class="text-xs leading-[18px]">Target <span class="font-bold text-[#FF7815]">Rp
                                            {{ number_format($fundraising->target_amount, 0, ',', '.') }}</span></p>
                                    <div class="flex items-center gap-1 sm:flex-row-reverse sm:justify-end">
                                        <p class="font-semibold sm:font-medium text-xs leading-[18px]">
                                            {{ $fundraising->fundraiser->user->name }}</p>
                                        <div class="flex shrink-0">
                                            <img src="{{ asset('assets/images/icons/tick-circle.svg') }}" alt="icon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>Belum ada data penggalangan donasi terakhir</p>
                    @endforelse

                    {{-- <a href="details.html" class="card">
                <div class="w-full border border-[#E8E9EE] flex items-center p-[14px] gap-3 rounded-2xl bg-white">
                    <div class="w-20 h-[90px] flex shrink-0 rounded-2xl overflow-hidden">
                        <img src="{{ asset('assets/images/thumbnails/th6.png') }}" class="w-full h-full object-cover"
                            alt="thumbnail">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-bold line-clamp-1 hover:line-clamp-none">Buku Edukasi Peduli Anak lorem
                            ipsum</p>
                        <p class="text-xs leading-[18px]">Target <span class="font-bold text-[#FF7815]">Rp
                                800.000.000</span></p>
                        <div class="flex items-center gap-1 sm:flex-row-reverse sm:justify-end">
                            <p class="font-semibold sm:font-medium text-xs leading-[18px]">Putra Bangsa</p>
                            <div class="flex shrink-0">
                                <img src="{{ asset('assets/images/icons/tick-circle.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="details.html" class="card">
                <div class="w-full border border-[#E8E9EE] flex items-center p-[14px] gap-3 rounded-2xl bg-white">
                    <div class="w-20 h-[90px] flex shrink-0 rounded-2xl overflow-hidden">
                        <img src="{{ asset('assets/images/thumbnails/th7.png') }}" class="w-full h-full object-cover"
                            alt="thumbnail">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-bold line-clamp-1 hover:line-clamp-none">Bangun Desa Angga</p>
                        <p class="text-xs leading-[18px]">Target <span class="font-bold text-[#FF7815]">Rp
                                18.500.000.000</span></p>
                        <div class="flex items-center gap-1 sm:flex-row-reverse sm:justify-end">
                            <p class="font-semibold sm:font-medium text-xs leading-[18px]">Putra Bangsa</p>
                            <div class="flex shrink-0">
                                <img src="{{ asset('assets/images/icons/tick-circle.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </a> --}}
                </div>
                {{-- akhir --}}
            </div>
        </div>


        {{-- floating menu button --}}
        {{-- <div id="menu"
            class="max-w-[341px] w-full fixed bottom-[20px] p-3 flex items-center justify-between rounded-[30px] bg-[#1E2037] transform -translate-x-1/2 left-1/2">
            <a href="" class="p-[14px_16px] flex items-center gap-[6px] rounded-full bg-[#FF7815]">
                <div class="flex shrink-0">
                    <img src="{{ asset('assets/images/icons/heart.svg') }}" alt="icon">
                </div>
                <span class="font-semibold text-sm text-white">Discover</span>
            </a>
            <a href="" class="flex items-center justify-center w-[56px] h-[52px] p-[14px_16px]">
                <div class="flex shrink-0 w-6 h-6 overflow-hidden">
                    <img src="{{ asset('assets/images/icons/crown.svg') }}" alt="icon">
                </div>
            </a>
            <a href="" class="flex items-center justify-center w-[56px] h-[52px] p-[14px_16px]">
                <div class="flex shrink-0 w-6 h-6 overflow-hidden">
                    <img src="{{ asset('assets/images/icons/3dcube.svg') }}" alt="icon">
                </div>
            </a>
            <a href="" class="flex items-center justify-center w-[56px] h-[52px] p-[14px_16px]">
                <div class="flex shrink-0 w-6 h-6 overflow-hidden">
                    <img src="{{ asset('assets/images/icons/setting-2.svg') }}" alt="icon">
                </div>
            </a>
        </div> --}}
        {{-- akhir --}}
    </section>
@endsection

@push('after-scripts')
    <script src="{{ asset('js/cardTab.js') }}"></script>
@endpush
