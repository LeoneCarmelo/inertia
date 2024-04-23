<script>
import Layout from '@/Shared/Layout.vue';
import Pagination from '@/Shared/Pagination.vue'
export default {
    layout: Layout,
    props: {
        time: String,
        users: Object
    },
    components:{
        Pagination
    },
    mounted() {
        //console.log(users)
    }
}

</script>

<template>

    <Head title="Users" />

    <h1 class="text-center fw-bold fs-1">Users</h1>

    <div>
        <p>The current time is {{ time }}.</p>
    </div>

    <div class="list users">
        <div class="table-responsive w-50 mx-auto">
            <table class="table table-striped table-hover table-borderless align-middle">
                <tbody class="table-group-divider">
                    <tr v-for="user in users.data" class="table-dark" :key="user.id">
                        <td v-text="user.name" class="py-3"></td>
                        <td>
                            <Link :href="`/user/${user.id}/edit`">Edit</Link>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        
    </div>
    <!-- Paginator -->
<!--     <div class="d-flex justify-content-center gap-2">
        <template v-for="link in users.links">
            <Link v-if="link.url" :href="link.url" v-html="link.label" :class="users.current_page == link.label ? '' : 'text-secondary'" preserve-scroll/>
        </template>
    </div> -->
<Pagination :links="users.links" :currentPage="users.current_page"/>



    <Link href="/users" class="text-success position-absolute" style="bottom:-20px;" preserve-scroll>Refresh</Link>

</template>
