@extends('layouts.main')


@section('container')
    <div class="pt-40">
        <h1 class="font-semibold text-xl lg:text-2xl">Tingkatkan Resolusi dan Kejernihan Gambar, serta Koreksi Wajah</h1>
        <p class="text-secondary-600 text-lg lg:text-xl mt-2"> Fitur ini menggunakan model pembelajaran mesin Real-ESRGAN
            untuk meningkatkan resolusi dan kejernihan
            gambar, serta memperbaiki tampilan wajah.</p>


        <div class="grid grid-cols-1 lg:grid-cols-2 pt-10 border-t border-gray-400 mt-8">
            {{-- input area start --}}
            <div class="border-b lg:border-b-0 lg:border-r border-gray-400 px-4 py-10 lg:py-0">
                <h1 class="text-xl lg:text-2xl mb-8">Input</h1>
                <form action="{{ route('upresolusi.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <img src="" alt="" id="imageInputPreview"
                            class="w-full h-[400px] object-contain hidden">
                        <h1 class="mb-1"># Gambar</h1>
                        <label for="InputImage"
                            class="capitalize p-4 bg-gray-200 w-full block text-gray-700 rounded-lg cursor-pointer">
                            klik untuk memasukan foto
                        </label>
                        <input type="file" id="InputImage" name="image" class="hidden">
                    </div>

                    <div class="mt-4">
                        <h1 class="mb-1"># Scale</h1>
                        <span class="mb-1 border py-2 px-4 bg-gray-200 text-gray-700 inline-block" id="ScaleValue">4</span>
                        <div class="flex w-full">
                            <input type="range" min="1" max="10" step="1" value="4" class="w-full"
                                name="scale" id="ScaleInput" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <h1 class="mb-1"># Peningkatan Wajah</h1>


                        <div class="inline-flex items-center gap-x-3">
                            <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="face_enhance">
                                <input type="checkbox"
                                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10"
                                    id="face_enhance" name="face_enhance" />
                                <span
                                    class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                        fill="currentColor" stroke="currentColor" stroke-width="1">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </label>
                            <label class="mt-px font-light text-gray-700 cursor-pointer select-none" htmlFor="face_enhance"
                                for="face_enhance">
                                Face Enhance
                            </label>
                        </div>

                    </div>

                    <div class="flex mt-8 gap-2">
                        <a href="{{ route('upresolusi') }}"
                            class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg text-gray-900 shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none border border-gray-800"
                            type="button" data-ripple-light="true">
                            Reset
                        </a>

                        <button id="btnSubmit"
                            class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                            type="button" data-ripple-light="true">
                            Jalankan
                        </button>
                    </div>

                </form>
            </div>
            {{-- input area end --}}

            {{-- output area start --}}
            <div class="px-4 py-10 lg:py-0">
                <h1 class="text-xl lg:text-2xl mb-8">Output</h1>
                <div>
                    <img src="" alt="" class="w-full object-contain hidden" id="outputPreview">
                    <div class="w-full h-64 border border-black" id="loadingOutputArea">
                        <div class="grid h-full w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible hidden"
                            id="loadingOutput">
                            <svg class="text-gray-300 animate-spin" viewBox="0 0 64 64" fill="none"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                <path
                                    d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z"
                                    stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762"
                                    stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"
                                    class="text-gray-900">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h1 class="mt-4 font-semibold capitalize" id="status"></h1>
                    <h1 class="mt-2 capitalize bg-gray-200 p-2 text-gray-800 hidden" id="failedMessage">Lorem ipsum dolor
                        sit amet consectetur, adipisicing elit. Nostrum, temporibus minus nam tenetur ipsa rerum cumque
                        recusandae aliquam ut quod ea dignissimos qui praesentium repudiandae. Id rerum unde error esse.
                    </h1>
                    <div class="flex gap-2">
                        <button
                            class="p-2 border border-black mt-4 flex gap-x-2 items-center group hover:bg-gray-900 hover:text-white hover:rounded-lg transition-all duration-400"
                            id="cancelBtn">
                            Cancel
                        </button>

                        <div class="flex gap-x-2 items-center mt-4">
                            <button
                                class="p-2 border border-black flex gap-x-2 items-center group hover:bg-gray-900 hover:text-white hover:rounded-lg transition-all duration-400"
                                id="downloadBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                    viewBox="0 0 512 512"
                                    class="my-auto group-hover:fill-white"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path
                                        d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                </svg>
                                Download
                            </button>

                            <svg class="text-gray-300 animate-spin hidden" viewBox="0 0 64 64" fill="none"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" id="downloadLoading">
                                <path
                                    d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z"
                                    stroke="currentColor" stroke-width="5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                                <path
                                    d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762"
                                    stroke="currentColor" stroke-width="5" stroke-linecap="round"
                                    stroke-linejoin="round" class="text-gray-900">
                                </path>
                            </svg>

                        </div>

                    </div>

                </div>
            </div>
            {{-- output area end --}}


        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //proses get image
        $(document).ready(function() {

            // range input
            $("#ScaleInput").on('input', function() {
                $("#ScaleValue").html($(this).val());
            });


            $("#InputImage").on('change', function(e) {
                var input = e.target;
                var reader = new FileReader();

                reader.onload = function() {
                    var imageUrl = reader.result;
                    $("#imageInputPreview").attr('src', imageUrl).removeClass('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            });


            $('#btnSubmit').on('click', function() {
                var gambarInput = $("#InputImage")[0];
                var gambar = gambarInput.files.length > 0 ? gambarInput.files[0] : null;
                var scale = $('#ScaleInput').val();
                var face = $('#face_enhance').val();

                var csrfToken = $('input[name="_token"]').val();

                if (gambar) {
                    var formData = new FormData();
                    formData.append('_token', csrfToken);
                    formData.append('gambar', gambar);
                    formData.append('scale', scale);
                    formData.append('face', face);

                    $.ajax({
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $("#btnSubmit").prop('disabled', true);
                            $("#outputPreview").attr('src', '').addClass('hidden');
                            showLoadingOutput();
                        },
                        success: function(response) {
                            checkStatus(response.id);

                        },
                        error: function(error) {
                            console.error('Gagal melakukan permintaan POST:', error);
                        }
                    });
                } else {
                    console.error('Tidak ada file yang dipilih');
                }
            });




            // kode yang lebih bagus
            function checkStatus(id) {
                $.ajax({
                    url: '/features/UpResolusi',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        handleStatusResponse(response, id);
                    },
                    error: function(error) {
                        console.error('Gagal mengambil status:', error);
                    }
                });
            }

            function handleStatusResponse(response, id) {
                $("#status").html(response.status);

                if (response.status == 'failed') {
                    handleFailedStatus(response.error);
                } else if (response.status === 'succeeded') {
                    handleSucceededStatus(response.output);
                } else if (response.status == 'canceled') {
                    handleCancelStatus();
                } else if (response.status !== 'succeeded' && response.status !== 'canceled') {
                    handlePendingStatus(id, response.urls.cancel);
                }
            }

            function handleFailedStatus(error) {
                $("#failedMessage").html(error).removeClass('hidden');
                hideLoadingOutput();
                $("#btnSubmit").prop('disabled', false);
            }

            function handleSucceededStatus(output) {
                $("#downloadBtn").off('click').on('click', function() {
                    downloadImage(output);
                });
                $("#outputPreview").attr('src', output).removeClass('hidden');
                hideLoadingOutput();
                $("#btnSubmit").prop('disabled', false);

            }

            function handlePendingStatus(id, cancelUrl) {
                $("#loadingOutput").removeClass('hidden');
                $("#cancelBtn").off('click').on('click', function() {
                    cancel(cancelUrl);
                });

                // Lakukan polling kembali setelah beberapa waktu (misalnya, 1 detik)
                setTimeout(function() {
                    checkStatus(id);
                }, 1000);
            }

            function handleCancelStatus() {
                $("#loadingOutput").addClass('hidden');
                $("#btnSubmit").prop('disabled', false);

            }

            function hideLoadingOutput() {
                $("#loadingOutput").addClass('hidden');
                $("#loadingOutputArea").addClass('hidden');
            }

            function showLoadingOutput() {
                $("#loadingOutput").removeClass('hidden');
                $("#loadingOutputArea").removeClass('hidden');
            }
            // kode yang lebih bagus end 


            function cancel(urlCancel) {
                $.ajax({
                    url: '/features/UpResolusi/cancel',
                    method: 'GET',
                    data: {
                        urlCancel: urlCancel
                    },
                    success: function(response) {

                    },
                    error: function(error) {

                    }
                });
            }

            async function downloadImage(url) {
                try {
                    // Menampilkan loading
                    $("#downloadLoading").removeClass("hidden");
                    //disable btn download
                    $("#downloadBtn").prop('disabled', true);

                    if (url !== null) {
                        // Fetch image content
                        const response = await fetch(url);
                        // Convert response to blob
                        const blob = await response.blob();
                        // Create a link element
                        const link = document.createElement('a');
                        // Create a Blob URL from the image blob
                        const blobUrl = window.URL.createObjectURL(blob);
                        // Set the href attribute to the Blob URL
                        link.href = blobUrl;
                        // Set the download attribute to specify the default file name
                        link.download = 'imageLabs';
                        // Programmatically trigger a click event on the link
                        const event = new MouseEvent('click');
                        link.dispatchEvent(event);
                        // Revoke the Blob URL to free up resources
                        window.URL.revokeObjectURL(blobUrl);
                    }

                } catch (error) {
                    console.error('Error fetching image:', error);
                } finally {
                    // Menyembunyikan elemen loading setelah pengunduhan selesai
                    $("#downloadLoading").addClass("hidden");
                    //enable btn download
                    $("#downloadBtn").prop('disabled', false);

                }
            }

        });
    </script>
@endpush




{{-- // function checkStatus(id) {
    //     $.ajax({
    //         url: '/features/UpResolusi',
    //         method: 'GET',
    //         data: {
    //             id: id
    //         },
    //         success: function(response) {
    //             $("#status").html(response.status);

    //             if (response.status == 'failed') {
    //                 $("#failedMessage").html(response.error).removeClass('hidden');
    //             }

    //             if (response.status === 'succeeded') {
    //                 $("#downloadBtn").on('click', function() {
    //                     downloadImage(response.output);
    //                 });
    //                 $("#outputPreview").attr('src', response.output).removeClass('hidden');


    //             } else if (response.status !== 'succeeded' || response.status !== 'canceled') {
    //                 $("#loadingOutput").removeClass('hidden');
    //                 $("#cancelBtn").on('click', function() {
    //                     cancel(response.urls.cancel);
    //                 });
    //                 // Lakukan polling kembali setelah beberapa waktu (misalnya, 1 detik)
    //                 setTimeout(function() {
    //                     checkStatus(id);
    //                 }, 1000);
    //             } 
    //             if (response.status == 'succeeded' || response.status == 'canceled' ||
    //                 response.status == 'failed') {
    //                 $("#loadingOutput").addClass('hidden');
    //                 $("#loadingOutputArea").addClass('hidden');


    //             }
    //         },
    //         error: function(error) {
    //             console.error('Gagal mengambil status:', error);
    //         }
    //     });
    // } --}}