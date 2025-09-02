<script lang="ts" setup>

interface User {
  id: number,
  name: string,
  email: string,
}

const users = ref<User[]>([])

onMounted(async () => {
  users.value = await $fetch(`http://localhost:8000/api/test`)
})
</script>

<template>
  <main class="flex-1 overflow-y-auto p-6">
    <div class="container mx-auto max-w-4xl">
      <section class="bg-white shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Daftar User</h2>
        <ul class="divide-y divide-gray-200">
          <li v-for="u in users" :key="u.id" class="py-2">
            <span class="font-medium text-gray-800">{{ u.name }}</span>
          </li>
        </ul>
      </section>
    </div>
  </main>
</template>
