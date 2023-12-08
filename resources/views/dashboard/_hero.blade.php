<div class="flex items-center justify-center pb-10 pt-32">
    <div class="w-max">
        <h1 class="overflow-hidden whitespace-nowrap text-3xl md:text-4xl lg:text-5xl font-bold py-4" id="judul"></h1>
    </div>
</div>
<p class="text-center text-xl md:text-2xl lg:text-4xl text-secondary-400">Mengubah pengalaman pengeditan foto dengan
    kecerdasan buatan. Hasil
    luar biasa dalam sekejap, ciptakan karya visual menakjubkan! 🚀✨</p>

<div class="flex items-center justify-center mt-10">
    <a href="{{ route('dashboard.features') }}"
        class="mx-auto align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none inline-flex items-center justify-center"
        type="button" data-ripple-light="true">
        Coba Sekarang
    </a>
</div>




@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const textElement = document.getElementById("judul");
            const textToType = "Image Labs"; // Ganti dengan teks yang diinginkan
            const kecepatanMengetik = 100; // Sesuaikan kecepatan mengetik (milidetik per karakter)

            function mulaiMengetik() {
                let indeksKarakter = 0;

                function mengetik() {
                    if (indeksKarakter < textToType.length) {
                        textElement.textContent += textToType.charAt(indeksKarakter);
                        indeksKarakter++;
                        setTimeout(mengetik, kecepatanMengetik);
                    } else {
                        setTimeout(() => {
                            textElement.textContent = ""; // Reset text
                            indeksKarakter = 0; // Reset indeks karakter
                            mengetik(); // Mulai mengetik lagi setelah reset
                        }, 1000); // Tunggu 1 detik sebelum reset
                    }
                }

                mengetik();
            }

            mulaiMengetik();
        });
    </script>
@endpush
