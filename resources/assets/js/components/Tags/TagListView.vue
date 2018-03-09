<template>
  <li @click.prevent="toggleTag(tag)" class="p-3 cursor-pointer hover:bg-grey-lighter">
    <i class="far fa-check-square text-primary mr-2 inline-block" v-if="active"></i>
    <button type="button">
      {{tag.name}}
    </button>
  </li>
</template>

<script>
export default {
  props: {
    tag: {
      type: Object,
      default: {}
    }
  },
  data () {
    return {
      active: false,
    };
  },
  methods: {
    toggleTag (tag) {
      this.active = !this.active;
      tag.assigned = !tag.assigned;
      this.$emit('toggled', tag);
    }
  }
};
</script>
