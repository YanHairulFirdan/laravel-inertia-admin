<template>
  <Head title="Data Penjualan" />
  <base-layout>
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
          <button
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#addData"
          >
            Tambah data
          </button>
        </div>
        <div class="table-responsive">
          <table class="table table-stripped">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(post, index) in posts" :key="post.id">
                <td>{{ index + props.posts.meta.from }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.content }}</td>
                <td>
                  <Link
                    class="btn btn-warning text-white"
                    :href="$route('posts.edit', { post })"
                  >
                    Edit
                </Link>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end">
        <Pagination :links="paginatioLinks"></Pagination>
      </div>
    </div>
  </base-layout>
  <Edit :postId="postId"></Edit>
</template>

<script setup lang="ts">
import { Head, useForm, Link } from "@inertiajs/inertia-vue3";
import { usePage } from "@inertiajs/inertia-vue3";
import {
  computed,
  defineProps,
  ref,
  reactive,
  onMounted,
} from "@vue/runtime-core";
import { PaginationObject } from "../../../../ts/interfaces/Pagination";
import Pagination from "@/Components/UI/Pagination.vue";
import Modal from "@/Components/Modal.vue";
import BootstrapITextnput from "@/Components/UI/Bootstrap/BootstrapITextnput.vue";
import { Inertia, PageProps } from "@inertiajs/inertia";
import { confirmAlert } from "../../../ts/supports/sweetAlert";
import Edit from "./Modal/Edit.vue";
import { objectToJSON } from "@/functions";
// import route from "vendor/tightenco/ziggy/src/js";

interface Props extends PageProps {
  posts: PaginationObject;
}
interface Post {
  id?: number;
  title: string;
  content: string;
}

const props = computed<Props>(() => usePage<Props>().props.value);
let postId = ref(0);

const posts = computed(() => props.value.posts.data);

const paginatioLinks = computed(() => props.value.posts.links);

const post = computed(() => posts.value[postId.value]);

function editPost(postIndex: number) {
  postId.value = postIndex
}
</script>