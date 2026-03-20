import '../css/app.css'
import './bootstrap'

import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { createApp, DefineComponent, h } from 'vue'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'

export type Theme = 'light' | 'dark' | 'system'

export interface SharedProps {
    auth: {
        user: {
            id: string
            name: string
            email: string
            theme: Theme
        }
    }
    theme: Theme
}

export function useSharedProps() {
    return usePage<SharedProps>().props
}

const appName = import.meta.env.VITE_APP_NAME || 'Laravel'

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el)
    },
    progress: {
        color: '#4B5563',
    },
})
