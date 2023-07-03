<x-layout>
  <!-- Content -->
  <div class="mt-[53px] p-5 lg:ml-[256px]">
    <h1 class="font-poppins text-2xl font-semibold">Tugas</h1>
    <div class="mt-4">
      {{-- <a href="{{ route('tugas.create') }}"
        class="inline-block rounded-md bg-blue-500 px-4 py-2 text-sm text-white">Create New Tugas</a> --}}
    </div>
    <div class="shadow-dark-custom mt-4 rounded-md bg-white px-5 py-4">
      <div x-data="{ selected: 'All' }">
        <div class="overflow-x-auto">

          @if (session('successStore'))
            <div class="mb-4 rounded-md bg-green-500 px-6 py-2 text-sm text-white">
              <p>{{ session('successStore') }}</p>
            </div>
          @endif
          @if (session('successDestroy'))
            <div class="mb-4 rounded-md bg-green-500 px-6 py-2 text-sm text-white">
              <p>{{ session('successDestroy') }}</p>
            </div>
          @endif

          <table class="mt-6 w-full min-w-max overflow-x-auto"
            id="reservation">
            <thead class="font-poppins font-semibold">
              <tr>
                <td class="px-2">No.</td>
                <td class="w-40 px-2">Project</td>
                <td class="w-40 px-2">Title</td>
                <td class="w-40 px-2">Description</td>
                <td class="px-2">Due Date</td>
                <td class="px-2">Action</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($tugass as $tugas)
                <tr class="border-y border-black/20 text-sm">
                  <td class="px-2 py-3">{{ $loop->iteration }}</td>
                  <td class="px-2">{{ $tugas->proyek->name }}</td>
                  <td class="px-2">{{ $tugas->title }}</td>
                  <td class="px-2">{{ $tugas->description }}</td>
                  <td class="px-2">{{ $tugas->due_date }}</td>
                  <td class="px-2">
                    <a href="{{ route('tugas.show', ['tuga' => $tugas->id]) }}"
                      class="hover:bg-blue-950 cursor-pointer rounded-full bg-blue-500 px-4 py-1 text-[12px] text-white transition">
                      Details
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <script>
            $(document).ready(function() {
              $('#reservation').DataTable();
            });
          </script>
        </div>
      </div>
    </div>
  </div>
</x-layout>
