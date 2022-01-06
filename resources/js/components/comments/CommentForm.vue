<template>
  <div>
    <div class="form-group my-2">
      <textarea
        v-model="content"
        class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-transparent bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:border-blue-600 focus:outline-none"
        :class="{ 'border-red-500': errors['content'] }"
        rows="4"
        :placeholder="placeholder"
      />

      <span v-if="errors['content']" class="invalid-feedback">{{
        errors["content"][0]
      }}</span>
    </div>

    <div class="form-group my-2" v-if="!isAuth">
      <input
        v-model="author_name"
        class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-transparent bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:border-blue-600 focus:outline-none"
        :class="{ 'border-red-500': errors['content'] }"
        placeholder="Your Name"
      />

      <span v-if="errors['content']" class="invalid-feedback">{{
        errors["content"][0]
      }}</span>
    </div>

    <div class="flex justify-end py-4">
      <button
        class="flex items-center px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500"
        :disabled="isDisabled"
        @click="sendComment"
      >
        <svg
          viewBox="0 0 32.707 32.707"
          class="text-white fill-current w-4 h-4 mr-2 animate-spin"
          v-if="isLoading"
        >
          <path
            d="m21.477 4.511c0 2.487-2.021 4.508-4.508 4.508-2.49 0-4.509-2.021-4.509-4.508 0-2.49 2.02-4.511 4.509-4.511s4.508 2.021 4.508 4.511zm-4.505 23.169c-1.386-2e-3 -2.513 1.119-2.517 2.508-3e-3 1.391 1.117 2.518 2.505 2.52 1.39 4e-3 2.517-1.117 2.519-2.506 5e-3 -1.391-1.118-2.518-2.507-2.522zm14.479-10.328c0-0.906-0.734-1.641-1.641-1.641-0.908 0-1.644 0.732-1.644 1.641 0 0.904 0.733 1.643 1.644 1.643 0.906-1e-3 1.641-0.737 1.641-1.643zm-24.456 0c0-1.585-1.284-2.87-2.87-2.87s-2.869 1.285-2.869 2.87c0 1.584 1.283 2.869 2.869 2.869s2.87-1.285 2.87-2.869zm19.967-9.998c-0.504-0.506-1.319-0.504-1.825 0-0.505 0.506-0.505 1.328 0 1.832 0.506 0.506 1.321 0.506 1.825 0s0.504-1.326 0-1.832zm-16.989 17c-1.152-1.146-3.019-1.146-4.17-2e-3 -1.151 1.146-1.152 3.012 0 4.16s3.018 1.15 4.168 0c1.154-1.145 1.154-3.01 2e-3 -4.158zm17.278 3.277c0.658-0.662 0.658-1.734-2e-3 -2.396-0.658-0.658-1.726-0.658-2.385 4e-3 -0.658 0.66-0.658 1.732 0 2.395 0.661 0.659 1.727 0.659 2.387-3e-3zm-17.204-17.204c1.188-1.189 1.188-3.119 0-4.311-1.188-1.189-3.115-1.189-4.305 0-1.188 1.189-1.188 3.119 1e-3 4.311s3.115 1.191 4.304 0z"
          />
        </svg>
        {{ button }}
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: {
    postId: {
      type: Number,
      required: true,
    },

    commentId: {
      type: Number,
    },

    placeholder: {
      type: String,
      default: null,
    },

    button: {
      type: String,
      required: true,
    },

    isAuth: {
      type: Boolean,
    },

    isReply: {
      type: Boolean,
    },
  },

  data() {
    return {
      content: "",
      author_name: "",
      isLoading: false,
      errors: [],
    };
  },

  computed: {
    isDisabled() {
      return this.isLoading || this.content.length === 0;
    },
  },

  methods: {
    sendComment() {
      this.isLoading = true;

      if (!this.isReply) {
        axios
          .post(`/api/v1/posts/${this.postId}/comments`, {
            content: this.content,
            author_name: this.author_name,
          })
          .then(({ data }) => {
            Event.$emit("added", data.data);

            this.content = "";
            this.isLoading = false;
            this.errors = [];
          })
          .catch((error) => {
            this.isLoading = false;
            this.errors = error.response.data.errors;
          });
      } else {
        axios
          .put(this.route("posts.comments.update", [this.postId, this.commentId]), {
            content: this.content,
            author_name: this.author_name,
          })
          .then(({ data }) => {
            Event.$emit("added-reply." + this.commentId, data.data);

            this.content = "";
            this.isLoading = false;
            this.errors = [];
          })
          .catch((error) => {
            this.isLoading = false;
            this.errors = error.response.data.errors;
          });
      }
    },
  },
};
</script>
