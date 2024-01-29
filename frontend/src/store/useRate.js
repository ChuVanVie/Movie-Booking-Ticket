import { defineStore } from "pinia";
import axios from "axios";
import { baseURL } from "../helper/baseURL"

export const useRateStore = defineStore("rate", {
    state: () => ({
        errMsg: "",
        isRateSuccess: false,
        isLoading: false,
    }),
    actions: {
        async createNewRate({ movieId, star, comment, token }) {
            try {
                this.isLoading = true;
                const formData = new FormData();
                formData.append("movie_id", movieId);
                formData.append("star", star);
                formData.append("comment", comment);
                const response = await axios.post(
                    baseURL + `rates/new-rating`,
                    formData,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    }
                );
                if (response.status === 201) {
                    this.isRateSuccess = true;
                }
            } catch (error) {
                this.isRateSuccess = false;
                this.errMsg = error.response.data;
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
    },
});
