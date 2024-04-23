<script>

export default {
    name: 'Nav',
}
</script>

<template>
    <nav>
        <ul class="d-flex gap-3">
            <li>
                <Link href="/" class="text-info" :class="{ 'text-decoration-underline fw-bold': $page.url === '/' }">
                Home</Link>
            </li>
            <li>
                <Link href="/users" class="text-info"
                    :class="{ 'text-decoration-underline fw-bold': $page.component === 'Users' }">Users</Link>
            </li>
            <li>
                <Link href="/settings" class="text-info"
                    :class="{ 'text-decoration-underline fw-bold': $page.url === '/settings' }">Settings</Link>
            </li>
            <li>
                <Link href="/esempio" method="POST" as="button" :data="{ foo: 'bar' }" class="text-info">Esempio di post
                request
                </Link>
            </li>
        </ul>
    </nav>
</template>