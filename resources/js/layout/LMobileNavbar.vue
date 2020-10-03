<template>
  <div :class="{ block: isOpen, hidden: !isOpen }" class="md:hidden">
    <!-- <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <a
        href="#"
        class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700"
        >Mur</a
      >

      <a
        href="#"
        class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
        >Abo</a
      >
    </div> -->
    <div class="pt-4 pb-3 border-t border-gray-700">
      <div class="flex items-center px-5 space-x-3">
        <div class="flex-shrink-0">
          <!-- <img
            class="h-10 w-10 rounded-full"
            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt=""
          /> -->
          <LAvatar :user="user" />
        </div>
        <div class="space-y-1">
          <div class="text-base font-medium leading-none text-white">
            {{ user.username }}
          </div>
          <div class="text-sm font-medium leading-none text-gray-400">
            {{ user.email }}
          </div>
        </div>
      </div>
      <div class="mt-3 px-2 space-y-1">
        <a
          href="/profil"
          class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
          >Mon compte</a
        >

        <a
          href="/logout"
          class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
          >Déconnexion</a
        >
      </div>
    </div>
  </div>
</template>

<script>
import LAvatar from './LAvatar'

export default {
  components: { LAvatar },
  props: {
    user: {
      type: Object,
      required: true,
    },
    isOpen: {
      type: Boolean,
      default: false,
    },
  },
}
</script>