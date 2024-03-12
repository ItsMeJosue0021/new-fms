<x-customer>
    <div>
        <div class="max-w-[1400px] px-4 mx-auto ">
            <x-stepper/>

            <form action="{{ route('services.informant-store', $service->id) }}" method="POST">
                @csrf
                <h2 class="mb-6 text-2xl font-semibold text-gray-900 dark:text-white">Informant's Information</h2>
                <div class="form-section flex flex-col space-y-4" id="personal-info">
                    <h2 class=" text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-100">Personal Information</h2>
                    <div class="w-full flex space-x-4 items-start">
                        <div class="w-full flex flex-col">
                            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                            <input type="text" name="first_name" placeholder="First name"
                            class="active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('first_name') ?? ($informant->first_name ?? '') }}">
                            @error('first_name')
                                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full flex flex-col ">
                            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                            <input type="text" name="middle_name" placeholder="Middle name"
                            class="active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('middle_name') ?? ($informant->middle_name ?? '') }}">
                            @error('middle_name')
                                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full flex flex-col ">
                            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                            <input type="text" name="last_name" placeholder="Last name"
                            class="active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('last_name') ?? ($informant->last_name ?? '') }}">
                            @error('last_name')
                                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="w-full flex space-x-4 items-start">
                        <div class="w-full flex flex-col">
                            <label for="dobInput" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                            <input type="date" name="dob" placeholder="Date of Birth" id="dobInput" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('dob') ?? ($informant->dob ?? '') }}" />
                            @error('dob')
                                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full flex flex-col">
                            <label for="ageInput" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                            <input type="text" name="age" placeholder="Age" id="ageInput" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('age') ?? ($informant->age ?? '') }}" />
                            @error('age')
                                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full flex flex-col">
                            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Occupation</label>
                            <select name="occupation" id="occupation" class="active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                <option value="" selected disabled>choose an occupation</option>
                                @foreach ($jobs as $job)
                                <option value="{{ $job->name }}" {{ (old('occupation') ?? ($informant->occupation ?? '')) == $job->name ? 'selected' : '' }}>{{ $job->name }}</option>
                                @endforeach
                                <option value="Other" >Other (Specify Below)</option>
                            </select>
                                <input type="text" id="otherOccupation" name="other_occupation" placeholder="Specify Occupation"
                                class="mt-2 active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                style="display: none;"
                                value="{{ old('otherOccupation') ?? ($informant->occupation ?? '') }}">
                            @error('occupation')
                                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                            @enderror

                            <script>
                                const occupationSelect = document.getElementById('occupation');
                                const otherOccupationInput = document.getElementById('otherOccupation');
                                occupationSelect.addEventListener('change', function () {
                                    if (this.value === 'Other') {
                                        otherOccupationInput.style.display = 'block';
                                    } else {
                                        otherOccupationInput.style.display = 'none';
                                        otherOccupationInput.value = '';
                                    }
                                });
                            </script>
                        </div>
                    </div>

                    <div class="w-full flex flex-col">
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" name="address" placeholder="Address"
                        class="active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('address') ?? ($informant->address ?? '') }}">
                        @error('address')
                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center space-x-4 py-1">
                        <a class="nav-button text-sm px-6 py-2 rounded-md bg-gray-200 hover:bg-gray-300 hover:text-gray-700 cursor-pointer"

                        >Back</a>
                        <a class="nav-button text-sm px-6 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white cursor-pointer" data-next="contact-info">Next</a>
                    </div>
                </div>

                <div class="form-section flex flex-col space-y-4" id="contact-info" style="display: none;">
                    <h2 class=" text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-100">Contact Information</h2>
                    <div class="w-full flex space-x-4 items-start">
                        <div class="w-full flex flex-col">
                            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Telephone Number</label>
                            <input type="number" name="telephone" placeholder="Telephone number"
                            class="phone active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('telephone') ?? ($informant->telephone ?? '') }}">
                            @error('telephone')
                                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full flex flex-col">
                            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Cellphone Number</label>
                            <input type="number" name="mobilephone" placeholder="Cellphone Number"
                            class="phone active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('mobilephone') ?? ($informant->mobilephone ?? '') }}">
                            @error('mobilephone')
                                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const inputs = document.querySelectorAll('.phone');

                            inputs.forEach(input => {
                                input.addEventListener('input', function() {
                                    // Remove any non-digit characters
                                    this.value = this.value.replace(/\D/g, '');

                                    // Limit the input to 11 digits
                                    if (this.value.length > 11) {
                                        this.value = this.value.slice(0, 11);
                                    }
                                });
                            });
                        });
                    </script>

                    <div class="w-full flex flex-col">
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Occupation</label>
                        <select name="relationshipt_to_deceased" id="relationshipt_to_deceased" class="active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            <option value="" selected disabled>Choose your relationship</option>
                            @foreach ($relationships as $relationship)
                            <option value="{{ $relationship->name }}" {{ (old('relationshipt_to_deceased') ?? ($informant->relationshipt_to_deceased ?? '')) == $relationship->name ? 'selected' : '' }}>{{ $relationship->name }}</option>
                            @endforeach
                            <option value="Other" >Other (Specify Below)</option>
                        </select>
                            <input type="text" id="otherRelationship" name="other_relationshipt_to_deceased" placeholder="Specify your Relationship"
                            class="mt-2 active:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            style="display: none;"
                            value="{{ old('relationshipt_to_deceased') ?? ($informant->relationshipt_to_deceased ?? '') }}">
                        @error('relationshipt_to_deceased')
                            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                        @enderror

                        <script>
                            const relationshipSelect = document.getElementById('relationshipt_to_deceased');
                            const otherRelationshipInput = document.getElementById('otherRelationship');
                            relationshipSelect.addEventListener('change', function () {
                                if (this.value === 'Other') {
                                    otherRelationshipInput.style.display = 'block';
                                } else {
                                    otherRelationshipInput.style.display = 'none';
                                    otherRelationshipInput.value = '';
                                }
                            });
                        </script>
                    </div>

                    <div class="flex items-center space-x-3 py-1">
                        <a class="nav-button text-sm px-6 py-2 rounded-md bg-gray-200 hover:bg-gray-300 hover:text-gray-700 cursor-pointer" data-back="personal-info">Back</a>
                        <button type="submit" class=" text-sm px-6 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white cursor-pointer">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const formSections = document.querySelectorAll(".form-section");
        const navButtons = document.querySelectorAll(".nav-button");
        const dobInput = document.getElementById('dobInput');
        const ageInput = document.getElementById('ageInput');

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

        dobInput.addEventListener('input', () => {
            const dob = new Date(dobInput.value);
            const today = new Date();
            const age = today.getFullYear() - dob.getFullYear();

            if (dob.toISOString().split('T')[0] === today.toISOString().split('T')[0]) {
                ageInput.value = 'New Born';
            } else {
                ageInput.value = age;
            }
        });
    </script>
</x-customer>
