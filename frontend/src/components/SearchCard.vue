<script setup>
import { reactive } from 'vue';
import { useRouter } from "vue-router";

const router = useRouter();

const searchString = reactive();
const search = function () {
    router.push("/search");
};

</script>
<template>
    <div class="home-search" @keydown.enter="search()">
        <font-awesome-icon icon="fa-solid fa-magnifying-glass" style="font-size: 16px; cursor: pointer;" @click="search" />
        <input type="text" placeholder="Search" v-model="searchString">
    </div>
</template>
<style scoped>
.home-search {
    padding: 6px;
    background-color: #fff;
    border: 1px solid #777;
    border-radius: 4px;
    display: flex;
    align-items: center;
}

.home-search input {
    padding-left: 8px;
    border: none;
}

.home-search input:focus {
    border: none;
    outline: none;
}
</style>