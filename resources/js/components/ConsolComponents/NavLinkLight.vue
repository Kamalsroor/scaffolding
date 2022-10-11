<template>
    <inertia-link :href="href" :class="classes">
        <slot></slot>
    </inertia-link>
</template>

<script>
    export default {
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                            ? 'inline-flex text-gray-700 hover:bg-gray-200 bg-gray-200 bg-opacity-10 px-4 py-2 rounded-md hover:bg-opacity-10'
                            : 'inline-flex text-gray-700 hover:bg-gray-200 bg-gray-200 bg-opacity-0 px-4 py-2 rounded-md hover:bg-opacity-10'
            }
        }
    }
</script>
