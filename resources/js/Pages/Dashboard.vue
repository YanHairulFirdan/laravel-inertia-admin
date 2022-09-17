<template>
  <base-layout title="Dashboard">
    <!-- <div class="row"> -->
    <Head title="Dashboard"></Head>
    <TransitionGroup name="card" tag="div" class="row">
      <div class="col-12 col-sm-6 col-md-4" :key="1">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h5>Sales of the month</h5>
            </div>
            <h1 class="font-weight-bold">Rp.{{ props.salesThisMonth }}</h1>
            <div class="card-text">
              <div class="card-stats-item col-8 text-left pl-4"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4" :key="2">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h5>Sales of the year</h5>
            </div>
            <h1 class="font-weight-bold">Rp.{{ props.salesThisYear }}</h1>
            <div class="card-text">
              <div class="card-stats-item col-8 text-left pl-4"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4" :key="3">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h5>Total sales</h5>
            </div>
            <h1 class="font-weight-bold">Rp.{{ props.totalSale }}</h1>
            <div class="card-text">
              <div class="card-stats-item col-8 text-left pl-4"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4" :key="4">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h5>Expenses of the month</h5>
            </div>
            <h1 class="font-weight-bold">Rp.{{ props.expensesThisMonth }}</h1>
            <div class="card-text">
              <div class="card-stats-item col-8 text-left pl-4"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4" :key="5">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h5>Expenses of the year</h5>
            </div>
            <h1 class="font-weight-bold">Rp.{{ props.expensesThisYear }}</h1>
            <div class="card-text">
              <div class="card-stats-item col-8 text-left pl-4"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4" :key="6">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h5>Total expenses</h5>
            </div>
            <h1 class="font-weight-bold">Rp.{{ props.totalExpense }}</h1>
            <div class="card-text">
              <div class="card-stats-item col-8 text-left pl-4"></div>
            </div>
          </div>
        </div>
      </div>
    </TransitionGroup>

    <div class="row">
      <div class="col-12 col-md-6">
        <h5 class="text-center">Monthly sales chart</h5>
        <bar-chart :data="monthlySales" :labels="monthNamesFromSales">
        </bar-chart>
      </div>
      <div class="col-12 col-md-6">
        <h5 class="text-center">Monthly sales chart</h5>
        <bar-chart :data="yearlySales" :labels="yearName">
        </bar-chart>
      </div>
      <div class="col-12 col-md-6 mt-md-4">
        <h5 class="text-center">Monthly sales chart</h5>
        <bar-chart :data="monthlyExpenses" :labels="monthNamesFromExpenses">
        </bar-chart>
      </div>
      <div class="col-12 col-md-6 mt-md-4">
        <h5 class="text-center">Monthly sales chart</h5>
        <bar-chart :data="yearlyExpenses" :labels="yearFromExpenses">
        </bar-chart>
      </div>
    </div>
    <div class="row">
    </div>
  </base-layout>
</template>

<script setup lang="ts">
import { Head } from "@inertiajs/inertia-vue3";
import { computed, reactive } from "@vue/runtime-core";
import BarChart from "../Components/UI/Charts/BarChart.vue";
import YearlyInvoice from "../../ts/interfaces/YearlyInvoice";
import MonthlyInvoice from "../../ts/interfaces/MonthlyInvoice";
import { datachartMapper } from "../../ts/functions";

interface Prop {
  salesThisMonth: string;
  salesThisYear: string;
  totalSale: string;
  monthlySales: Array<MonthlyInvoice>;
  yearlySales: Array<YearlyInvoice>;
  expensesThisMonth: string;
  expensesThisYear: string;
  totalExpense: string;
  monthlyExpenses: Array<MonthlyInvoice>;
  yearlyExpenses: Array<YearlyInvoice>;
}

const props = defineProps<Prop>();

const monthlySales = computed(() => {
  const salesData = props.monthlySales.map((sale) => sale.total);

  return {
    label: "Penjualan bulanan",
    data: salesData,
    backgroundColor: '#ff6384',
  }
});

const monthNamesFromSales = computed(() => {
  return props.monthlySales.map((sale) => sale.month);
});
const monthlySalesDataSet = computed(() => {
  return datachartMapper(props.monthlySales, "Penjualan bulanan");
});

const yearlySales = computed(() => {
  return {
    label: "Penjualan tahunan",
    data: props.yearlySales.map((sale) => sale.total),
    backgroundColor: '#343384',
  }
});

const yearName = computed(() => {
  return props.yearlySales.map(year => year.year)
})

const monthlyExpenses = computed(() => {
  const expensesData = props.monthlyExpenses.map((expense) => expense.total);

  return {
    label: "Belanja bulanan",
    data: expensesData,
    backgroundColor: '#ff6384',
  }
});

const monthNamesFromExpenses = computed(() => {
  return props.monthlyExpenses.map((expense) => expense.month);
});

const yearlyExpenses = computed(() => {
  return {
    label: "Belanja tahunan",
    data: props.yearlyExpenses.map((expense) => expense.total),
    backgroundColor: '#343384',
  }
});

const yearFromExpenses = computed(() => {
  return props.yearlyExpenses.map((expense) => expense.year);
});

const yearlySalesDataSet = computed(() => {
  return datachartMapper(props.yearlySales, "Penjualan tahunan");
});
</script>

<style scoped>
.card::before {
  content: "";
  background-color: rgb(71, 129, 181);
  position: relative;
  top: -10px;
  height: 1em;
  border-radius: 25% 25% 0 0;
  width: 100%;
  z-index: 9999;
}

.card-enter-active,
.card-leave-active {
  transition: all 0.5s ease;
}
.card-enter-from,
.card-leave-to {
  opacity: 0;
  transform: translateX(30px);
}
</style>
