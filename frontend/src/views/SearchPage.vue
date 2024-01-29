<script setup>
import { ref, reactive, watch, onBeforeMount } from 'vue'
import ThumbnailMovie from "@/components/ThumbnailMovie.vue";
import { useMovieStore } from "../store/useMovie"
import TheLoading from "@/components/TheLoading.vue";
import { allCategory, allCountry } from "../helper/resource";
import { chunkArray } from "../helper/formatArray";
import { useRoute, useRouter } from "vue-router";

const router = useRouter();
const route = useRoute();
const movieName = ref(route.query.name);
const movieCategory = ref(route.query.category);
const movieCountry = ref(route.query.country);

const movieStore = useMovieStore();

const searchInfo = reactive({
    movieName: "",
    category: {
        id: null,
        categoryName: null,
        slug: null
    },
    country: {
        id: null,
        countryName: null,
        slug: null
    }
});

const getCategoryNameBySlug = (array, slug) => {
    const foundCategory = array.find(category => category.slug === slug);
    return foundCategory ? foundCategory.category_name : null;
}

const getCountryNameBySlug = (array, slug) => {
    const foundCountry = array.find(country => country.slug === slug);
    return foundCountry ? foundCountry.country_name : null;
}

const setSearchInfo = () => {
    searchInfo.movieName = movieName.value;
    searchInfo.category.categoryName = getCategoryNameBySlug(allCategory, movieCategory.value);
    searchInfo.category.slug = movieCategory.value;
    searchInfo.country.countryName = getCountryNameBySlug(allCountry, movieCountry.value);
    searchInfo.country.slug = movieCountry.value;
}

onBeforeMount(async () => {
    setSearchInfo();

    await movieStore.searchMovie({
        name: movieName.value,
        country: movieCountry.value,
        category: movieCategory.value
    });
});

watch(
    () => ({
        name: route.query.name,
        category: route.query.category,
        country: route.query.country
    }),
    (newValues) => {
        movieName.value = newValues.name;
        movieCategory.value = newValues.category;
        movieCountry.value = newValues.country;
        setSearchInfo();

        movieStore.searchMovie({
            name: newValues.name,
            country: newValues.country,
            category: newValues.category
        });
    }
);

const isShowCategoryList = ref(false);
const isShowCountryList = ref(false);

const showCategoryDropList = () => {
    isShowCategoryList.value = !isShowCategoryList.value;
}

const showCountryDropList = () => {
    isShowCountryList.value = !isShowCountryList.value;
}

const selectCategory = (category) => {
    searchInfo.category.id = category.id;
    searchInfo.category.categoryName = category.category_name;
    searchInfo.category.slug = category.slug;
    isShowCategoryList.value = false;
}

const selectCountry = (country) => {
    searchInfo.country.id = country.id;
    searchInfo.country.countryName = country.country_name;
    searchInfo.country.slug = country.slug;
    isShowCountryList.value = false;
}

const filterMovie = () => {
    router.push({ path: "/search", query: { name: searchInfo.movieName, country: searchInfo.country.slug, category: searchInfo.category.slug } });
}

</script>
<template>
    <div id="search-page">
        <div class="header">Danh Sách Tìm Kiếm</div>
        <div class="search-container">
            <div class="search-label">
                <p>Tên Movie</p>
                <input type="text" class="movieName" v-model="searchInfo.movieName">
            </div>
            <div class="search-label">
                <p>Thể loại</p>
                <div class="search-select">
                    <div class="selected" @click="showCategoryDropList">
                        <input type="text" disabled class="other" v-model="searchInfo.category.categoryName">
                        <font-awesome-icon icon="fa-solid fa-chevron-up" style="margin: 8px; cursor: pointer;"
                            v-if="isShowCategoryList" />
                        <font-awesome-icon icon="fa-solid fa-chevron-down" style="margin: 8px; cursor: pointer;" v-else />
                    </div>
                    <div class="select-list" v-if="isShowCategoryList" v-outside="showCategoryDropList">
                        <div class="select-item" v-for="category in allCategory" :key="category.id"
                            @click="selectCategory(category)">
                            {{ category.category_name }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-label">
                <p>Quốc gia</p>
                <div class="search-select">
                    <div class="selected" @click="showCountryDropList">
                        <input type="text" disabled class="other" v-model="searchInfo.country.countryName">
                        <font-awesome-icon icon="fa-solid fa-chevron-up" style="margin: 8px; cursor: pointer;"
                            v-if="isShowCountryList" />
                        <font-awesome-icon icon="fa-solid fa-chevron-down" style="margin: 8px; cursor: pointer;" v-else />
                    </div>
                    <div class="select-list" v-if="isShowCountryList" v-outside="showCountryDropList">
                        <div class="select-item" v-for="country in allCountry" :key="country.id"
                            @click="selectCountry(country)">
                            {{ country.country_name }}
                        </div>
                    </div>
                </div>
            </div>
            <button class="search-btn" @click="filterMovie">Tìm</button>
        </div>
        <p style="font-size: 20px; font-weight: 500; margin-bottom: 16px;">Kết quả tìm kiếm: </p>
        <div class="result-container" v-if="movieStore.searchResults.length">
            <TheLoading v-if="movieStore.isLoading"></TheLoading>
            <div class="movies-row" v-for="row in chunkArray(movieStore.searchResults, 4)" :key="row">
                <ThumbnailMovie v-for="movie in row" :key="movie.id" :movie="movie"></ThumbnailMovie>
            </div>
        </div>
        <div class="no-result" v-else>Không tìm thấy phim phù hợp.</div>
    </div>
</template>
<style scoped>
#search-page {
    padding: 24px 250px 64px 250px;
}

.header {
    margin: 24px 0;
    font-size: 36px;
    font-weight: 600;
    text-transform: uppercase;
    text-align: center;
}

.search-container {
    padding: 24px;
    margin-bottom: 64px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 24px;
}

.search-label {
    display: flex;
    align-items: center;
    gap: 8px;
}

.search-label p {
    font-size: 16px;
    font-weight: 600;
}

.search-label .movieName {
    height: 32px;
    padding-left: 6px;
    border-radius: 8px;
}

.search-label .selected {
    height: 32px;
    border: 2px solid #000;
    border-radius: 8px;
    display: flex;
    align-items: center;
}

.search-label .selected .other {
    width: 120px;
    padding-left: 6px;
    border: none;
    background-color: #fff;
}

.search-label .selected .other:focus {
    border: none;
    outline: none;
}

.search-select {
    position: relative;
}

.search-select .select-list {
    width: 100%;
    max-height: 280px;
    overflow-y: auto;
    position: absolute;
    left: 0;
    z-index: 1;
    display: block;
    margin-top: 2px;
    background-color: #f9f9f9;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.select-list .select-item {
    padding: 8px 16px;
    cursor: pointer;
}

.search-btn {
    width: 60px;
    padding: 4px;
    border-radius: 6px;
    /* border: none; */
    cursor: pointer;
}

.result-container .movies-row {
    position: relative;
    display: flex;
    justify-content: center;
    gap: 48px;
    margin-bottom: 36px;
}

.no-result {
    min-height: 300px;
    font-size: 28px;
    font-weight: bold;
    text-decoration: uppercase;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>