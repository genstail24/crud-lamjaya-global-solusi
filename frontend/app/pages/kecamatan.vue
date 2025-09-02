<script lang="ts" setup>
interface Kecamatan {
  id: number | null;
  kode: string;
  nama: string;
  active: boolean;
}

const BASE_URL = "http://localhost:8000/api";
const ENDPOINT = "t-kecamatan";
const DEFAULT_FORM_VALUE = {
  id: null,
  kode: "",
  nama: "",
  active: false,
};

const listData = ref<Kecamatan[]>([]);
const modal = ref<boolean>(false);
const formData = ref<Kecamatan>(DEFAULT_FORM_VALUE);

function buildPayload() {
  return { ...formData.value };
}

async function fetchData() {
  const { data } = await $fetch(`${BASE_URL}/${ENDPOINT}`);
  listData.value = data;
}

function handleEdit(editedItem: Kecamatan) {
  modal.value = true;
  formData.value = { ...editedItem };
}

function handleSubmit() {
  if (formData.value.id) return handleUpdate();

  return handleSave();
}
async function handleSave() {
  try {
    const { success, message } = await $fetch(`${BASE_URL}/${ENDPOINT}`, {
      method: "POST",
      body: buildPayload(),
    });

    if (success) {
      await fetchData();
      modal.value = false;
      formData.value = DEFAULT_FORM_VALUE;

      alert(message || "Data created successfuly");
    } else {
      alert(message || "Data created failed");
    }
  } catch (error) {
    alert(error?.response?.message ?? "Internal Server Error");
  }
}

async function handleUpdate() {
  try {
    const { success, message } = await $fetch(
      `${BASE_URL}/${ENDPOINT}/${formData.value.id}`,
      {
        method: "PUT",
        body: buildPayload(),
      }
    );

    if (success) {
      await fetchData();
      modal.value = false;
      formData.value = DEFAULT_FORM_VALUE;

      alert(message || "Data updated successfuly");
    } else {
      alert(message || "Data updated failed");
    }
  } catch (error) {
    alert(error?.response?.message ?? "Internal Server Error");
  }
}

async function handleDelete(item: Kecamatan) {
  const confirmed = confirm("Are you sure want to delete this item?");
  if (!confirmed) return;

  const { success, message } = await $fetch(
    `${BASE_URL}/${ENDPOINT}/${item.id}`,
    {
      method: "DELETE",
      body: buildPayload(),
    }
  );

  if (success) {
    await fetchData();
    alert(message || "Data deleted successfuly");
  } else {
    alert(message || "Data deleted failed");
  }
}

onMounted(async () => {
  await fetchData();
});
</script>

<template>
  <div class="w-full">
    <!-- Content -->
    <main class="flex-1 overflow-y-auto p-6">
      <div class="container mx-auto max-w-4xl">
        <section class="bg-white shadow p-6">
          <div class="flex justify-between">
            <h2 class="text-lg font-semibold mb-4">Daftar Kecamatan</h2>
            <button
              class="px-4 py-2 bg-green-400 text-white rounded-sm cursor-pointer transition hover:bg-green-100 hover:text-blue-400"
              @click="modal = !modal"
            >
              Tambah
            </button>
          </div>
          <table class="table-auto w-full">
            <thead>
              <tr>
                <th class="p-4 border-b">No</th>
                <th class="p-4 border-b">Kode</th>
                <th class="p-4 border-b">Nama Kecamatan</th>
                <th class="p-4 border-b">Active</th>
                <th class="p-4 border-b">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(formData, index) in listData" :key="formData.nama">
                <td class="p-4 border-b text-center">{{ index + 1 }}</td>
                <td class="p-4 border-b text-center">{{ formData.kode }}</td>
                <td class="p-4 border-b text-center">{{ formData.nama }}</td>
                <td class="p-4 border-b text-center">
                  <input disabled type="checkbox" :checked="formData.active" />
                </td>
                <td class="p-4 border-b text-center">
                  <div class="space-x-4">
                    <button
                      @click="handleEdit(formData)"
                      class="px-4 py-2 bg-blue-400 text-white rounded-sm cursor-pointer transition hover:bg-blue-100 hover:text-blue-400"
                    >
                      Edit
                    </button>
                    <button
                      @click="handleDelete(formData)"
                      class="px-4 py-2 bg-red-400 text-white rounded-sm cursor-pointer transition hover:bg-red-100 hover:text-red-400"
                    >
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </section>
      </div>
    </main>

    <!-- modal -->
    <div
      v-show="modal"
      class="absolute h-screen w-screen flex justify-center items-center top-0 left-0 z-[9999]"
    >
      <div class="w-[600px] bg-white shadow rounded-lg p-4">
        <div class="flex justify-between p-2 border-b">
          <h2 class="text-base/7 font-semibold">Tambah Data</h2>
          <button class="cursor-pointer font-bold" @click="modal = false">
            x
          </button>
        </div>
        <div class="flex p-2">
          <form
            action=""
            class="flex flex-col space-y-4 flex-1 mt-5"
            @submit.prevent="handleSubmit"
          >
            <div class="w-full">
              <label for="username" class="block text-sm/6 font-medium"
                >Kode</label
              >
              <input
                v-model="formData.kode"
                type="text"
                class="border border-gray-200 px-4 py-2 rounded-sm w-full"
              />
            </div>
            <div class="w-full">
              <label for="username" class="block text-sm/6 font-medium"
                >Nama</label
              >
              <input
                v-model="formData.nama"
                type="text"
                class="border border-gray-200 px-4 py-2 rounded-sm w-full"
              />
            </div>
            <div class="w-full">
              <label for="username" class="block text-sm/6 font-medium"
                >Active</label
              >
              <input
                v-model="formData.active"
                type="checkbox"
                class="border border-gray-200 p-4 rounded-sm"
              />
            </div>

            <div class="flex justify-end">
              <button
                type="submit"
                class="px-4 py-2 bg-green-400 text-white rounded-sm cursor-pointer transition hover:bg-green-100 hover:text-blue-400"
              >
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
