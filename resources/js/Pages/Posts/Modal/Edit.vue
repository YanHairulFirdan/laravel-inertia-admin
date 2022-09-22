<template>
  <Modal 
    id="editPost" 
    title="Edit post" 
    @save="submit"
    @modal-show="loadPost"
  >
    <form @submit.prevent v-show="isLoaded">
      <BootstrapInput
        labelText="Title"
        :modelValue="anotherPost.title"
        v-model="anotherPost.title"
        :errorMessage="props.errors.title"
      >
      </BootstrapInput>
      <div class="form-group">
        <textarea
          class="form-control"
          name=""
          id=""
          cols="30"
          rows="10"
          v-model="anotherPost.content"
        ></textarea>
        <ValidationError :message="props.errors.content"/>
      </div>
    </form>
  </Modal>
</template>

<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import BootstrapInput from "@/Components/UI/Form/Inputs/BootstrapInput.vue";
import ValidationError from "@/Components/UI/Form/ValidationError.vue";
import { Inertia, PageProps, RequestPayload } from "@inertiajs/inertia";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed, nextTick, onMounted, reactive, ref, watch } from "@vue/runtime-core";

interface Post {
  id?: number;
  title: string;
  content: string;
}


const props = computed<PageProps>(() => usePage<PageProps>().props.value);
// const post = computed(() => ({ ...props.post }));

const isLoaded = ref(false)

let anotherPost = reactive({
  id: null,
  title: '',
  content: '',
})
async function loadPost(button: HTMLButtonElement) {
  const { data: response } = await axios.get(route('posts.show', {post: button.dataset.id}))
  Object.keys(response.data).forEach(key => {
    anotherPost[key] = response.data[key]
  })
  // anotherPost = reactive(response.data)
  isLoaded.value = true;
  // console.log('mouted');
  // nextTick()
}

const submit = () => {
  Inertia.put(
    route("posts.update", { post: anotherPost.id }), 
    anotherPost, {
      onSuccess: () => $('#editPost').modal('hide')
    }
  );
};
</script>