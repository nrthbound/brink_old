<template>
  <div class="tags-viewer">
    <ul class="list-reset">
      <li class="inline-block mr-2 rounded rounded-full bg-grey-light px-3 py-2 lowercase text-xs" v-for="tag in tags" :key="tag.name">
        #{{tag.name}}
        <input type="hidden" name="tags[]" :value="tag.id">
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
  }
};
</script>
