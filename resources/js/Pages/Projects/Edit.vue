<template>
    <Head title="Edit Project" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Project {{props.project.name}}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
                <form class="p-4" @submit.prevent="submit">
                    <div>
                        <InputLabel for="skill_id" value="Skill" />

                        <select
                            v-model="form.skill_id"
                            name="skill_id"
                            id="skill_id"
                            class="
                        mt-1
                        block
                        w-full
                        pr-10
                        py-2
                        text-base
                        border-gray-300
                        focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                        sm:text-sm
                        rounded-md
                        "
                        >
                            <option
                                v-for="skill in skills"
                                :key="skill.id"
                                :value="skill.id">{{ skill.name }}
                            </option>
                        </select>

                        <InputError class="mt-2" :message="$page.props.errors.skill_id" />
                    </div>

                    <div class="mt-2">
                        <InputLabel for="name" value="Name" />

                        <TextInput
                            id="name"
                            type="name"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            autofocus
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="$page.props.errors.name" />
                    </div>

                    <div class="mt-2">
                        <InputLabel for="project_url" value="URL" />

                        <TextInput
                            id="project_url"
                            type="project_url"
                            class="mt-1 block w-full"
                            v-model="form.project_url"
                            autocomplete="project_url"
                        />

                        <InputError class="mt-2" :message="$page.props.errors.project_url" />
                    </div>

                    <div class="mt-2">
                        <ImageInput
                            id="image"
                            type="file"
                            class="mt-1 block w-full"
                            @file-selected="file => form.image = file"
                        />

                        <InputError class="mt-2" :message="$page.props.errors.image" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup xmlns:Link="http://www.w3.org/1999/html">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, router } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ImageInput from '@/Components/ImageInput.vue';
import DropDown from '@/Components/DropDown.vue';

const props = defineProps({
    skills: Array,
    project: Object
})

const form = useForm({
    name: props.project?.name,
    image: null,
    skill_id:props.project?.skill_id,
    project_url:props.project?.project_url
});

const submit = () => {
    router.post(`/projects/${props.project.id}`, {
        _method: "put",
        name: form.name,
        image: form.image,
        skill_id: form.skill_id,
        project_url: form.project_url
    });
};
</script>

