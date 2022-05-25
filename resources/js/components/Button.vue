<template>
  <button :type="nativeType" :disabled="loading" :class="{
    [`button--${type}`]: true,
    'button-block': block,
    'button-lg': large,
    'button-loading': loading
  }" class="button"
  >
    <slot />
  </button>
</template>

<script>
export default {
  name: 'AButton',

  props: {
    type: {
      type: String,
      default: 'light'
    },

    nativeType: {
      type: String,
      default: 'submit'
    },

    loading: {
      type: Boolean,
      default: false
    },

    block: {
      type: Boolean,
      default: false
    },

    large: {
      type: Boolean,
      default: false
    }
  }
}
</script>
