<script>
import { Link } from '@inertiajs/vue3';
import Nav from '@/Shared/Nav.vue';
export default {
components:{
    Link,
    Nav
},
props: {
    time: String
}
}
</script>

<template>
<div>
    <h1 class="text-center fw-bold">Users</h1>

    <Nav />

    <div>
        <p>The current time is {{ time }}.</p>
    </div>

    <Link href="/users" class="text-success position-absolute" style="bottom:-20px;" preserve-scroll>Refresh</Link>

</div>

</template>
