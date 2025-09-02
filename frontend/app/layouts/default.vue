<template>
  <div class="min-h-screen flex flex-col bg-gray-50">
    <!-- Navbar -->
    <header class="sticky top-0 bg-blue-600 text-white shadow z-10">
      <div
        class="container mx-auto flex items-center justify-between px-6 py-4"
      >
        <h1 class="text-xl font-bold">Online Testing</h1>
        <nav class="space-x-4">
          <NuxtLink to="/provinsi" active-class="font-bold">Provinsi</NuxtLink>
          <NuxtLink to="/kecamatan" active-class="font-bold"
            >Kecamatan</NuxtLink
          >
          <NuxtLink to="/kelurahan" active-class="font-bold"
            >Kelurahan</NuxtLink
          >
          <NuxtLink to="/pegawai" active-class="font-bold">Pegawai</NuxtLink>
        </nav>
      </div>
    </header>

    <!-- Main -->
    <div class="flex flex-1">
      <slot />
    </div>
  </div>
</template>
