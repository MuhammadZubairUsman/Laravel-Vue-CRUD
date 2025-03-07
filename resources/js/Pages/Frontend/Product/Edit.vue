<template>
    <Head title="Edit Product" />
    <FrontendLayout>
        <div
            v-if="$page.props.flash.message"
            class="alert bg-green-200 mt-4 mx-4 px-4 py-2"
        >
            {{ $page.props.flash.message }}
        </div>
        <div class="mt-4 mx-4">
            <div class="flex justify-between">
                <h5>Create Product</h5>
                <Link
                    :href="route('products.index')"
                    class="bg-red-600 text-white inline-block rounded py-3 px-5 mb-4"
                    >Back
                </Link>
            </div>
            <form @submit.prevent="updateProduct()">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-6">
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input
                                type="text"
                                v-model="form.name"
                                class="form-control py-1 w-full"
                            />
                            <div v-if="errors.name" class="text-red-500">
                                {{ errors.name }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Product Price</label>
                            <input
                                type="text"
                                v-model="form.price"
                                class="form-control py-1 w-full"
                            />
                        </div>
                        <div v-if="errors.price" class="text-red-500">
                            {{ errors.price }}
                        </div>

                        <div class="mb-3">
                            <Link
                                :href="route('products.index')"
                                class="bg-red-600 text-white inline-block rounded py-2 px-5 mb-4"
                            >
                                Back
                            </Link>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="bg-blue-500 text-white py-2 rounded px-5 mb-4 ml-4"
                            >
                                <span v-if="form.processing">Updating....</span>
                                <span v-else>Update</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </FrontendLayout>
</template>

<script setup>
const props = defineProps({
    errors: Object,
    product: Object,
});

import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: props.product.name,
    price: props.product.price,
});

const updateProduct = () => {
    const res = form.put(route("products.update", props.product.id), {
        onSuccess: () => form.reset(),
    });
};
</script>
