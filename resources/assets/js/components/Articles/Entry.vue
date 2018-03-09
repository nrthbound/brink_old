<template>
  <div ref="editor" style="height: 350px;"></div>
</template>

<script>
export default {
  data () {
    return {
      entry: '',
      config: {
        modules: {
          toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            ['image','video', 'code-block']
          ]
        },
        theme: 'snow'
      },
      quill: ''
    };
  },
  mounted () {
    this.quill = new Quill(this.$refs.editor, this.config);
    const vm = this;
    this.quill.on('text-change', function(delta, oldDelta, source) {
      console.log(JSON.stringify(vm.quill.getContents()));
    });
  }
};
</script>
