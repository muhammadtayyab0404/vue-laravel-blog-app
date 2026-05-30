
<script>
import HHeader from './layouts/header.vue';
import FFoter from './layouts/footer.vue';

export default {
    components: {
        HHeader,
        FFoter
    }
}
</script>

<template>
    <HHeader />
    <main class="main-content">
        <router-view />
    </main>
    <FFoter />
</template>

<style scoped></style>
