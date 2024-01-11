<template>
    <input
        type="file"
        accept="image/*"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        @change="onFileSelected"
        ref="input"
    />
</template>

<script setup>
import { ref, defineEmits  } from 'vue';

const input = ref(null);
const selectedFile = ref(null);
const emit = defineEmits(['file-selected']);

const onFileSelected = (event) => {
    if (event.target.files.length > 0) {
        emit('file-selected', event.target.files[0]);
    }
};

defineExpose({ focus: () => input.value.focus() });
</script>
