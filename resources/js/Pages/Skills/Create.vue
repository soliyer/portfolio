<template>
    <Head title="New Skills" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Skills</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
                <form class="p-4" @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="Name" />

                        <TextInput
                            id="name"
                            type="name"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            autofocus
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-2">
                        <ImageInput
                            id="image"
                            type="file"
                            class="mt-1 block w-full"
                            @file-selected="file => form.image = file"
                            />

                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup xmlns:Link="http://www.w3.org/1999/html">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ImageInput from '@/Components/ImageInput.vue';


const form = useForm({
    name: '',
    image: null,
});

const submit = () => {
    form.post(route('skills.store'));
};
</script>
