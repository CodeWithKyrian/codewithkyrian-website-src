<template>
  <div class="p-6 w-full border-b border-gray-200">
    <div class="flex justify-between">
      <h5 class="text-gray-700 text-md leading-tight font-bold">
        <a :href="comment.author_url">{{ comment.author_name }}</a>
      </h5>
      <button v-if="comment.can_delete" class="close text-red-600" @click="deleteComment">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <p class="text-gray-500 text-xs mb-4">{{ comment.humanized_posted_at }}</p>
    <p class="mb-4 prose">{{ comment.content }}</p>

    <button @click="isReplying = true" class="text-blue-600 text-base">Reply</button>

    <comment-reply
      v-for="comment in comment.replies"
      :key="comment.id"
      :comment="comment"
      :data-confirm="dataConfirm"
      @deleted="removeComment(comment)"
    />

    <div v-if="isReplying">
      <div class="my-4 flex">
        <h2 class="text-2xl font-bold text-gray-700">
          Reply to {{ comment.author_name }}
        </h2>
        <button @click="isReplying = false" class="ml-4 text-blue-600 text-base">
          Close
        </button>
      </div>

      <comment-form
        :post-id="comment.post_id"
        :comment-id="comment.id"
        :is-auth="isAuth"
        :is-reply="true"
        placeholder="Enter Reply"
        button="Reply"
      >
      </comment-form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CommentReply from "./CommentReply";
import CommentForm from "./CommentForm";

export default {
  components: { CommentReply, CommentForm },
  data() {
    return {
      isReplying: false,
    };
  },
  props: {
    comment: {
      type: Object,
      required: true,
    },

    dataConfirm: {
      type: String,
      required: true,
    },

    isAuth: {
      type: Boolean,
    },
  },
  mounted() {
    Event.$on("added-reply." + this.comment.id, (reply) => this.addReply(reply));
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
    addReply(reply) {
      this.comment.replies.push(reply);
      this.isReplying = false;
    },
  },
};
</script>
