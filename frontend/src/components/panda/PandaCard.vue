<script setup>
import { ArrowRight } from 'lucide-vue-next'
import { RouterLink } from 'vue-router'

defineProps({
  id: {
    type: Number,
    required: true
  },
  name: {
    type: String,
    required: true
  }
})
</script>

<template>
  <div
    class="group relative bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 border border-gray-100 flex flex-col h-full overflow-hidden"
  >
    <!-- A teljes kártya kattintható -->
    <RouterLink
      :to="{ name: 'pandas.show', params: { id } }"
      class="absolute inset-0 z-10"
    />

    <div
      class="flex-grow flex items-center justify-center p-10 bg-gradient-to-br from-white to-gray-50/50"
    >
      <h3
        class="text-3xl font-black text-gray-800 tracking-tight group-hover:text-emerald-600 transition-colors duration-300 text-center"
      >
        {{ name }}
      </h3>
    </div>

    <div
      class="bg-white border-t border-gray-100 py-4 flex items-center justify-center group-hover:bg-emerald-50 transition-colors duration-300"
    >
      <span class="text-emerald-600 font-bold text-sm flex items-center gap-2">
        Adatlap megtekintése
        <ArrowRight
          class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
        />
      </span>
    </div>
  </div>
</template>