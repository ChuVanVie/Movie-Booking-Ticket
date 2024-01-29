import { defineStore } from "pinia";
import axios from "axios";
import { baseURL } from "../helper/baseURL"

export const useCinemaStore = defineStore("cinema", {
    state: () => ({
        allCinema: [],
        infoCinema: "",
        isLoading: false,
    }),
    actions: {
        async getAllCinema() {
            try {
                this.isLoading = true;
                const response = await axios.get(
                    baseURL + `cinemas`
                );
                this.allCinema = response.data.data;
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },

        async getInfoCinema(id) {
            try {
                this.isLoading = true;
                const response = await axios.get(
                    baseURL + `cinemas/${id}`
                );
                this.infoCinema = response.data.data;
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
    },
});
