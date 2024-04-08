<template>
    <div>
        <div v-if="isLoading">
            <h2>Loading ....</h2>
        </div>
        <div v-else class="py-6">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <div class="container-fluid">
                    <router-link
                        :to="{ name: 'Addsalle' }"
                        class="btn btn-outline-light"
                    >
                        New Salle
                    </router-link>
                </div>
            </nav>
           
            <table class="table table-striped shadow">
                <thead>
                    <tr>
                        <th scope="col">Libellé</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="sal in salles" :key="sal.id">
                        <td>{{ sal.libelle }}</td>
                        <td>{{ sal.adresse }}</td>

                        <td>
                            <button
                                class="btn btn-outline-primary mx-2"
                                @click="editSalle(sal)"
                            >
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit
                            </button>
                        </td>
                        <td>
                            <button
                                class="btn btn-outline-danger mx-2"
                                @click="deletesalle(sal.id)"
                            >
                                <i class="fa-solid fa-trash-can"></i>
                                Delete
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
const salles = ref([]);
const isLoading = ref(true);
const editSalle = (sal) => {
    router.push({ name: "Editsalle", params: { id: sal.id } });
};

const getsalles = async () => {
    await axios
        .get("http://localhost:8000/api/salles")
        .then((res) => {
            salles.value = res.data.data;
            console.log(salles.value);
            isLoading.value = false;
        })
        .catch((error) => {
            console.log(error);
        });
};
onMounted(() => {
    getsalles();
});
const deletesalle = async (id) => {
    if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
        try {
            await axios.delete(`http://localhost:8000/api/salles/${id}`);
            getsalles();
        } catch (error) {
            console.log(error);
        }
    }
};
</script>
<style lang="scss" scoped></style>
