<script setup>
import { computed } from 'vue'

const props = defineProps({
  panda: {
    type: Object,
    required: true
  }
})

// 13. feladat: nem magyarul
const sexLabel = computed(() => {
  return props.panda.sex === 'male' ? 'Hím' : 'Nőstény'
})

// 14. feladat: feltételes formázás
const sexClasses = computed(() => {
  return props.panda.sex === 'male'
    ? 'bg-blue-100 text-blue-700'
    : 'bg-pink-100 text-pink-700'
})
</script>

<template>
  <div class="p-6">
    <table class="w-full text-left border-collapse">
      <tbody class="divide-y divide-gray-100">

        <tr class="group hover:bg-gray-50 transition-colors">
          <th class="py-4 px-2 font-medium text-gray-500 w-1/3">Azonosító (ID)</th>
          <td class="py-4 px-2 text-gray-900 font-mono">
            {{ panda.id }}
          </td>
        </tr>

        <tr class="group hover:bg-gray-50 transition-colors">
          <th class="py-4 px-2 font-medium text-gray-500">Név</th>
          <td class="py-4 px-2 text-gray-900 font-bold">
            {{ panda.name }}
          </td>
        </tr>

        <tr class="group hover:bg-gray-50 transition-colors">
          <th class="py-4 px-2 font-medium text-gray-500">Nem</th>
          <td class="py-4 px-2 text-gray-900">
            <span
              class="px-2 py-1 rounded-full text-xs font-semibold"
              :class="sexClasses"
            >
              {{ sexLabel }}
            </span>
          </td>
        </tr>

        <tr class="group hover:bg-gray-50 transition-colors">
          <th class="py-4 px-2 font-medium text-gray-500">Születési dátum</th>
          <td class="py-4 px-2 text-gray-900">
            {{ panda.birthdate }}
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</template>