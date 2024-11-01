<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penggalanagan Dana Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.fundraisings.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- create nama --}}
                    <div>
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- create thumnail --}}
                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Foto')" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required
                            autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    {{-- create target amount --}}
                    <div class="mt-4">
                        <x-input-label for="target_amount" :value="__('Target Dana')" />
                        <x-text-input id="target_amount" class="block mt-1 w-full" type="number" name="target_amount"
                            :value="old('target_amount')" required autofocus autocomplete="target_amount" />
                        <x-input-error :messages="$errors->get('target_amount')" class="mt-2" />
                    </div>

                    {{-- create kategori --}}
                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Kategori')" />

                        <select name="category_id" id="category_id"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Plilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    {{-- create about --}}
                    <div class="mt-4">
                        <x-input-label for="about" :value="__('Tentang')" />
                        <textarea name="about" id="about" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full"></textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Buat Peggalangan Dana
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
