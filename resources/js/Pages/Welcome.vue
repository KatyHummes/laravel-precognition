<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from 'laravel-precognition-vue-inertia';


const form = useForm('post', '/store', {
    name: '',
    creation: '',
    phone: '',
    corescolhida: '',
    gender: '',
    file: '',
});

const submit = () => form.submit({
    preserveScroll: true,
    onSuccess: () => form.reset(),
});
</script>

<template>
    <div class="container mx-auto grid grid-flow-row rounded-2xl mt-24 bg-gray-200">
        <form @submit.prevent="submit">

            <div class="my-4">
                <label for="name">Nome</label>
                <input type="text" id="name" v-model="form.name" @change="form.validate('name')"
                    class="border-none rounded-2xl m-2">
                <div v-if="form.invalid('name')" class="text-red-500 font-semibold">
                    {{ form.errors.name }}
                </div>
            </div>
            
            <div class="my-4">
                <label for="creation">Data de Criação</label>
                <input type="date" id="creation" v-model="form.creation" @change="form.validate('creation')"
                    class="border-none rounded-2xl m-2">
                <div v-if="form.invalid('creation')" class="text-red-500 font-semibold">
                    {{ form.errors.creation }}
                </div>
            </div>

            <div class="my-4">
                <label for="phone">Telefone</label>
                <input type="tel" id="phone" v-model="form.phone" @change="form.validate('phone')"
                    class="border-none rounded-2xl m-2">
                <div v-if="form.invalid('phone')" class="text-red-500 font-semibold">
                    {{ form.errors.phone }}
                </div>
            </div>

            <div class="my-4">
                <label for="corescolhida">Escolha uma cor:</label>
                <input type="color" id="corescolhida" @change="form.validate('corescolhida')" class="">
                <div v-if="form.invalid('corescolhida')" class="text-red-500 font-semibold">
                    {{ form.errors.name }}
                </div>
            </div>

            <div class="my-4">
                <label for="gender">Gênero</label>
                <select id="gender" v-model="form.gender" @change="form.validate('gender')"
                    class="border-none rounded-2xl m-2">
                    <option disabled value="">Selecione uma opção</option>
                    <option>Masculino</option>
                    <option>Feminino</option>
                    <option>Outro</option>
                </select>
                <div v-if="form.invalid('gender')" class="text-red-500 font-semibold">
                    {{ form.errors.gender }}
                </div>
            </div>

            <div class="my-4">
                <label for="file">Upload de Arquivo</label>
                <input type="file" id="file" @change="handleFileUpload($event)" class="border-none rounded-2xl m-2">
            </div>

            <button type="submit"
                class="font-semibold text-green-400  hover:bg-green-500 hover:text-white rounded-2xl p-2">Salvar</button>
            <button type="reset"
                class="font-semibold text-red-400 m-4 hover:bg-red-500 hover:text-white rounded-2xl p-2">Cancelar</button>
        </form>
    </div>
</template>