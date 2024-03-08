<div class="flex flex-col space-y-4">
    <h2 class=" text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-100">Personal Information</h2>
    <div class="w-full flex space-x-4 items-start">
        <div class="w-full flex flex-col ">
            <label for="first_name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">First name</label>
            <input type="text" name="first_name" placeholder="First name" id="first_name" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required value="{{ old('first_name') ?? ($deceased->first_name ?? '') }}" />
            @error('first_name')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>


        <div class="w-full flex flex-col">
            <label for="first_name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Middle name</label>
            <input type="text" name="middle_name" placeholder="Middle name" id="middle_name" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required value="{{ old('middle_name') ?? ($deceased->middle_name ?? '') }}" />
            @error('middle_name')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full flex flex-col">
            <label for="first_name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
            <input type="text" name="last_lame" placeholder="Last name" id="last_lame" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required  value="{{ old('last_lame') ?? ($deceased->last_lame ?? '') }}" />
            @error('last_lame')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="w-full flex space-x-4 items-start mb-4">
        <div class="w-full flex flex-col">
            <label for="dobInput" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
            <input type="date" name="dob" placeholder="Date of Birth" id="dobInput" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required value="{{ old('dob') ?? ($deceased->dob ?? '') }}" />
            @error('dob')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full flex flex-col">
            <label for="ageInput" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Age</label>
            <input type="text" name="age" placeholder="Age" id="ageInput" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required  value="{{ old('age') ?? ($deceased->age ?? '') }}" />
            @error('age')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full flex flex-col">
            <label for="sex" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Sex</label>
            <select name="sex" placeholder="Sex" id="sex" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
                <option selected>Sex</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('sex')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full flex flex-col">
            <label for="height" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Height</label>
            <input type="text" name="height" placeholder="Height" id="height" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required  value="{{ old('height') ?? ($deceased->height ?? '') }}" />
            @error('height')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full flex flex-col">
            <label for="weight" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Weight</label>
            <input type="text"  name="weight" placeholder="Weight" id="weight" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required  value="{{ old('weight') ?? ($deceased->weight ?? '') }}" />
            @error('weight')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <h2 class="pt-4 text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-100">Dceased's Address</h2>

    <div class="w-full flex space-x-4 items-start">

        <div class="w-full flex flex-col">
            <label for="lot_block" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Lot & Block</label>
            <input type="text" name="block" placeholder="Lot & Block" id="lot_block" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required  value="{{ old('lot_block') ?? ($deceased->address->lot_block ?? '') }}" />
            @error('lot_block')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full flex flex-col">
            <label for="street" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Street</label>
            <input type="text" name="street" placeholder="Street" id="street" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required  value="{{ old('street') ?? ($deceased->address->street ?? '') }}" />
            @error('street')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full flex flex-col">
            <label for="brgy" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Baranggay</label>
            <input type="text" name="brgy" placeholder="Baranggay" id="brgy" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required  value="{{ old('brgy') ?? ($deceased->address->brgy ?? '') }}" />
            @error('brgy')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="w-full flex space-x-4 items-start">
        <div class="w-full flex flex-col">
            <label for="city" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">City/Municipality</label>
            <input type="text" name="city" placeholder="City" id="city" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required  value="{{ old('city') ?? ($deceased->adress->city ?? '') }}" />
            @error('city')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full flex flex-col">
            <label for="province" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Province</label>
            <input type="text" name="province" placeholder="Province" id="province" class="focus:bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required  value="{{ old('province') ?? ($deceased->address->province ?? '') }}" />
            @error('province')
                <span class="text-xs text-red-500 pl-2">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<script>
    const dobInput = document.getElementById('dobInput');
    const ageInput = document.getElementById('ageInput');

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
