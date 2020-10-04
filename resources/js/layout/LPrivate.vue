<template>
  <div>
    <nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <a href="/home" class="flex-shrink-0">
              <img
                class="h-8 w-8"
                src="https://tailwindui.com/img/logos/workflow-mark-on-dark.svg"
                alt="Workflow logo"
              />
            </a>
            <!-- <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <a
                  href="#"
                  class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700"
                  >Mur</a
                >

                <a
                  href="#"
                  class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                  >Team</a
                >
              </div>
            </div> -->
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <LAccount :user="user" />
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <button
              class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white"
              @click="isMobileNavbarOpen = !isMobileNavbarOpen"
            >
              <svg
                :class="{
                  hidden: isMobileNavbarOpen,
                  block: !isMobileNavbarOpen,
                }"
                class="h-6 w-6"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
              <svg
                :class="{
                  block: isMobileNavbarOpen,
                  hidden: !isMobileNavbarOpen,
                }"
                class="h-6 w-6"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <LMobileNavbar :user="user" :is-open="isMobileNavbarOpen" />
    </nav>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="px-4 py-8 sm:px-0">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
import LAccount from './LAccount'
import LMobileNavbar from './LMobileNavbar'

export default {
  components: { LAccount, LMobileNavbar },
  props: {
    user: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      isMobileNavbarOpen: false,
    }
  },
}
</script>