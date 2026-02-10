<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import PandaFilter from '@/components/panda/PandaFilter.vue'
import PandaCard from '@/components/panda/PandaCard.vue'
import { usePandaStore } from '@/stores/PandaStore.mjs'
import { onMounted } from 'vue'

const store = usePandaStore()

onMounted(() => {
  store.getPandas()
})
</script>

<template>
  <BaseLayout>
    <!-- Kereső -->
    <PandaFilter class="my-6" />

    <!-- Grid -->
    <div
      class="grid gap-6
             grid-cols-1
             md:grid-cols-2
             xl:grid-cols-4
             py-4"
    >
      <PandaCard
        v-for="panda in store.filteredPandas"
        :key="panda.id"
        :id="panda.id"
        :name="panda.name"
      />
    </div>
  </BaseLayout>
</template>

<route lang="yaml">
name: index
meta:
  title: Főoldal
</route>