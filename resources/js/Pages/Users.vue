<script>
import Layout from '@/Shared/Layout.vue';
export default {
    //aggiungendo 
    layout: Layout,
    //il layout diventa persistente e diventa il padre di User.vue
    //se si registra
    //components: {
    //Layout
    //}
    //il layout diventa figlio e ogni volta che si naviga tra le pagine viene distrutto e rimontato di nuovo
    //bloccando adesempio un file audio in sottofondo
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
