<x-guest-layout>
    <div>
        <div class="max-w-[1400px] mx-auto p-4 min-h-[600px] h-auto flex items-center justify-center">
            <div class="w-full mt-14 flex flex-col items-center justify-center h-full">
                <h2 class="text-8xl font-semibold text-blue-600 mb-4 text-center imperial-script-regular">Our Deepest Condolences</h2>
                <p class="text-gray-700 text-base leading-relaxed text-center w-[70%]">
                    We have received your request, and in this difficult time, we want to extend our deepest condolences.
                    Please know that you are not alone in your grief. Rest assured that we are fully committed to supporting you and easing your feelings. <strong>Now to complete your transaction pls. go to our main office at 110 Bayanan Rd, Bacoor, 4102 Cavite</strong>.
                    Thank you for choosing Torres Escaro. We are here to stand by your side with understanding and empathy.
                </p>
                <a id="save_to_image" class="flex flex-col items-center justify-center space-y-3 border border-gray-200 p-4 mt-8 bg-white">
                    <div class="w-full flex justify-start">
                        <div class="text-white flex space-x-2 items-center">
                            <img src="{{asset('images/Torreslogo.png')}}" alt="" class="w-14 h-14 rounded-full border border-gray-300">
                            <div>
                                <h1 class="text-sm text-black font-bold">TORRES ESCARO</h1>
                                <p class="text-xs text-black">Funeral Services</p>
                            </div>
                        </div>
                    </div>
                    <div id="qr-code" class="qr-code w-full flex items-center justify-center h-56">
                        <img src="data:image/jpg;base64,{{ base64_encode($qrcode) }}" alt="QR Code">
                    </div>
                    <div class="w-full flex flex-col items-center justify-center mt-12">
                        <p class="text-gray-800 text-sm">Scan this QR Code to view your transaction details</p>
                        <p class="text-gray-800 text-sm">110 Bayanan Rd, Bacoor, 4102 Cavite</p>
                    </div>
                </a>
                <button id="save" class="mt-4 py-2 px-6 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-md cursor-pointer">Download</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/html2canvas.js') }}"></script>
    <script>
        let saveBtn = document.querySelector("#save");

        saveBtn.addEventListener("click", function () {
            html2canvas(document.querySelector("#save_to_image")).then(function (canvas) {
                var link = document.querySelector("#save_to_image");
                link.setAttribute("download", "ToresEscaroFuneralServices.png");
                link.setAttribute(
                "href",
                canvas.toDataURL("image/png").replace("image/png", "image/octet-stream")
                );
                link.click();
            });
        });
    </script>
</x-guest-layout>

