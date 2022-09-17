<template>
  <div class="main-wrapper">
    <Head title="Base layout"/>
    <div class="navbar-bg"></div>
    <Navbar></Navbar>
    <div class="main-sidebar sidebar-style-2">
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
<script setup>
import { onMounted } from "@vue/runtime-core";
import Sidebar from "./Sidebar.vue";
import Navbar from "./Navbar.vue";
import { asset } from "@/functions";

onMounted(() => {
  const stislaScript = document.createElement("script");
  stislaScript.setAttribute("src", asset("stisla-master/assets/js/stisla.js"));
  const script = document.createElement("script");
  script.setAttribute("src", asset("stisla-master/assets/js/scripts.js"));

  document.body.appendChild(stislaScript);
  document.body.appendChild(script);
});
</script>