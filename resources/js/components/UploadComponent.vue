<template>
  <div>
    <form action="">
      <file-pond
        name="file_"
        ref="pond"
        label-idle="Drop files here..."
        v-bind:allow-multiple="true"
        :server="server"
        v-bind:files="myFiles"
        max-file-size="50MB"
      
      />
    </form>
  </div>
</template>

<script>
import vueFilePond from "vue-filepond";
// Import FilePond styles
import "filepond/dist/filepond.min.css";

const FilePond = vueFilePond();
export default {
  props: ["token"],
  data: function () {
    return { myFiles: null };
  },
  methods: {
    handleFilePondUpdateFile(files) {
      this.myFiles = files.map((files) => files.file);
    },
    handleFilePondInit: function () {
      console.log("FilePond has initialized");
    },
  },
  components: {
    FilePond,
  },

  computed: {
    server() {
      return {
        url: "/file",
        process: {
          headers: {
            "X-CSRF-TOKEN": this.token,
          },
        },
        revert: {
          headers: {
            "X-CSRF-TOKEN": this.token,
          },
        }
        
      };
    },
  },
};
</script>

<style>

.filepond--root{
    background-color: #fbfdff;
    border: 1px dashed #c0ccda;
    border-radius: 6px;
    padding: 60px;
    text-align: center;
    margin-bottom: 15px;
    cursor: pointer;
}

.filepond--panel-root {
    background-color: #fbfdff;
}
</style>