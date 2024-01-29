import { defineStore } from "pinia";
import axios from "axios";
import { baseURL } from "../helper/baseURL"

export const useShowtimeStore = defineStore("showtime", {
    state: () => ({
        allShowtime: [],
        detailShowtime: "",
        allSeats: [],
        isLoading: false,
    }),
    actions: {
        async getAllShowtime(movieId, cinemaId, time) {
            try {
                this.isLoading = true;
                const response = await axios.get(
                    baseURL + `showtimes?movieId=` + movieId + `&cinemaId=` + cinemaId + `&time=` + time
                );
                this.allShowtime = response.data.data;
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
        async getDetailShowtime(showtimeId) {
            try {
                this.isLoading = true;
                const response = await axios.get(
                    baseURL + `showtimes/${showtimeId}`
                );
                this.detailShowtime = response.data.data;
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
        async getAllSeats(showtimeId, token) {
            try {
                this.isLoading = true;
                const response = await axios.get(
                    baseURL + `showtimes/${showtimeId}/seats`,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    }
                );
                this.allSeats = response.data.data;
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
    },
});
