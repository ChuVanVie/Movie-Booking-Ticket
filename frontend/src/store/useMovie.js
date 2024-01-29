import { defineStore } from "pinia";
import axios from "axios";
import { baseURL } from "../helper/baseURL"

export const useMovieStore = defineStore("movie", {
    state: () => ({
        allMovie: [],
        detailMovie: "",
        searchResults: [],
        movieChoosed: "",
        isLoading: false,
    }),
    actions: {
        async getAllMovie() {
            try {
                this.isLoading = true;
                const response = await axios.get(
                    baseURL + `movies`
                );
                this.allMovie = response.data.data;
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },

        async getDetailMovie(id) {
            try {
                this.isLoading = true;
                const response = await axios.get(
                    baseURL + `movies/${id}`
                );
                this.detailMovie = response.data.data;
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },

        async searchMovie({ name, country, category }) {
            try {
                this.isLoading = true;
                const response = await axios.get(
                    baseURL + `search/movies?name=${name}&country=${country}&category=${category}`
                );
                if (response.status === 200) {
                    this.searchResults = response.data.data;
                }
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
        setMovieData(data) {
            this.movieChoosed = data;
        },
        getMovieData() {
            return this.movieChoosed;
        }
    },
});
