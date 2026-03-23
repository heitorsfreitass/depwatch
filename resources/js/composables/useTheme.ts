import { router, usePage } from '@inertiajs/vue3'
import { computed, watch, onMounted } from 'vue'

export type Theme = 'light' | 'dark' | 'system'

export function useTheme() {
    const page = usePage()
    const theme = computed(() => (page.props.theme as Theme) ?? 'system')

    function applyTheme(value: Theme) {
        const root = document.documentElement
        if (value === 'system') {
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches
            root.classList.toggle('dark', prefersDark)
        } else {
            root.classList.toggle('dark', value === 'dark')
        }
    }

    function setTheme(value: Theme) {
        applyTheme(value)
        router.patch('/theme', { theme: value }, { preserveScroll: true })
    }

    onMounted(() => applyTheme(theme.value))
    watch(theme, applyTheme)

    return { theme, setTheme }
}