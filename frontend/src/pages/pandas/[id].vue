<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import PandaTable from '@/components/panda/PandaTable.vue'
import { ArrowLeft, Trash2 } from 'lucide-vue-next'
import { useRoute, useRouter } from 'vue-router'
import { usePandaStore } from '@/stores/PandaStore.mjs'
import { ref, onMounted } from 'vue'

const route = useRoute()
const router = useRouter()
const store = usePandaStore()

const panda = ref(null)

onMounted(async () => {
  panda.value = await store.getPanda(route.params.id)
})

async function handleDelete() {
  if (!confirm('Biztosan törlöd ezt a pandát?')) return

  await store.deletePanda(route.params.id)
  router.push({ name: 'index' })
}
</script>

<template>
  <BaseLayout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

      <!-- Vissza link -->
      <RouterLink
        :to="{ name: 'index' }"
        class="inline-flex items-center text-gray-500 hover:text-emerald-600 mb-6 transition-colors"
      >
        <ArrowLeft class="w-4 h-4 mr-2" />
        Vissza a listához
      </RouterLink>

      <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-100">

        <!-- Fejléc -->
        <div class="bg-emerald-600 px-6 py-4 flex justify-between items-center">
          <h1 class="text-2xl font-bold text-white">
            {{ panda?.name }} adatlapja
          </h1>

          <button
            @click="handleDelete"
            class="flex items-center gap-2 bg-red-500 text-white hover:bg-red-600 px-3 py-1.5 rounded-lg text-sm font-semibold transition-colors shadow-sm"
          >
            <Trash2 class="w-4 h-4" />
            Törlés
          </button>
        </div>

        <!-- Táblázat -->
        <PandaTable v-if="panda" :panda="panda" />
      </div>
    </div>
  </BaseLayout>
</template>

<route lang="yaml">
name: pandas.show
</route>