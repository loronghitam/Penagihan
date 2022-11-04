<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulir') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('daftar') }}" method="post">
                        @csrf
                        <div class="mb-3 flex flex-col">
                            <label for="" class="">Alamat</label>
                            <input type="text" name="alamat">
                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="" class="">Paket</label>
                            <select name="paket" id="">
                                @forelse ($data as $item)
                                <option value="" selected disabled>Pilih Paket</option>
                                <option value="{{ $item->id }}">{{ $item->name }} || Rp {{ $item->amount }}</option>
                                @empty
                                <option value="">Data Not Found</option>
                                @endforelse
                            </select>
                        </div>
                        <button type="submit"
                            class="bg-slate-400 px-5 py-2 text-white hover:bg-slate-600 hover:transition-all hover:duration-200">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
