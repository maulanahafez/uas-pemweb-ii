<x-layout>
  {{-- @dump($roomTypes) --}}
  <div class="mt-[53px] p-5 lg:ml-[256px]">
    <div class="shadow-dark-custom grid grid-cols-1 gap-y-4 rounded-md bg-white px-5 py-6 lg:order-first">
      <h1 class="font-poppins border-b border-black/20 pb-1 text-3xl">
        Create new Department
      </h1>
      @if ($errors->any())
        <div class="grid grid-cols-1 gap-y-1 rounded-md bg-red-500 px-6 py-2 text-sm text-white">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif
      <form method="post"
        action="{{ route('department.store') }}"
        class="grid max-w-lg grid-cols-1 gap-y-4">
        @csrf
        <div>
          <label for="name"
            class="block font-semibold">
            Department Name
          </label>
          <input type="text"
            name="name"
            id="name"
            placeholder="Project Name"
            class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500" />
        </div>
        <div class="flex justify-end gap-x-3">
          <button type="submit"
            class="inline-block cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-white">
            <span>Create</span>
          </button>
        </div>
      </form>
    </div>
    <script>
      document.addEventListener("alpine:init", () => {});
    </script>
  </div>

</x-layout>
