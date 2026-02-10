<script setup>
import { Search } from 'lucide-vue-next'
import { usePandaStore } from '@/stores/PandaStore.mjs'

const store = usePandaStore()
</script>

<template>
    <div class="relative max-w-2xl my-2 mx-auto">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <Search class="h-5 w-5 text-gray-400" />
        </div>

        <input v-model="store.searchQuery" type="text" @keydown.esc="store.searchQuery = ''"
        
            class="block w-full pl-11 pr-4 py-3 bg-gray-50 border-transparent text-gray-900 placeholder-gray-400 rounded-xl focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all duration-200 font-medium text-lg"
            placeholder="Keresés név alapján..." />

        <button @click="store.searchQuery = ''"
            class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
            <span class="text-xs font-bold uppercase bg-gray-200 px-2 py-1 rounded text-gray-500">ESC</span>
        </button>
    </div>
</template>