<script setup lang="ts">
    import { useTheme } from '@/composables/useTheme'

    const { theme, setTheme } = useTheme()

    const options = [
        { value: 'light', label: 'Light' },
        { value: 'dark', label: 'Dark' },
        { value: 'system', label: 'System' },
    ] as const
</script>

<template>
    <div class="flex items-center gap-1 rounded-lg border border-gray-200 p-1 dark:border-gray-700">
        <button
            v-for="opt in options"
            :key="opt.value"
            :class="[
                'rounded px-3 py-1 text-sm transition-colors',
                theme === opt.value
                    ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-900'
                    : 'text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white',
            ]"
            @click="setTheme(opt.value)"
        >
            {{ opt.label }}
        </button>
    </div>
</template>
