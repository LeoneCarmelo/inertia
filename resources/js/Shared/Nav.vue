<script>
import { Link } from '@inertiajs/vue3'
export default {
    name: 'Nav',
    components: {
        Link
    }
}
</script>

<template>
    <nav>
        <ul class="d-flex gap-3">
            <li>
                <Link href="/" class="text-info">Home</Link>
            </li>
            <li>
                <Link href="/users" class="text-info">Users</Link>
            </li>
            <li>
                <Link href="/settings" class="text-info">Settings</Link>
            </li>
            <li>
                <Link href="/esempio" method="POST" as="button" :data="{ foo: 'bar' }" class="text-info">Esempio di post request</Link>
            </li>
        </ul>
    </nav>
</template>