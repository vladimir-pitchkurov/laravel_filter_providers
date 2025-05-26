<template>
    <div class="row">
        <div class="col-md-3">
            <form @submit.prevent="applyFilters" class="card mb-4">
                <div class="card-header">
                    <strong>Filters</strong>
                </div>
                <div class="card-body">
                    <div v-for="category in categories" :key="category.id" class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            :id="'category_' + category.id"
                            :value="category.id"
                            v-model="selectedCategories"
                        />
                        <label class="form-check-label" :for="'category_' + category.id">
                            {{ category.name }}
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>

        <div class="col-md-9">
            <div v-bind="containerProps" style="height: 600px; overflow-y: auto;">
                <div v-bind="wrapperProps">
                    <div v-for="item in list" :key="item.index" style="height: 150px; margin-bottom: 1rem;">
                        <div class="card provider-card h-100 shadow-sm d-flex flex-row-reverse align-items-center">
                            <div class="col-md-4" style="padding: 1em">
                                <img
                                    :src="item.data.logo_url || 'https://placehold.co/600x400'"
                                    class="img-fluid rounded-end"
                                    :alt="item.data.name"
                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;"
                                />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ item.data.name }}</h5>
                                    <p class="card-text">{{ item.data.description }}</p>
                                    <p class="card-text" v-if="item.data.categories && item.data.categories.length">
                                        <strong>Categories:</strong>
                                        {{ item.data.categories.map(c => c.name).join(', ') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref, computed, onMounted, watch} from 'vue';
import {useVirtualList} from '@vueuse/core';
import axios from 'axios';

const providers = ref([]);
const categories = ref([]);
const selectedCategories = ref([]);

const fetchProviders = async () => {
    try {
        const params = selectedCategories.value.length
            ? {categories: selectedCategories.value.join(',')}
            : {};
        const response = await axios.get('/api/providers', {params});
        providers.value = response.data?.providers || [];
        updateUrl();
    } catch (error) {
        console.error(error);
    }
};

const updateUrl = () => {
    const params = selectedCategories.value.length
        ? {categories: selectedCategories.value.join(',')}
        : {};
    const queryString = new URLSearchParams(params).toString();
    const newUrl = `${window.location.pathname}${queryString ? '?' + queryString : ''}`;
    window.history.replaceState(null, '', newUrl);
}

const fetchCategories = async () => {
    categories.value = window.app_categories || [];
    selectedCategories.value = window.app_selected_categories || [];
};

onMounted(async () => {
    await fetchCategories();
    await fetchProviders();
});

const applyFilters = async () => {
    await fetchProviders();
};

const {list, containerProps, wrapperProps} = useVirtualList(providers, {
    itemHeight: 150,
    overscan: 10,
});

watch(() => selectedCategories.value, (newValue, oldValue) => {
    if (newValue !== oldValue) {
        updateUrl();
    }
}, {deep: true, immediate: true});
</script>

<style scoped>
</style>
