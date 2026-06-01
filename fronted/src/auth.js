import { ref } from "vue";

export const loggedin= ref(!!localStorage.getItem('token')) 