import { defineStore } from "pinia";
import axios from "axios";
import { baseURL } from "../helper/baseURL"

export const useReservationStore = defineStore("reservation", {
    state: () => ({
        allReservation: [],
        detailReservation: "",
        isCreatedSuccess: false,
        errMsg: "",
        isLoading: false,
    }),
    actions: {
        async getAllReservation(token) {
            try {
                this.isLoading = true;
                const response = await axios.get(
                    baseURL + `reservations`,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    }
                );
                this.allReservation = response.data.data;
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
        async getDetailReservation({ reservationId, token }) {
            try {
                this.isLoading = true;
                const response = await axios.get(
                    baseURL + `reservations/${reservationId}`,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    }
                );
                this.detailReservation = response.data.data;
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
        async createNewReservation({ showtimeId, seatIds, token }) {
            try {
                this.isLoading = true;
                const formData = new FormData();
                formData.append("showtime_id", showtimeId);
                // formData.append("seat_ids", seatIds);
                seatIds.forEach(id => formData.append('seat_ids[]', id));
                const response = await axios.post(
                    baseURL + `reservations/new-reservation`,
                    formData,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                    }
                );
                if (response.status === 201) {
                    this.isCreatedSuccess = true;
                }
            } catch (error) {
                this.isCreatedSuccess = false;
                this.errMsg = error.response.data;
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
    },
});