<template>
  <div class="main-wrapper">
    <div class="navbar-bg"></div>
    <Navbar v-if="! canLogin"></Navbar>
    <div v-if="! canLogin" class="main-sidebar sidebar-style-2">
      <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
          <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
          <a href="index.html">St</a>
        </div>
        <Sidebar></Sidebar>
      </aside>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <slot />
      </section>
    </div>
    <footer class="main-footer">
      <div class="footer-left">
        Copyright &copy; 2018
        <div class="bullet"></div>
        Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
      </div>
      <div class="footer-right"></div>
    </footer>
  </div>
</template>
<script setup lang="ts">
import { onMounted } from "@vue/runtime-core";
import Sidebar from "./Sidebar.vue";
import Navbar from "./Navbar.vue";
import { asset } from "@/functions";
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/reactivity";
import { PageProps } from "@inertiajs/inertia"

interface Props extends PageProps{
  canLogin: Boolean;
  canRegister: Boolean;
}
const props = computed<Props>(() => usePage<Props>().props.value)

const canLogin = computed<Boolean>(() => props.value.canLogin)
onMounted(() => {
  const stislaScript = document.createElement("script");
  stislaScript.setAttribute("src", asset("stisla-master/assets/js/stisla.js"));
  const script = document.createElement("script");
  script.setAttribute("src", asset("stisla-master/assets/js/scripts.js"));

  document.body.appendChild(stislaScript);
  document.body.appendChild(script);
});
</script>