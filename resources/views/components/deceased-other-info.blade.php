<div class="flex flex-col space-y-5">
    <h2 class=" text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-100">Death Information</h2>
    <div class="w-full flex flex-col">
        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" >Cause of Death</label>
        <select name="death_cause" id="causeOfDeath"
        class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected disabled>Select a Cause of Death</option>
                @foreach ($causes as $cause)
                <option value="{{ $cause->name }}" {{ (old('death_cause') ?? ($deceased->death_cause ?? '')) == $cause->name ? 'selected' : '' }}>{{ $cause->name }}</option>
                @endforeach
            <option value="Other" >Other (Specify Below)</option>
        </select>

        <input id="otherCOD" name="other_death_cause" placeholder="Specify Cause of Death"
        class="mt-2 focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        style="display: none;"
        value="{{ old('other_death_cause') ?? ($deceased->death_cause ?? '') }}">
        @error('death_cause')
            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
        @enderror
    </div>

    <script>
        const causeOfDeathSelect = document.getElementById('causeOfDeath');
        const otherCODInput = document.getElementById('otherCOD');

        causeOfDeathSelect.addEventListener('change', function () {
            if (this.value === 'Other') {
                otherCODInput.style.display = 'block';
            } else {
                otherCODInput.style.display = 'none';
                otherCODInput.value = '';
            }
        });
    </script>

    <div class="w-full flex flex-col space-y-1">
        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" >Place of Death</label>
        <input type="text" name="death_place" placeholder="Place of death"
        class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        value="{{ old('death_place') ?? ($deceased->deathDetail->death_place ?? '') }}">
        @error('death_place')
            <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="w-full flex space-x-4 items-start">
        <div class="w-full flex flex-col space-y-1">
            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" >Time of Death</label>
            <input type="time" name="death_time" placeholder="Time of death"
            class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('death_time') ?? ($deceased->deathDetail->death_time ?? '') }}">
            @error('death_time')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full flex flex-col space-y-1">
            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" >Date of Death</label>
            <input type="date" name="death_date" placeholder="Date of death"
            class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('death_date') ?? ($deceased->deathDetail->death_date ?? '') }}">
            @error('death_date')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>
