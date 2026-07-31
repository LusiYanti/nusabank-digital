<x-app-layout>

<div class="py-8">

    <div class="max-w-5xl mx-auto px-4">

        <h1 class="text-3xl font-bold mb-8">
            NusaBank Admin Panel
        </h1>


        {{-- Statistik --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">


            <div class="bg-white shadow rounded-xl p-5">
                <p class="text-gray-600">
                    Total User
                </p>

                <h2 class="text-2xl font-bold">
                    {{ $totalUsers }}
                </h2>
            </div>



            <div class="bg-white shadow rounded-xl p-5">

                <p class="text-gray-600">
                    Total Rekening
                </p>

                <h2 class="text-2xl font-bold">
                    {{ $totalAccounts }}
                </h2>

            </div>



            <div class="bg-white shadow rounded-xl p-5">

                <p class="text-gray-600">
                    Total Transaksi
                </p>

                <h2 class="text-2xl font-bold">
                    {{ $totalTransactions }}
                </h2>

            </div>



            <div class="bg-white shadow rounded-xl p-5">

                <p class="text-gray-600">
                    Total Saldo
                </p>

                <h2 class="text-2xl font-bold">
                    Rp {{ number_format($totalBalance,0,',','.') }}
                </h2>

            </div>


        </div>



        {{-- Daftar Nasabah --}}
        <div class="mt-10 bg-white shadow rounded-xl p-6">


            <h2 class="text-xl font-bold mb-5">
                👥 Daftar Nasabah
            </h2>



            @forelse($users as $user)

            <div class="border-b py-4">


                <p class="font-semibold text-lg">
                    {{ $user->name }}
                </p>


                <p>
                    Email:
                    {{ $user->email }}
                </p>



                @if($user->account)

                <p>
                    No Rekening:
                    {{ $user->account->account_number }}
                </p>


                <p>
                    Saldo:
                    Rp {{ number_format($user->account->balance,0,',','.') }}
                </p>

                @endif


            </div>


            @empty

            <p>
                Belum ada nasabah.
            </p>

            @endforelse


        </div>




        {{-- Semua Transaksi --}}
        <div class="mt-10 bg-white shadow rounded-xl p-6">


            <h2 class="text-xl font-bold mb-5">
                💸 Semua Transaksi
            </h2>



            @forelse($transactions as $transaction)


            <div class="border-b py-4">


                <p class="font-semibold">

                    {{ $transaction->sender->user->name }}

                    →

                    {{ $transaction->receiver->user->name }}

                </p>



                <p>
                    Rp {{ number_format($transaction->amount,0,',','.') }}
                </p>



                <p class="text-gray-500">
                    {{ $transaction->description }}
                </p>



                <p class="text-sm text-gray-400">
                    {{ $transaction->created_at->format('d M Y H:i') }}
                </p>


            </div>


            @empty


            <p>
                Belum ada transaksi.
            </p>


            @endforelse


        </div>



    </div>

</div>


</x-app-layout>