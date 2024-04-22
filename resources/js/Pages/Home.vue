<script>
import { Head } from '@inertiajs/vue3';
import Layout from '@/Shared/Layout.vue';

export default {
    components: {
        Head,
        Layout
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: {
            type: String,
            required: true,
        },
        phpVersion: {
            type: String,
            required: true,
        },
    }
}
</script>

<template>
    <Layout>
        <Head title="Welcome" />

        <div>
            <div v-if="canLogin" class="">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Dashboard</Link>

                <template v-else>
                    <Link :href="route('login')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Log in</Link>

                    <Link v-if="canRegister" :href="route('register')"
                        class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Register</Link>
                </template>
            </div>
        </div>

        <h1>Home</h1>
    </Layout>
</template>
