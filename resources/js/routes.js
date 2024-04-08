import Viewsalles from "./components/salles/Viewsalles.vue";
import Addsalle from "./components/salles/Addsalle.vue";
import Editsalle from "./components/salles/Editsalle.vue";

/*import Viewpieces from "./components/pieces/Viewpieces.vue";
import Addpiece from "./components/pieces/Addpiece.vue";
import Editpiece from "./components/pieces/Editpiece.vue";*/

import Viewspectacles from "./components/spectacles/Viewspectacles.vue";
import Addspectacle from "./components/spectacles/Addspectacle.vue";

export const routes = [
  {
    name: "Viewsalles",
    path: "/Viewsalles",
    component: Viewsalles
  },
  {
    name: "Addsalle",
    path: "/addsalle",
    component: Addsalle
  },
  {
    name: "Editsalle",
    path: "/editsalle/:id",
    component: Editsalle
  },
  /*{
    name: "Viewpieces",
    path: "/viewpieces",
    component: Viewpieces
  },
  {
    name: "Addpiece",
    path: "/addpiece",
    component: Addpiece
  },
  {
    name: "Editpiece",
    path: "/editpiece/:id",
    component: Editpiece
  },*/
  {
    name: "Viewspectacles",
    path: "/listspec",
    component: Viewspectacles,
},
  {
    name: "Addspectacle",
    path: "/addspectacle",
    component: Addspectacle
  }
];