<template>
  <Teleport to="body">
    <div class="modal fade" 
      :id="id" 
      tabindex="-1" 
      :aria-labelledby="`
      ${id}ModalLabel`" 
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" :id="`${id}ModalLabel`">{{ title }}</h5>
            <button 
              type="button" 
              class="close" 
              data-dismiss="modal" 
              aria-label="Close" 
              @click="$emit('close')"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <slot/>
          </div>
          <div class="modal-footer">
            <button 
              type="button" 
              class="btn btn-danger bg-danger"
              data-dismiss="modal" @click="$emit('close')"
            >
              {{ buttonCancelText }}
            </button>
            <button 
              type="button" 
              class="btn btn-primary bg-primary"
              @click="$emit('save')"
            >
              {{ buttonSaveText }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </Teleport>
</template>

<script setup>
import { onMounted, defineEmits } from "@vue/runtime-core";

  const props = defineProps({
    id: String,
    title: String,
    buttonCancelText: {
      type: String,
      default: () => 'Cancel'
    },
    buttonSaveText: {
      type: String,
      default: () => 'Save'
    }
  })

  const emit = defineEmits(['modal-show', 'close', 'save'])

  onMounted(() => {
    $(`#${props.id}`).on('show.bs.modal', function ($event) {
      emit('modal-show', $event.relatedTarget)
    })
  })
</script>