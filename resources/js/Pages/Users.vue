<script>
import Layout from '@/Shared/Layout.vue';
import Pagination from '@/Shared/Pagination.vue'
export default {
    layout: Layout,
    props: {
        users: Object
    },
    components: {
        Pagination
    }
}

</script>

<template>

    <Head title="Users" />

    <h1 class="text-center fw-bold fs-1">Users</h1>

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

    <Pagination :links="users.links" :currentPage="users.current_page" />

</template>
