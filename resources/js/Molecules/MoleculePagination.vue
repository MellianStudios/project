<template>
    <div class="bg-white px-4 py-3 flex items-center justify-center border-t border-gray-200 sm:px-6">
        <template v-if="links.length > 3">
            <div class="flex flex-wrap -mb-1 justify-center">
                <template v-for="link in links">
                    <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded bg-white" v-html="link.label"/>
                    <Link v-else :href="link.url" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded bg-white hover:bg-gray-400 focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-white': link.active }">
                        <span v-html="link.label"></span>
                    </Link>
                </template>
            </div>
        </template>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    props: {
        links: Object,
    }
}
</script>
