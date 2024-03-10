<div class="flex flex-col space-y-5">
    <h2 class=" text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-100">Parent's & Other Information</h2>
    <div class="w-full flex space-x-4 items-start">
        <div class="w-full flex flex-col">
            <label for="occupation" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Occupation</label>
            <select id="occupation" name="occupation"
            class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                <option value="" selected disabled>choose an occupation</option>
                @foreach ($jobs as $job)
                    <option value="{{ $job->name }}" >{{ $job->name }}</option>
                @endforeach
                <option value="other">Other (Specify Below)</option>
            </select>
            <input type="text" id="otherOccupation" name="other_occupation" placeholder="Specify Occupation"
                class="mt-2 focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                style="display: none;" >

            @error('occupation')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <script>
            const occupationSelect = document.getElementById('occupation');
            const otherOccupationInput = document.getElementById('otherOccupation');

            occupationSelect.addEventListener('change', function () {
                if (this.value === 'other') {
                    otherOccupationInput.style.display = 'block';
                } else {
                    otherOccupationInput.style.display = 'none';
                    otherOccupationInput.value = '';
                }
            });
        </script>

        <div class="w-full flex flex-col">
            <label for="religion" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Religion</label>
            <select name="religion" id="religion" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled >Choose Religion</option>
                @foreach ($religions as $religion)
                    <option value="{{ $religion->name }}" >{{ $religion->name }}</option>
                @endforeach
                <option value="other" >Other (Specify Below)</option>
            </select>
            <input type="text" name="other_religion" id="otherReligion" placeholder="Specify Religion"
            class="mt-2 focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            style="display: none;" >
            @error('religion')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <script>
            const religionSelect = document.getElementById('religion');
            const otherReligionInput = document.getElementById('otherReligion');

            religionSelect.addEventListener('change', function () {
                if (this.value === 'other') {
                    otherReligionInput.style.display = 'block';
                } else {
                    otherReligionInput.style.display = 'none';
                    otherReligionInput.value = '';
                }
            });
        </script>

        <div class="w-full flex flex-col">
            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Citizenship</label>
            <select name="citizenship" id="citizenship"
            class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected disabled>choose a citizenship</option>

                <option value="Other" >Other (Specify Below)</option>
            </select>
            <input type="text" name="other_citizenship" id="otherCitizenship" placeholder="Specify Citizenship"
            class="mt-2 focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            style="display: none;">
            @error('citizenship')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <script>
            const citizenshipSelect = document.getElementById('citizenship');
            const otherCitizenshipInput = document.getElementById('otherCitizenship');

            citizenshipSelect.addEventListener('change', function () {
                if (this.value === 'Other') {
                    otherCitizenshipInput.style.display = 'block';
                } else {
                    otherCitizenshipInput.style.display = 'none';
                    otherCitizenshipInput.value = '';
                }
            });
        </script>

        <div class="w-full flex flex-col space-y-1">
            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Civil Status</label>
            <select name="civil_status"
            class="mt-2 focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('civil_status') ?? ($deceased->civil_status ?? '') }}">
                <option value="" selected disabled>choose a civil status</option>
                <option value="Married">Married</option>
                <option value="Single">Single</option>
                <option value="Separated">Separated</option>
                <option value="Widowed">Widowed</option>
            </select>
            @error('civil_status')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

    </div>

    <div class="w-full flex flex-col space-y-1">
        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" >Place of Birth</label>
        <input type="text" name="birth_place" placeholder="Place of Birth"
        class="mt-2 focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        value="{{ old('birth_place') ?? ($deceased->birth_place ?? '') }}">
        @error('birth_place')
            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="w-full flex space-x-4 items-start">
        <div class="w-full flex flex-col space-y-1">
            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" >Name Of Father</label>
            <input type="text" name="fathers_name" placeholder="Name of father"
            class="mt-2 focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('fathers_name') ?? ($deceased->fathers_name ?? '') }}">
            @error('fathers_name')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full flex flex-col space-y-1">
            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Maiden Name of Mother</label>
            <input type="text" name="mother_maiden_name" placeholder="Maiden name of mother"
            class="mt-2 focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('mother_maiden_name') ?? ($deceased->mother_maiden_name ?? '') }}">
            @error('mother_maiden_name')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
