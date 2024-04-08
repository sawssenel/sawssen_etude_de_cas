<template>
    <div>
        <div v-if="isLoading">
            <h2>Loading ....</h2>
        </div>
        <div v-else class="py-6">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <div class="container-fluid">
                    <router-link
                        :to="{ name: 'Addspectacle' }"
                        class="btn btn-outline-light"
                    >
                        New Spectacle
                    </router-link>
                   
                </div>
            </nav>
            <table class="table table-striped shadow">
                <thead>
                    <tr>
                        <th scope="col">Piece</th>
                        <th scope="col">Salle</th>
                        <th scope="col">Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="spec in spectacles" :key="spec.id">
                        <td>{{ getPieceTitle(spec.piece_id) }}</td> 
                        <td>{{ getSalleLibelle(spec.salle_id) }}</td>
                        <td>{{ spec.date_spectacle }}</td>
                        <td>
                            <button
                                class="btn btn-outline-primary mx-2"
                                @click="editSpectacle(spec)"
                            >
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </button>
                            <button
                                class="btn btn-outline-danger mx-2"
                                @click="deleteSpectacle(spec.id)"
                            >
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();
const spectacles = ref([]);
const isLoading = ref(true);
const pieces = ref([]); // Define pieces
const salles = ref([]); // Define salles

const editSpectacle = (spec) => {
    router.push({ name: "Editspectacle", params: { id: spec.id } });
};

const getSpectacles = async () => {
    try {
        const response = await axios.get(
            "http://localhost:8000/api/spectacles"
        );
        spectacles.value = response.data.spectacles;
        console.log("ddd", spectacles.value);
        isLoading.value = false;
    } catch (error) {
        console.error(error);
    }
};

const deleteSpectacle = async (id) => {
    if (window.confirm("Are you sure you want to delete?")) {
        try {
            await axios.delete(`http://localhost:8000/api/spectacles/${id}`);
            getSpectacles();
        } catch (error) {
            console.error(error);
        }
    }
};

const getPieceTitle = (pieceId) => {
    const piece = pieces.value.find((piece) => piece.id === pieceId);
    return piece ? piece.titre : "";
};

const getSalleLibelle = (salleId) => {
    const salle = salles.value.find((salle) => salle.id === salleId);
    return salle ? salle.libelle : "";
};

onMounted(() => {
    getSpectacles();
    axios
        .get("http://localhost:8000/api/pieces")
        .then((response) => {
            pieces.value = response.data;
        })
        .catch((error) => {
            console.error(error);
        });

    axios
        .get("http://localhost:8000/api/salles")
        .then((response) => {
            salles.value = response.data.data;
        })
        .catch((error) => {
            console.error(error);
        });
});
</script>

<style scoped></style>
