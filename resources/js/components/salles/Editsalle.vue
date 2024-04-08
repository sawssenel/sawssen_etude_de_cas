<template>
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
        <h4 align="center">Edit Salle</h4>
        <form @submit.prevent="submitForm">
            <div class="form-group">
                <label for="reference">Libelle</label>
                <input
                    type="text"
                    class="form-control"
                    id="reference"
                    v-model="salle.libelle"
                />
            </div>
            <div class="form-group">
                <label for="designation">Adresse</label>
                <input
                    type="text"
                    class="form-control"
                    id="designation"
                    v-model="salle.adresse"
                />
            </div>
            <br />
            <div class="form-group">
                <button type="submit" className="btn btn-outline-primary">
                    <i class="fa-solid fa-floppy-disk"></i>Enregister
                </button>
                <button
                    type="button"
                    class="btn btn-outline-danger mx-2"
                    @click="cancelEdit"
                >
                    <i class="fa-solid fa-xmark"></i>Annuler
                </button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";

const router = useRouter();
const route = useRoute(); // Utilisez useRoute() pour accéder à l'objet de la route
const salle = ref({});
const id = route.params.id; // Accédez aux paramètres de la route via route.params

onMounted(async () => {
    try {
        const response = await axios.get(
            `http://localhost:8000/api/salles/${id}`
        );
        salle.value = response.data.data;
    } catch (error) {
        console.error(error);
    }
});

const submitForm = async () => {
    try {
        await axios.put(`http://localhost:8000/api/salles/${id}`, salle.value);
        router.push({ name: "Viewsalles" });
    } catch (error) {
        console.error(error);
    }
};
const cancelEdit = () => {
    router.push({ name: "Viewsalles" });
};
</script>

<style scoped>
/* Vos styles CSS pour la page d'édition */
</style>
