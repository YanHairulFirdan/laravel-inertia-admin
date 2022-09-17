<template>
  <Modal id="addData" title="Tambah data" @modal-show="modalShow">
    <form action="">
      <div class="form-group">
        <label >Name</label>
        <input class="form-control" type="text" v-model="sale.to" />
        <div class="text-danger" v-if="props.errors.to">{{ props.errors.to }}</div>
      </div>
      <div class="form-group">
        <label >Base price</label>
        <input class="form-control" type="number" v-model="sale.base_price" />
        <div class="text-danger" v-if="props.errors.base_price">{{ props.errors.base_price }}</div>
      </div>
      <div class="form-group">
        <label >Unit</label>
        <select name="" id="" class="form-control" v-model="sale.unit">
          <option v-for="(unit, index) in units" :key="index">{{ unit }}</option>
          <div class="text-danger" v-if="props.errors.unit">{{ props.errors.unit }}</div>
        </select>
      </div>
      <div class="form-group">
        <label >Amount</label>
        <input class="form-control" type="number" v-model="sale.amount" />
        <div class="text-danger" v-if="props.errors.amount">{{ props.errors.amount }}</div>
      </div>
      <div class="form-group">
        <label >Total price</label>
        <input class="form-control" type="number" :value="totalPrice" />
      </div>
      <div class="form-group">
        <label >Transaction date</label>
        <input class="form-control" type="date" v-model="sale.transaction_date" />
        <div class="text-danger" v-if="props.errors.transaction_date">{{ props.errors.transaction_date }}</div>
      </div>

      <button class="btn btn-primary" type="button" @click="submit">Submit</button>
    </form>
  </Modal>
</template>

<script setup lang="ts">
import { PageProps } from '@inertiajs/inertia';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/reactivity';
import Modal from '@/Components/Modal.vue';
import { Router } from '@inertiajs/inertia/types/router';
import route from '../../../../../vendor/tightenco/ziggy/src/js';
import { onMounted } from 'vue';
import { errorAlert, successAlert } from '../../../../ts/supports/sweetAlert';

interface Props extends PageProps{
  ziggy: Object;
  flash: Object;
}
const props = computed<Props>(() => usePage<Props>().props.value)
  const units = ['Kilogram', 'Meter']

const sale = useForm({
  to: "",
  base_price: 0,
  amount: 0,
  unit: "",
  type: "",
  transaction_date: "",
});

const totalPrice = computed(() => sale.base_price * sale.amount)
function submit(){
  sale.post(route('sales.store') as string, {
    onError: () => errorAlert(),   
    onSuccess: () =>  {
      $('#addData').modal('hide');
      console.log(props.value.flash.success);
      
      successAlert(props.value.flash.success as string)
    }
  })
}

</script>