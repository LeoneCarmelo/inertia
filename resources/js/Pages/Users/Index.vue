<script>
import Layout from '@/Shared/Layout.vue';
import Pagination from '@/Shared/Pagination.vue'
export default {
    layout: Layout,
    props: {
        users: Object,
        filters: Object
    },
    components: {
        Pagination
    },
    data() {
        return {
            search: this.$props.filters.search
        }
    },
    watch: {
        search(value) {
            //console.log('changed' + value)
            //per fare richieste al server si usa this.$inertia
            this.$inertia.get('/users', {
                search: value
            }, {
                //preserva lo stato dell'input evitando che a ogni lettera si fa la richiesta e si refresha la pagina cancellando il testo dell'input
                preserveState: true,
                replace: true
            })
        }
    }
}

</script>

<template>

    <Head title="Users" />
    <div class="d-flex justify-content-between w-50 p-5 mx-auto align-items-center">
        <div class="d-flex gap-3 align-items-center">
            <h1 class="text-center fw-bold fs-1">Users</h1>
            <Link href="/users/create">New User</Link>
        </div>
        <input v-model="search" type="text" placeholder="Search..." class="rounded-2">
    </div>

    <div class="list users">
        <div class="table-responsive w-50 mx-auto">
            <table class="table table-striped table-hover table-borderless align-middle">
                <tbody class="table-group-divider">
                    <tr v-if="users.data" v-for="user in users.data" class="table-dark" :key="user.id">
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
