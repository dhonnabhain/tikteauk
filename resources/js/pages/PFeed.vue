<template>
  <div class="py-10 bg-gray-400">
    <main>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <template v-for="idx in 100">
          <div class="bg-white overflow-hidden shadow mb-8 sm:rounded-lg md:w-2/3 md:mx-auto">
            <div class="px-4 py-5 sm:p-6">
              <h1 class="font-medium text-5xl text-gray-800">Tikteauk</h1>
              <p class="mt-8 text-gray-600 text-lg">Time to build your app 💪</p>
            </div>
          </div>
        </template>
        <!-- /End replace -->
      </div>
    </main>
  </div>
</template>

<script>
export default {
  name: 'PLanding',
}
</script>