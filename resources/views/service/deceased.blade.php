<x-guest-layout>
    <div>
        <div class="max-w-[1400px] px-4 mx-auto ">
            <x-stepper :page="$page" :service="$service"/>

            <div>
                <h2 class="mb-6 text-2xl font-semibold text-gray-900 dark:text-white">Deceased Information</h2>
                <form action="{{ route('services.deceased-store', $service->id) }}" method="POST" class="w-full ">
                    @csrf
                    <div class="form-section flex flex-col space-y-4" id="personal-info">
                        <x-deceased-personal-info :service="$service" />
                        <div class="flex items-center space-x-4 py-1">
                            <a class="nav-button text-sm px-6 py-2 rounded-md bg-gray-200 hover:bg-gray-300 hover:text-gray-700 cursor-pointer"
                            href="{{ route('services.inclusions', $service->id) }}"
                            >Back</a>
                            <a class="nav-button text-sm px-6 py-2 rounded-md bg-blue-700 hover:bg-blue-800 text-white cursor-pointer" data-next="parents-info">Next</a>
                        </div>
                    </div>

                    <div class="form-section flex flex-col space-y-4" id="parents-info" style="display: none;">
                        <x-deceased-parents-info :service="$service" :jobs="$jobs" :religions="$religions" />
                        <div class="flex items-center space-x-3 py-1">
                            <a class="nav-button text-sm px-6 py-2 rounded-md bg-gray-200 hover:bg-gray-300 hover:text-gray-700 cursor-pointer" data-back="personal-info">Back</a>
                            <a class="nav-button text-sm px-6 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white cursor-pointer" data-next="other-info">Next</a>
                        </div>
                    </div>

                    <div class="form-section flex flex-col space-y-4" id="other-info" style="display: none;">
                        <x-deceased-other-info :service="$service" :causes="$causes" />
                        <div class="flex items-center space-x-3 py-1">
                            <a class="nav-button text-sm px-6 py-2 rounded-md bg-gray-200 hover:bg-gray-300 hover:text-gray-700 cursor-pointer" data-back="parents-info">Back</a>
                            <a class="nav-button text-sm px-6 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white cursor-pointer" data-next="interment-info">Next</a>
                        </div>
                    </div>

                    <div class="form-section flex flex-col space-y-4" id="interment-info" style="display: none;">
                        <x-deceased-interment-info :service="$service" />
                        <div class="flex items-center space-x-3 py-1">
                            <a class="nav-button text-sm px-6 py-2 rounded-md bg-gray-200 hover:bg-gray-300 hover:text-gray-700 cursor-pointer" data-back="other-info">Back</a>
                            <button type="submit" class="text-sm px-6 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white cursor-pointer">Save and Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const formSections = document.querySelectorAll(".form-section");
        const navButtons = document.querySelectorAll(".nav-button");

        function hideAllSections() {
            formSections.forEach(section => {
                section.style.display = "none";
            });
        }

        navButtons.forEach(button => {
            button.addEventListener("click", () => {
                const nextSectionId = button.getAttribute("data-next");
                const backSectionId = button.getAttribute("data-back");

                if (nextSectionId) {
                    hideAllSections();
                    document.getElementById(nextSectionId).style.display = "block";
                } else if (backSectionId) {
                    hideAllSections();
                    document.getElementById(backSectionId).style.display = "block";
                }
            });
        });
    </script>
</x-guest-layout>
