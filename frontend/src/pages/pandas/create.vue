<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import PandaForm from '@/components/panda/PandaForm.vue'
import { usePandaStore } from '@/stores/PandaStore.mjs'
import { useRouter } from 'vue-router'

const store = usePandaStore()
const router = useRouter()

async function handleSubmit(data) {
  await store.createPanda(data)
  router.push({ name: 'index' })
}
</script>

<template>
  <BaseLayout>
    <PandaForm @submit="handleSubmit" />
  </BaseLayout>
</template>

<route lang="yaml">
name: pandas.create
</route>