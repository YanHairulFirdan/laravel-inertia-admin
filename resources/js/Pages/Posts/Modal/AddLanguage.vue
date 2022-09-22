<template>
  <Modal id="addLanguage" title="Add Language" @save="setLanguage">
    <form>
      <div class="form group">
        <label for="">Select Language</label>
        <select name="" class="form-control" id="" v-model="form.language_id">
          <option v-for="language in languages.list"
            :value="language.id"
            :key="language.id"
          >
            {{ language.name }}
          </option>
        </select>
      </div>
    </form>
  </Modal>
</template>

<script setup lang="ts">
import Modal from '@/Components/Modal.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { reactive, ref } from '@vue/reactivity';
import { onMounted } from '@vue/runtime-core';

const props = defineProps({
  languageIds: [],
  postId: Number,
})

const languages = reactive({
  list: [],
});
const form = useForm({
  language_id: null,
});

onMounted(() => {
  axios.get(route(
    'posts.language.index', 
    { 
      post: props.postId, 
      language_ids: props.languageIds 
    })
  ).then(response => response.data)
  .then(response => {
    console.log(response);
    
    languages.list = response
  })
  
  console.log(languages.list);
  
})

function setLanguage() {
  form.post(route('posts.language.store', { post: props.postId }),{
    onSuccess: () => $('#addLanguage').modal('hide'),
  })
}

</script>