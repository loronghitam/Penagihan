<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (!$data)
                    <h3>Selamat datang selahkan <a href="/form"> daftar </a> untuk menikmati layanan internet anda</h3>
                    @else
                    {{-- {{ dd($data) }} --}}
                        @if ($data->status === null)
                        <h3>akun anda sudah terdaftar mohon tunggu</h3>
                        @elseif($data->status == 1)
                            @if ($bill->tanggal_tagihan >= date('Y-m-d') and $bill->image == null)
                            <h3>mohon bayar <a href="/pay">tagihannya</a> mas</h3>
                            @elseif ($bill->tanggal_tagihan <= date('Y-m-d') and $bill->image == null)
                            <h3>mohon bayar sebelum tanggal 15</h3>
                            @elseif ($bill->payment == null && $bill->tanggal_tagihan != null)
                            <h3>Mohon tunggu konfirmasi pembayaran</h3>
                            @endif
                        @else
                        <h3>akun anda di tolak silahkan <a href="/form">daftar</a> kembali</h3>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
