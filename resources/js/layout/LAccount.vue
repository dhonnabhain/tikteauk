<template>
  <!-- Profile dropdown -->
  <div class="ml-3 relative">
    <div>
      <button
        v-click-outside="hide"
        class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid"
        id="user-menu"
        aria-label="User menu"
        aria-haspopup="true"
        @click="isOpen = !isOpen"
      >
        <!-- <img
          v-if="hasAvatar"
          class="h-8 w-8 rounded-full"
          src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
          alt=""
        />

        <span
          v-else
          class="inline-block h-8 w-8 rounded-full overflow-hidden bg-gray-100"
        >
          <svg
            class="h-full w-full text-gray-300"
            fill="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"
            />
          </svg>
        </span> -->
        <LAvatar :user="user" />
      </button>
    </div>

    <transition
      enter-active-class="transition ease-out duration-100"
      enter-class="transform opacity-0 scale-95"
      enter-to-class="transform opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-class="transform opacity-100 scale-100"
      leave-to-class="transform opacity-0 scale-95"
    >
      <div
        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg"
        v-if="isOpen"
      >
        <div
          class="py-1 rounded-md bg-white shadow-xs"
          role="menu"
          aria-orientation="vertical"
          aria-labelledby="user-menu"
        >
          <a
            href="/account"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
            role="menuitem"
            >Mon compte</a
          >

          <a
            href="/logout"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
            role="menuitem"
            >Déconnexion</a
          >
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import ClickOutside from 'vue-click-outside'
import LAvatar from './LAvatar'

export default {
  components: { LAvatar },
  directives: {
    ClickOutside,
  },
  props: {
    user: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      isOpen: false,
    }
  },
  methods: {
    hide() {
      this.isOpen = false
    },
  },
  mounted() {
    this.popupItem = this.$el
  },
}
</script>