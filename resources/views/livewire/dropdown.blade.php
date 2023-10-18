<div>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-gray-200 dark:bg-slate-800 p-6 rounded-lg shadow-md w-1/2 mt-5">
    <form class="border-b-2 pb-10">
        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="name">
                Product Name
            </label>
            <input wire:model="name" type="text" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />
        </div>

        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="category">
                Category
            </label>
            <select wire:model.live="category" name="category"
                    class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                <option value="">Select Category</option>
                @foreach ($categories as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="subcategory">
                Subcategory
            </label>
            <select name="subcategory" wire:model="subcategory"
                    class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                    <option value="">Select Subcategory</option>
                @foreach ($subcategories as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center mt-4">
            <button type="submit"
    class="inline-flex items-center px-4 py-2 bg-gray-800  dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-green-600 active:bg-gray-900  dark:active:bg-green-700 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
    Add Product
</button>
        </div>
    </form>
        </div>
    </div>
</div>