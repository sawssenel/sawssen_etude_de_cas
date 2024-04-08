<template>
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
        <h4 align="center">Ajout Salle</h4>
        <form @submit.prevent="addSalle">
            <div class="row">
                <div class="col-md-6">
                    .
                    <label for="reference" class="form-label">Libellé</label>
                    <input
                        type="text"
                        class="form-control"
                        id="reference"
                        v-model="salle.libelle"
                    />
                </div>
                <div class="col-md-6 ms-auto">
                    <label for="designation" class="form-label">Adresse</label>
                    <input
                        type="texte"
                        class="form-control"
                        id="designation"
                        v-model="salle.adresse"
                    />
                </div>
            </div>

            <br />
            <button type="submit" className="btn btn-outline-primary">
                <i class="fa-solid fa-floppy-disk"></i>Enregister
            </button>
            <router-link to="/listsal" class="btn btn-outline-danger mx-2">
                <i class="fa-solid fa-xmark"></i>Cancel
            </router-link>
        </form>
    </div>
</template>
<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
import axios from "axios";
const salle = ref({
    libelle: "",
    adresse: "",
});

const addSalle = async () => {
    await axios
        .post("http://localhost:8000/api/salles/", salle.value)
        .then(() => router.push({ name: "Viewsalles" }))
        .catch((err) => console.log(err));
};
</script>
<style scoped></style>
