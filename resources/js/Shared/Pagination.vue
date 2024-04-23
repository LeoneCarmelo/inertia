<script>
export default {
    name: 'Pagination',
    props: {
        links: Array,
        currentPage: Number
    }
}
</script>

<template>
    <!-- Paginator -->
    <div class="d-flex justify-content-center gap-2">
        <template v-for="link in links">
            <Link v-if="link.url" :href="link.url" v-html="link.label" :class="currentPage == link.label ? '' : 'text-secondary'" preserve-scroll/>
        </template>
    </div>
</template>