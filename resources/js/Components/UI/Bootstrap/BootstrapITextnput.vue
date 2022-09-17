<template>
  <div class="form-group">
    <label :for="`#${id}`">{{ label }}</label>
    <input class="form-control" :id="id" :type="type" v-model="inputModel" />
  </div>
</template>

<script setup lang="ts">
import { computed, DebuggerOptions } from "@vue/runtime-core";

type valueProp = Number | String;

interface WriteableComputed {
  get<T>(): T;
  set<T>(value: T): void;
  debugOptions?: DebuggerOptions;
}

const emit = defineEmits<{(e: 'input', value: Number):void}>();

const props = defineProps({
  inputValue: {
    type: [Number, String],
  },
  type: {
    type: String,
    default: () => 'text'
  },
  errorMessage: {
    type: String,
    default: () => '',
  },
  label: {
    type: String,
    default: () => '',
  },
  id: {
    type: String,
    default: () => '',
  },
});

const inputModel: WriteableComputed = computed({
  get(): valueProp {
    return props.inputValue;
  },
  set(value: string) {
    console.log(value);
    
    emit("input", value);
  },
});
</script>