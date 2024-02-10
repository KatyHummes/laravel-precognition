<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from 'laravel-precognition-vue-inertia';
import { ref } from 'vue';
import { reactive, onMounted } from 'vue';


const form = useForm('post', '/store', {
    name: '',
    creation: '',
    phone: '',
    color: '',
    gender: '',
    file: '',
});

const submit = () => form.submit({
    preserveScroll: true,
    onSuccess: () => form.reset(),
});

const imagePreviewUrl = ref(null);

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (!file) return;

    const validTypes = ['image/png', 'image/jpeg', 'image/jpg'];
    if (!validTypes.includes(file.type)) {
        alert('Tipo de arquivo inválido. Apenas PNG, JPG e JPEG são aceitos.');
        return;
    }

    const maxSizeInBytes = 6 * 1024 * 1024; 
    if (file.size > maxSizeInBytes) {
        alert('O arquivo é muito grande. O tamanho máximo permitido é de 6 MB.');
        return;
    }

    imagePreviewUrl.value = URL.createObjectURL(file);

    form.file = file;
};

onMounted(() => {
    form.color = form.color || '#ffffff';
});
</script>

<template>
    <div class="container mx-auto  rounded-2xl my-24  bg-gray-100">
        <form @submit.prevent="submit">

            <div class="grid md:grid-cols-3 gap-10 p-4">
                <div class="my-4 flex flex-col">
                    <label for="name">Nome</label>
                    <input type="text" id="name" v-model="form.name" @change="form.validate('name')"
                        class="rounded-2xl p-2 border border-gray-200 hover:border-purple-500">
                    <div v-if="form.invalid('name')" class="text-red-500 font-semibold">
                        {{ form.errors.name }}
                    </div>
                </div>

                <div class="my-4 flex flex-col">
                    <label for="creation">Data de Criação</label>
                    <input type="date" id="creation" v-model="form.creation" @change="form.validate('creation')"
                        class="rounded-2xl p-2 border border-gray-200 hover:border-purple-500">
                    <div v-if="form.invalid('creation')" class="text-red-500 font-semibold">
                        {{ form.errors.creation }}
                    </div>
                </div>

                <div class="my-4 flex flex-col">
                    <label for="phone">Telefone</label>
                    <input type="tel" id="phone" v-model="form.phone" @change="form.validate('phone')"
                        class="rounded-2xl p-2 border border-gray-200 hover:border-purple-500">
                    <div v-if="form.invalid('phone')" class="text-red-500 font-semibold">
                        {{ form.errors.phone }}
                    </div>
                </div>

                <div class="my-4 flex flex-col">
                    <label for="color">Escolha uma cor:</label>
                    <input type="color" v-model="form.color" @change="form.validate('color')"
                        class="rounded-2xl border border-2">
                    <div v-if="form.invalid('color')" class="text-red-500 font-semibold">
                        {{ form.errors.color }}
                    </div>
                </div>

                <div class="my-4 flex flex-col">
                    <label for="gender">Gênero</label>
                    <select id="gender" v-model="form.gender" @change="form.validate('gender')"
                        class="rounded-2xl p-2 border border-gray-200 hover:border-purple-500">
                        <option disabled value="">Selecione uma opção</option>
                        <option>Masculino</option>
                        <option>Feminino</option>
                        <option>Outro</option>
                    </select>
                    <div v-if="form.invalid('gender')" class="text-red-500 font-semibold">
                        {{ form.errors.gender }}
                    </div>
                </div>

                <div class="my-4 flex flex-col">
                    <label for="file">Upload de Arquivo</label>
                    <input type="file" id="file" @change="handleFileUpload($event)" class="rounded-2xl">
                    <div v-if="imagePreviewUrl">
                        <img :src="imagePreviewUrl" alt="Image preview" class="max-w-xs mt-4">
                    </div>
                </div>
            </div>
            <div class="flex justify-around">
                <button type="reset"
                    class="font-semibold text-red-400 border border-gray-100 hover:border-red-400 hover:border-2 rounded-2xl p-2 m-3">Cancelar</button>
                <button type="submit"
                    class="font-semibold text-green-400 border border-gray-100 hover:border-green-400 hover:border-2 rounded-2xl p-2 m-3">Salvar</button>
            </div>
        </form>
    </div>
</template>