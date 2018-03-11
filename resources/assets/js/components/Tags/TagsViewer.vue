<template>
  <div class="tags-viewer">
    <ul class="list-reset">
      <li v-if="tag.assigned" class="inline-block mr-2 rounded rounded-full bg-grey-light px-3 py-2 lowercase text-xs" v-for="tag in tags" :key="tag.name">
        #{{tag.name}}
        <input type="hidden" name="tags[]" :value="tag.id">
        <button type="button" @click="removeTag(tag)">
          x
        </button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    tags: {
      type: Array,
      default: []
    }
  },
  methods: {
    removeTag (tag) {
      tag.assigned = false;
      this.$emit('removed', tag);
    }
  }
};
</script>
