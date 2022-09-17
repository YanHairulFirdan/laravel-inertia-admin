<template>
  <div class="form-group">
    <label for="">{{ props.labelText }}</label>
    <input 
      class="form-control"
      :class="{ 'is-invalid': hasErrorMessage }"
      :type="props.type"
      :value="props.modelValue"
      :required="required"
      @input="emit('update:modelValue', $event.target.value)"
    />
    <ValidationError :message="props.errorMessage" />
  </div>
</template>

<script setup lang="ts">
import { computed } from "@vue/runtime-core";
import ValidationError from "../ValidationError.vue";

const props = defineProps({
  labelText: String,
  modelValue: [String, Number],
  type: {
    type: String,
    default: () => "text",
  },
  errorMessage: {
    type: String,
    default: () => "",
  },
  required: {
    type: Boolean,
    default: () => false,
  },
});

const emit = defineEmits(['update:modelValue']);

const hasErrorMessage = computed(() => props.errorMessage.length > 0)
</script>