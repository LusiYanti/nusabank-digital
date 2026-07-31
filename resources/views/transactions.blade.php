<x-app-layout>

<div class="py-8">

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

<h2 class="text-2xl font-bold mb-6">
    📄 Riwayat Transaksi
</h2>


@forelse($transactions as $transaction)

<div class="border-b py-4">

    <p class="font-semibold">

        @if($transaction->sender_account_id == auth()->user()->account->id)

        🔴 Transfer Keluar

        <br>

        Ke:
        {{ $transaction->receiver->user->name }}

    @else

        🟢 Transfer Masuk

        <br>

        Dari:
        {{ $transaction->sender->user->name }}

        @endif

    </p>

    <p>
        Rp {{ number_format($transaction->amount,0,',','.') }}
    </p>

    <p class="text-gray-500 text-sm">
        {{ $transaction->description }}
    </p>

</div>


@empty

<p>
Belum ada transaksi.
</p>

@endforelse


</div>

</div>

</x-app-layout>