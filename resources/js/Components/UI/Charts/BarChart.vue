<script setup lang="ts">
import { Bar } from "vue-chartjs";
import {
  Chart as Chartjs,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
} from "chart.js";
import { reactive } from "@vue/reactivity";
import useChartProps from "../../../../ts/composeable/chartProps";
import { computed } from "@vue/runtime-core";

Chartjs.register(
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale
);

const props = defineProps({
    chartId: {
      type: String,
      default: "bar-chart",
    },
    datasetIdKey: {
      type: String,
      default: "label",
    },
    width: {
      type: Number,
      default: 400,
    },
    height: {
      type: Number,
      default: 400,
    },
    cssClasses: {
      type: String,
      default: "",
    },
    styles: {
      type: Object,
      default: () => { },
    },
    plugins: {
      type: Object,
      default: () => { },
    },
    labels: {
      type: Array,
      required: true,
    },
    data: {
      type: [Object, Array],
      required: true,
    },
  });

const chartOptions = reactive({
  responsive: true,
});

const chartData = computed(() => {
  return {
    labels: props.labels,
    datasets: Array.isArray(props.data)
      ? props.data
      : [ props.data ],
  }
})
</script>

<template>
  <bar
    :chart-options="chartOptions"
    :chart-data="chartData"
    chart-id="monthlySales"
    :width="width"
    :height="height"
    :plugins="plugins"
    :css-classes="cssClasses"
    :styles="styles"
  >
  </bar>
</template>
