<script>
import Layout from '@/Shared/Layout.vue';
export default {
components:{
    Layout
},
props: {
    time: String
}
}
</script>

<template>
    <Layout>
        <h1 class="text-center fw-bold">Users</h1>

        <div>
            <p>The current time is {{ time }}.</p>
        </div>
    
        <Link href="/users" class="text-success position-absolute" style="bottom:-20px;" preserve-scroll>Refresh</Link>
    </Layout>
</template>
