<script>
import Layout from '@/Shared/Layout.vue';
export default {
    //aggiungendo 
    layout: Layout,
    //il layout diventa persistente e diventa il padre di User.vue
    //se si registra
    components: {
        //Layout
    },
    //il layout diventa figlio e ogni volta che si naviga tra le pagine viene distrutto e rimontato di nuovo
    //bloccando adesempio un file audio in sottofondo
    props: {
        time: String,
        users: Array
    }
}

</script>

<template>

    <Head title="Users" />
    <Layout>
        <h1 class="text-center fw-bold fs-1">Users</h1>

        <div>
            <p>The current time is {{ time }}.</p>
        </div>

        <div class="list users">
            <div class="table-responsive w-50 mx-auto">
                <table class="table table-striped table-hover table-borderless align-middle">
                    <tbody class="table-group-divider">
                        <tr v-for="user in users" class="table-dark" :key="user.id">
                            <td v-text="user.name" class="py-3"></td>
                            <td><Link :href="`/user/${user.id}/edit`">Edit</Link></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>



        <Link href="/users" class="text-success position-absolute" style="bottom:-20px;" preserve-scroll>Refresh</Link>
    </Layout>
</template>
