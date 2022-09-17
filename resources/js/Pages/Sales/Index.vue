<template>
  <Head title="Data Penjualan" />
  <base-layout>
    <div class="card">
      <div class="card-header">
        <h3>Sales</h3>
        <h3>{{ props.name }}</h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
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
                <th>Pembeli</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Total harga</th>
                <th>Tanggal transaksi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(sale, index) in sales" :key="sale.id">
                <td>{{ index + props.sales.from }}</td>
                <td>{{ sale.to }}</td>
                <td>{{ sale.base_price }}</td>
                <td>{{ sale.amount }}</td>
                <td>{{ sale.unit }}</td>
                <td>{{ sale.total_price }}</td>
                <td>{{ sale.transaction_date }}</td>
                <td><button class="btn btn-danger" @click="deleteData">Delete</button></td>
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

  <AddSale></AddSale>
  
</template>

<script setup lang="ts">
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { usePage } from '@inertiajs/inertia-vue3'
import { computed, defineProps, ref, reactive, onMounted} from "@vue/runtime-core";
import { PaginationObject } from "../../../../ts/interfaces/Pagination";
import Pagination from "@/Components/UI/Pagination.vue";
import Modal from "@/Components/Modal.vue";
import BootstrapITextnput from "@/Components/UI/Bootstrap/BootstrapITextnput.vue";
import { Inertia, PageProps } from "@inertiajs/inertia";
import AddSale from "./Modals/AddSale.vue";
import { confirmAlert } from "../../../ts/supports/sweetAlert";
// import route from "vendor/tightenco/ziggy/src/js";

interface Props extends PageProps {
  sales: PaginationObject;
  name: string;
  errors: Object;
}
// 
const props = computed<Props>(() => usePage<Props>().props.value);

const isSalesDataEmpty = computed(() => {
  return props.value.sales.data;
});

const sales = computed(() => {
  return props.value.sales.data;
});

onMounted(() => console.log(usePage().props.value.errors))

const paginatioLinks = computed(() => props.value.sales.links);

function deleteData() {
  confirmAlert()
}
</script>