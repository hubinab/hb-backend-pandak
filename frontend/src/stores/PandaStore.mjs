import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import axios from 'axios'

export const usePandaStore = defineStore('pandas', () => {
    const pandas = ref([])
    const searchQuery = ref('')
    const baseUrl = 'http://backend.vm1.test/api/pandas/'

    const filteredPandas = computed(() => {
        if (!Array.isArray(pandas.value)) {
            return []
        }

        return pandas.value.filter(p =>
            p.name.toLowerCase().includes(searchQuery.value.toLowerCase())
        )
    })

    async function getPandas() {
        try {
            const res = await axios.get(baseUrl)
            pandas.value = res.data.data   // <-- EZ A HELYES
        } catch (error) {
            console.error('API hiba:', error)
            pandas.value = []              // <-- fallback, hogy ne legyen undefined
        }
    }

    async function getPanda(id) {
        const res = await axios.get(`${baseUrl}/${id}`)
        return res.data.data
    }

    async function deletePanda(id) {
        await axios.delete(`${baseUrl}/${id}`)
    }

    async function createPanda(data) {
        const res = await axios.post(baseUrl, data)
        return res.data
    }


    return {
        pandas,
        searchQuery,
        filteredPandas,
        getPandas,
        getPanda,
        deletePanda,
        createPanda,
    }
})