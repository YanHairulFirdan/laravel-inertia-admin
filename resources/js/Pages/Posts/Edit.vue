<template>
  <base-layout>
    <div class="card">
      <nav class="nav">
        <Link
          v-for="language in post.languages"
          :key="language.id"
          :href="isLanguageSelected(language.locale) ? '#' : $route('posts.edit', { post, locale: language.locale })"
          class="btn"
          :class="{
            'btn-disabled': isLanguageSelected(language.locale),
            'btn-primary': !isLanguageSelected(language.locale),
          }"
        >
          {{ language.name }}
        </Link>
        <button v-if="canAddLanguage"
          class="btn btn-info"
          data-toggle="modal"
          data-target="#addLanguage"
        >
          Add translation
        </button>
      </nav>
      <div class="card-header">Edit Post</div>
      <div class="card-body">
        <form @submit.prevent="submit">
          <BootstrapInput
            labelText="Title"
            :modelValue="post.title"
            v-model="post.title"
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
              v-model="post.content"
            ></textarea>
            <ValidationError :message="props.errors.content" />
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          <input type="checkbox" name="" id="" v-model="isLoading">
        </form>
      </div>
    </div>
  </base-layout>
  <AddLanguage
    :languageIds="selectedLanguageIds"
    :postId="post.id"
  ></AddLanguage>
</template>

<script setup lang="ts">
import BootstrapInput from "@/Components/UI/Form/Inputs/BootstrapInput.vue";
import ValidationError from "@/Components/UI/Form/ValidationError.vue";
import { Inertia, PageProps, RequestPayload } from "@inertiajs/inertia";
import { useForm, usePage, Link } from "@inertiajs/inertia-vue3";
import {
  computed,
  nextTick,
  onMounted,
  Prop,
  reactive,
  ref,
  watch,
} from "@vue/runtime-core";
import AddLanguage from "./Modal/AddLanguage.vue";

interface Language {
  id: number;
  name: string;
}
interface Post {
  id?: number;
  title: string;
  content: string;
  selected_language: string;
  languages: Language[];
}

interface Props extends PageProps {
  post: Post;
}

const props = computed<Props>(() => usePage<Props>().props.value);
const post = computed<Post>(() => props.value.post.data);
const selectedLanguageIds = computed(() =>
  post.value.languages.map((language) => language.id));
const isLoaded = ref(false);

const isLanguageSelected = (locale) => post.value.selected_language === locale

const canAddLanguage = computed(() => post.value.languages.length < 2)

const submit = () => {
  isLoaded.value = true;
  Inertia.put(route("posts.update", { post: post.value.id }), post.value, {
    onSuccess: () => $("#editPost").modal("hide"),
  });
};
</script>