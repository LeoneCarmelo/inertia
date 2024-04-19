<script>
import Nav from './Nav.vue';
export default {
    components: {
        Nav
    }
}
</script>

<template>
    <header class="d-flex justify-content-between align-items-center p-3 bg-secondary">
        <h1 class="fw-bold text-light">Inertia app</h1>
        <Nav />
    </header>

    <!-- Main content -->
    <section class="p-3">
         <slot />
    </section>
</template>