<div class="flex flex-col space-y-5">
    <div class="w-full flex space-x-4 items-start">
        <div class="w-full flex flex-col space-y-1">
            <label class="text-xs ">OCCUPATION</label>
            <select id="occupation" name="occupation" class="w-full text-sm bg-inherit border border-gray-300 rounded " >
                <option value="" selected disabled>choose an occupation</option>

                <option value="other" >Other (Specify Below)</option>
            </select>
                <!-- Input field for "Other" option -->
                <input type="text" id="otherOccupation" name="other_occupation" placeholder="Specify Occupation" class="w-full text-sm bg-inherit border border-gray-300 rounded" style="display: none;"
                value="{{ old('otherOccupation') ?? ($deceased->occupation ?? '') }}">
            @error('occupation')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>


        {{-- script for occupation drop down list other --}}
        <script>
            // Get references to the select and text input elements
            const occupationSelect = document.getElementById('occupation');
            const otherOccupationInput = document.getElementById('otherOccupation');

            // Listen for changes to the select input
            occupationSelect.addEventListener('change', function () {
                if (this.value === 'other') {
                    // If "Other" is selected, show the text input field
                    otherOccupationInput.style.display = 'block';
                } else {
                    // If another option is selected, hide the text input field and clear its value
                    otherOccupationInput.style.display = 'none';
                    otherOccupationInput.value = '';
                }
            });
        </script>
        {{-- end of script --}}


        {{--  --}}
        <div class="w-full flex flex-col space-y-1">
            <label class="text-xs ">RELIGION</label>
            <select name="religion" id="religion" class="w-full text-sm bg-inherit border border-gray-300 rounded">
                <option value="other" >Other (Specify Below)</option>
            </select>
            <input type="text" name="otherReligion" id="otherReligion" placeholder="Specify Religion" class="w-full text-sm bg-inherit border border-gray-300 rounded" style="display: none;"
            value="{{ old('otherReligion') ?? ($deceased->religion ?? '') }}">
            @error('otherReligion')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        {{-- script for religion drop down list other --}}
        <script>
            // Get references to the select and text input elements
            const religionSelect = document.getElementById('religion');
            const otherReligionInput = document.getElementById('otherReligion');

            // Listen for changes to the select input
            religionSelect.addEventListener('change', function () {
                if (this.value === 'other') {
                    // If "Other" is selected, show the text input field
                    otherReligionInput.style.display = 'block';
                } else {
                    // If another option is selected, hide the text input field and clear its value
                    otherReligionInput.style.display = 'none';
                    otherReligionInput.value = '';
                }
            });
        </script>
        {{-- end of script --}}

    </div>

    <div class="flex flex-col space-y-5">
        <div class="w-full flex space-x-4 items-start">
            <div class="w-full flex flex-col space-y-1">
                <label class="text-xs ">CITIZENSHIP</label>
                <select name="citizenship" id="citizenship" class="w-full text-sm bg-inherit border border-gray-300 rounded">
                    <option value="" selected disabled>choose a citizenship</option>
                    <option value="Other" >Other (Specify Below)</option>
                </select>
                <input type="text" name="otherCitizenship" id="otherCitizenship" placeholder="Specify Citizenship" class="w-full text-sm bg-inherit border border-gray-300 rounded" style="display: none;"
                value="{{ old('citizenship') ?? ($deceased->citizenship ?? '') }}">
                @error('citizenship')
                    <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                @enderror
            </div>

            {{-- script for Cause of Death drop down list other --}}
            <script>
                // Get references to the select and text input elements
                const citizenshipSelect = document.getElementById('citizenship');
                const otherCitizenshipInput = document.getElementById('otherCitizenship');

                // Listen for changes to the select input
                citizenshipSelect.addEventListener('change', function () {
                    if (this.value === 'Other') {
                        // If "Other" is selected, show the text input field
                        otherCitizenshipInput.style.display = 'block';
                    } else {
                        // If another option is selected, hide the text input field and clear its value
                        otherCitizenshipInput.style.display = 'none';
                        otherCitizenshipInput.value = '';
                    }
                });
            </script>
            {{-- end of script --}}

            <div class="w-full flex flex-col space-y-1">
                <label class="text-xs ">CIVIL STATUS</label>
                <select name="civilStatus" id="" class="w-full text-sm bg-inherit border border-gray-300 rounded "
                value="{{ old('civilStatus') ?? ($deceased->civilStatus ?? '') }}">
                    <option value="" selected disabled>choose a civil status</option>
                    <option value="Married">Married</option>
                    <option value="Single">Single</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                </select>
                @error('civilStatus')
                    <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full flex flex-col space-y-1">
                <label class="text-xs ">SEX</label>
                <select name="sex" id="" class="w-full text-sm bg-inherit border border-gray-300 rounded "
                value="{{ old('sex') ?? ($deceased->sex ?? '') }}">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('sex')
                    <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="w-full flex space-x-4 items-start">
        <div class="w-full flex flex-col space-y-1">
            <label class="text-xs ">NAME OF FATHER</label>
            <input type="text" name="fathersName" placeholder="Name of father" class="w-full text-sm bg-inherit border border-gray-300 rounded "
            value="{{ old('fathersName') ?? ($deceased->fathersName ?? '') }}">
            @error('fathersName')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full flex flex-col space-y-1">
            <label class="text-xs ">MAIDEN NAME OF MOTHER</label>
            <input type="text" name="mothersMaidenName" placeholder="Maiden name of mother" class="w-full text-sm bg-inherit border border-gray-300 rounded "
            value="{{ old('mothersMaidenName') ?? ($deceased->mothersMaidenName ?? '') }}">
            @error('mothersMaidenName')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
