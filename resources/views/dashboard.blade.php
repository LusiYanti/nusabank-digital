<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">

                <h1 class="text-3xl font-bold text-blue-700 mb-2">
                    🏦 NusaBank Digital
                </h1>

                <p class="text-gray-500 mb-8">
                    Halo, <span class="font-semibold">{{ $user->name }}</span> 👋
                </p>

                <div class="bg-blue-600 rounded-2xl shadow-lg p-8 text-white">

                <p class="text-sm opacity-80">
                    Total Saldo
                </p>

                <h2 class="text-4xl font-bold mt-2">
                    Rp {{ number_format($account->balance,0,',','.') }}
                </h2>

            <div class="mt-8">
                <p class="text-sm opacity-80">
                    Nomor Rekening
                </p>

                <p class="text-xl tracking-widest font-semibold">
                    {{ $account->account_number }}
                </p>

            </div>

        </div>

        <div class="grid grid-cols-3 gap-4 mt-8">

        <a href="{{ route('transfer') }}"
            class="bg-white rounded-xl shadow p-4 hover:bg-gray-100 text-center block">

            💸 <br>

            Transfer

        </a>
    

        <button class="bg-white rounded-xl shadow p-4 hover:bg-gray-100">
            💰
            <br>
            Top Up
        </button>

        <button class="bg-white rounded-xl shadow p-4 hover:bg-gray-100">
            📄
            <br>
            Riwayat
        </button>

    </div>

    <div class="bg-white rounded-xl shadow mt-8 p-6">

        <h3 class="font-bold text-lg mb-3">
            Aktivitas Terakhir
        </h3>

        <p class="text-gray-500">
            Belum ada transaksi.
        </p>

    </div>

</div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
