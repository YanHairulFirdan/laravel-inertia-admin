<template>
  <div v-if="links.length > 3">
    <div class="d-flex justify-content-between">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <template v-for="(link, index) in links" :key="index">
              <li class="page-item disabled" v-if="isUrlEmpty(link)">
                <span class="page-link" v-html="link.label"></span>
              </li>
              <li class="page-item" :class="{ 'active': link.active }" v-else>
                <Link :href="link.url" class="page-link" v-html="link.label"></Link>
              </li>
            </template>
          </ul>
        </nav>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/inertia-vue3";
import { PaginationLink } from "resources/ts/interfaces/Pagination";
interface Props {
  links: Array<PaginationLink>;
}
const props = defineProps<Props>();

function isUrlEmpty(link: PaginationLink): Boolean {
  return link.url === null;
}
</script>