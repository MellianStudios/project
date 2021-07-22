require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import mitt from 'mitt';

const emitter = mitt();

createInertiaApp({
    resolve: name => import(`./Pages/${name}`),
    setup({ el, app, props, plugin }) {
        const application = createApp({ render: () => h(app, props) })
            .mixin({ methods: { route: window.route } })
            .use(plugin);

        application.config.globalProperties.emitter = emitter;
        application.mount(el);
    },
})

InertiaProgress.init();
