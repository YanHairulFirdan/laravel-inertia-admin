<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BaseLayout from "@/Components/Stisla/BaseLayout.vue";
</script>

<template>
  <Head title="Dashboard" />

  <BaseLayout>
    <div class="card">
      <div class="card-body">
        <h4 class="text-center">Welcome to Dashboard</h4>
      </div>
    </div>
  </BaseLayout>
</template>
