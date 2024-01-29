<script setup>

</script>
<template>
    <div class="wrapper-loadding">
        <div class="icon-loading"></div>
    </div>
</template>
<style scoped>
.wrapper-loadding {
    position: absolute;
    /* position: fixed; */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    /* width: 100%;
    height: 100vh; */
    z-index: 999;
    background-color: rgba(230, 230, 230, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
}

.wrapper-loadding .icon-loading {
    background: url(@/assets/icon/loading.svg) no-repeat center;
    height: 40px;
    width: 40px;
    animation: loading linear 0.8s infinite;
}

@keyframes loading {
    0% {
        transform: rotate(0deg);
    }

    50% {
        transform: rotate(180deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>