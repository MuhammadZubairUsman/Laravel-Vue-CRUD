<template>
    <Frontend>
        <Head title="About Us"/>

        <h1>{{ title }}</h1>
    </Frontend>
</template>

<script setup>
defineProps({
    title: String,
});

import Frontend from "@/Layouts/FrontendLayout.vue";
import { Head } from "@inertiajs/vue3";

</script>
