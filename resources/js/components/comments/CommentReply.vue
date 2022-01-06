<template>
  <div class="px-4 mt-5 ml-4 w-full">
    <div class="flex justify-between">
      <h5 class="text-gray-700 text-md leading-tight font-bold">
        <a :href="comment.author_url">{{ comment.author_name }}</a>
      </h5>
      <button
        v-if="comment.can_delete"
        class="close text-red-600"
        @click="deleteComment"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <p class="text-gray-500 text-xs mb-4">{{ comment.humanized_posted_at }}</p>
    <p class="prose">{{ comment.content }}</p>

    <!-- <a href="#" class="text-blue-600 text-base">Reply</a> -->

  </div>
</template>

<script>
import axios from "axios";


export default {
  
  props: {
    comment: {
      type: Object,
      required: true,
    },

    dataConfirm: {
      type: String,
      required: true,
    },
  },

  methods: {
    deleteComment() {
      if (confirm(this.dataConfirm)) {
        axios
          .delete(`/api/v1/comments/${this.comment.id}`)
          .then(() => {
            this.$emit("deleted", this);
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
};
</script>
