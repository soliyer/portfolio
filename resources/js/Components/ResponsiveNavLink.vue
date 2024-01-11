<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 dark:border-red-100 text-start text-base font-medium text-indigo-700 dark:text-black bg-indigo-50 dark:bg-slate-100 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 dark:focus:bg-red-100 focus:border-indigo-700 dark:focus:border-red-100 transition duration-150 ease-in-out'
        : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-slate-100 dark:hover:text-black-100 dark:hover:bg-slate-100 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 dark:hover:border-red-100 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
