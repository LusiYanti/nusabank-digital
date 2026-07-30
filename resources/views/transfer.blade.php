<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            💸 Transfer Dana
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow rounded-xl p-8">

                <h2 class="text-2xl font-bold mb-6">
                    Transfer Dana
                </h2>

                <form action="{{ route('transfer.store') }}" method="POST">
                @csrf

                    <div class="mb-5">

                        <label class="block mb-2 font-semibold">
                            Nomor Rekening Tujuan
                        </label>

                        <input
                            type="text"
                            name="account_number"
                            class="w-full border rounded-lg p-3"
                            placeholder="Masukkan nomor rekening">

                    </div>

                    <div class="mb-5">

                        <label class="block mb-2 font-semibold">
                            Nominal
                        </label>

                        <input
                            type="number"
                            name="amount"
                            class="w-full border rounded-lg p-3"
                            placeholder="Masukkan nominal">

                    </div>

                    <div class="mb-5">

                        <label class="block mb-2 font-semibold">
                            Keterangan
                        </label>

                        <textarea
                            class="w-full border rounded-lg p-3"
                            rows="3"
                            name="description"
                            placeholder="Opsional"></textarea>

                    </div>

                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                        Transfer Sekarang

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>