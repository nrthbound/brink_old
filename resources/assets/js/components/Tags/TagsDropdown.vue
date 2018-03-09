<template>
  <div class="tag-dropdown border-grey relative" v-click-outside="hide">
    <i class="fas fa-search absolute pin-"></i>
    <input placeholder="Search Tags" @focus="isVisible" class=" search w-full bg-white border border-grey-lightish p-3 rounded" type="text" v-model="search" />
    <ul class="list-reset border absolute w-full" v-show="visible">
      <tag-list-item @toggled="emitTag" v-for="tag in filtered" :key="tag.name" :tag="tag"></tag-list-item>
    </ul>
  </div>
</template>

<script>
import ClickOutside from 'vue-click-outside';

export default {
  computed: {
    filtered () {
      const data = this.tags;
        return data.filter((obj) => {
          return obj['name'] ? obj['name'].toLowerCase().indexOf(this.search.toLowerCase()) >= 0 : false;
      });
    }
  },
  directives: {
    ClickOutside
  },
  created () {
    axios.get('/tags').then(response => {
      this.tags = response.data;
    });
  },
  data () {
    return {
      assignedTags: [],
      search: '',
      tags: [],
      visible: false
    };
  },
  methods: {
    emitTag (tag) {
      this.$emit('toggled', tag);
    },
    isVisible () {
      this.visible = true;
    },
    hide () {
      this.visible = false;
    }
  }
};
</script>

<style lang="scss" scoped>
  .search {
    text-indent: 20px;
  }
  .fa-search {
    top: 13px;
    left: 10px;
    color: #888
  }
</style>