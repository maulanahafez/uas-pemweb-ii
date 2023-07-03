<x-layout>
  <div class="mt-[53px] p-5 lg:ml-[256px]">
    <div class="shadow-dark-custom grid grid-cols-1 gap-y-4 rounded-md bg-white px-5 py-6 lg:order-first">
      <h1 class="font-poppins border-b border-black/20 pb-1 text-3xl">
        Proyek Details
      </h1>
      @if (session('successUpdate'))
        <div class="rounded-sm bg-green-500 px-3 py-2 text-sm text-white">
          <p>{{ session('successUpdate') }}</p>
        </div>
      @endif
      <form method="post"
        action="{{ route('proyek.update', ['proyek' => $proyek->id]) }}"
        class="max-w-lg"
        x-data="{ edit: false }">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 gap-y-4"
          :class="edit ? null : 'pointer-events-none'">
          <div class="">
            <label for="id"
              class="block font-semibold">
              ID
            </label>
            <input type="text"
              name="id"
              id="id"
              disabled
              value="{{ $proyek->id }}"
              placeholder="ID"
              class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500" />
          </div>
          <div class="">
            <label for="name"
              class="block font-semibold">
              Name
            </label>
            <input type="text"
              name="name"
              id="name"
              value="{{ $proyek->name }}"
              placeholder="Name"
              class="mt-1 w-full min-w-fit max-w-full rounded-sm border border-black/20 px-4 py-1 focus:outline-sky-500" />
          </div>
        </div>
        <div class="mt-5 flex justify-end gap-x-3">
          <span class="inline-block cursor-pointer rounded-sm bg-green-500 px-4 py-1 text-white"
            x-show="!edit"
            x-on:click="edit = true">
            Edit
          </span>
          <span class="inline-block cursor-pointer rounded-sm bg-gray-500 px-4 py-1 text-white"
            x-show="edit"
            x-on:click="location.reload()">
            Cancel
          </span>
          <template x-if="edit">
            <button type="submit"
              class="inline-block cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-white">
              <span>Save</span>
            </button>
          </template>
        </div>
      </form>
      <form action="{{ route('proyek.destroy', ['proyek' => $proyek->id]) }}"
        method="post">
        @csrf
        @method('delete')
        <button type="submit"
          class="inline-block cursor-pointer rounded-sm bg-red-500 px-4 py-1 text-white"
          onclick="confirm('Are you sure want to delete this room?')">
          Delete
        </button>
      </form>
    </div>
  </div>

</x-layout>
