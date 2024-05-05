<script>
import Layout from '@/Shared/Layout.vue';

export default {
    layout: Layout,
    props: {
        errors: Object
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: '',
            },
            processing: false
        }
    },
    methods: {
        submit() {
            this.processing = true
            this.$inertia.post('/users', { form: this.form })
        }
    }
}
</script>

<template>

    <Head title="Create User" />
    <div class="container">
        <h1 class="text-center fw-bold fs-2">Create User</h1>
        <div class="row justify-content-center">
            <form @submit.prevent="submit()" class="w-50">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input v-model="form.name" type="text" class="form-control" name="name" id="name"
                        aria-describedby="helpId" placeholder="" required />
                    <div v-if="errors.name" v-text="errors.name" class="text-danger" role="alert">
                    </div>

                    <small id="helpId" class="form-text text-muted">Type your name</small>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input v-model="form.email" type="email" class="form-control" name="email" id="email"
                        aria-describedby="helpId" placeholder="" required />
                    <div v-if="errors.email" v-text="errors.email" class="text-danger" role="alert">
                    </div>
                    <small id="helpId" class="form-text text-muted">Type your email</small>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input v-model="form.password" type="password" class="form-control" name="password" id="password"
                        aria-describedby="helpId" placeholder="" required />
                    <div v-if="errors.password" v-text="errors.password" class="text-danger" role="alert">
                    </div>
                    <small id="helpId" class="form-text text-muted">Type your password</small>
                </div>
                <button type="submit" class="btn btn-success" :disabled="processing">
                    Submit
                </button>

            </form>
        </div>
    </div>

</template>
