<script setup>
import { ref } from 'vue'
import { Save } from 'lucide-vue-next'

const emit = defineEmits(['submit'])

const form = ref({
  name: '',
  sex: '',
  birth: ''
})

function handleSubmit() {
  emit('submit', { ...form.value })
}
</script>

<template>
  <form
    @submit.prevent="handleSubmit"
    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 max-w-lg mx-auto my-12"
  >
    <div class="mb-6">
      <h2 class="text-xl font-bold text-gray-800">
        Új panda
      </h2>
      <p class="text-sm text-gray-500 mt-1">
        Kérlek töltsd ki pontosan az adatokat. A *-gal jelölt mezők kötelezőek.
      </p>
    </div>

    <div class="space-y-5">
      <!-- Név -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
          Név <span class="text-red-500">*</span>
        </label>
        <input
          v-model="form.name"
          type="text"
          id="name"
          class="w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 p-3"
          placeholder="pl. Bambusz"
        />
      </div>

      <!-- Nem -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          Nem <span class="text-red-500">*</span>
        </label>

        <div class="flex gap-4">
          <label class="flex items-center gap-2 cursor-pointer border p-3 rounded-lg w-full hover:bg-gray-50">
            <input
              v-model="form.sex"
              type="radio"
              value="M"
              class="text-emerald-600 focus:ring-emerald-500"
            />
            <span class="text-gray-700">Hím</span>
          </label>

          <label class="flex items-center gap-2 cursor-pointer border p-3 rounded-lg w-full hover:bg-gray-50">
            <input
              v-model="form.sex"
              type="radio"
              value="F"
              class="text-emerald-600 focus:ring-emerald-500"
            />
            <span class="text-gray-700">Nőstény</span>
          </label>
        </div>
      </div>

      <!-- Születési dátum -->
      <div>
        <label for="birth" class="block text-sm font-medium text-gray-700 mb-1">
          Születési dátum <span class="text-red-500">*</span>
        </label>
        <input
          v-model="form.birth"
          type="date"
          id="birth"
          class="w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 p-3"
        />
      </div>
    </div>

    <!-- Gombok -->
    <div class="mt-8 flex items-center gap-3">
      <button
        type="submit"
        class="flex-1 bg-emerald-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 disabled:opacity-50 disabled:cursor-not-allowed flex justify-center items-center gap-2 transition-colors"
      >
        <Save class="w-4 h-4" />
        Mentés
      </button>

      <RouterLink
        :to="{ name: 'index' }"
        class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors"
      >
        Mégse
      </RouterLink>
    </div>
  </form>
</template>