<template>
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
        <h4 align="center">Ajout Spectacle</h4>
        <form @submit.prevent="addSpectacle">
            <div class="row">
                <div class="col-md-6">
                    <label for="piece" class="form-label">Pièce</label>
                    <select class="form-control" v-model="spectacle.piece_id">
                        <option v-for="piece in pieces" :key="piece.id" :value="piece.id">{{ piece.titre }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="salle" class="form-label">Salle</label>
                    <select class="form-control" v-model="spectacle.salle_id">
                        <option v-for="salle in salles" :key="salle.id" :value="salle.id">{{ salle.libelle }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="date_spectacle" class="form-label">Date du Spectacle</label>
                    <input type="date" class="form-control" id="date_spectacle" v-model="spectacle.date_spectacle">
                </div>
            </div>
            <br />
            <button type="submit" class="btn btn-outline-primary">
                <i class="fa-solid fa-floppy-disk"></i> Enregistrer
            </button>
            <router-link to="/listsal" class="btn btn-outline-danger mx-2">
                <i class="fa-solid fa-xmark"></i> Annuler
            </router-link>
        </form>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

const router = useRouter();

const spectacle = ref({
    piece_id: "",
    salle_id: "",
    date_spectacle: "",
});

const pieces = ref([]);
const salles = ref([]);

const getPièces = async () => {
    try {
        const response = await axios.get("http://localhost:8000/api/pieces");
        pieces.value = response.data;
        console.log(pieces.value)
    } catch (error) {
        console.error(error);
    }
};

const getSalles = async () => {
    try {
        const response = await axios.get("http://localhost:8000/api/salles");
        salles.value = response.data.data;
        console.log(salles.value)
    } catch (error) {
        console.error(error);
    }
};

const addSpectacle = async () => {
    try {
        await axios.post("http://localhost:8000/api/spectacles", spectacle.value);
        window.alert("Ajout avec succès !");
    router.push({ name: "Viewspectacles" })
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    getPièces();
    getSalles();
});
</script>

<style scoped></style>
