import { defineStore } from "pinia";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
    state: () => ({
        userLogin: {},
        accessToken: "",
        isLoggedIn: false,
        isLoading: false,
        isRegister: false,
        isChangePass: false,
    }),
    actions: {
        async login({ email, password }) {
            try {
                this.isLoading = true;

                const formData = new FormData();
                formData.append("email", email);
                formData.append("password", password);

                const response = await axios.post(
                    "http://localhost:8000/api/auth/login",
                    formData
                );

                if (response.status === 200) {
                    this.userLogin = response?.data?.user;
                    this.isLoggedIn = true;
                    this.accessToken = response.data.access_token;
                }
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
        async register({ name, email, password, password_confirmation, dob }) {
            try {
                this.isLoading = true;

                const formData = new FormData();
                formData.append("name", name);
                formData.append("email", email);
                formData.append("password", password);
                formData.append("password_confirmation", password_confirmation);
                formData.append("dob", dob);

                const response = await axios.post(
                    "http://localhost:8000/api/auth/register",
                    formData
                );
                if (response.status === 200) {
                    this.isRegister = true;
                }
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },

        async changePassword({
            old_password,
            new_password,
            new_password_confirmation,
            token,
        }) {
            try {
                this.isLoading = true;

                const formData = new FormData();
                formData.append("old_password", old_password);
                formData.append("new_password", new_password);
                formData.append("new_password_confirmation", new_password_confirmation);

                const response = await axios.post(
                    "http://localhost:8000/api/auth/change-password",
                    formData,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    }
                );

                if (response.status === 201) {
                    this.isChangePass = true;
                }
            } catch (error) {
                console.error(error);
            } finally {
                this.isLoading = false;
            }
        },
        async logout({ token }) {
            try {
                this.isLoading = true;
                await axios.post("http://localhost:8000/api/auth/logout", null, {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });
                this.userLogin = {};
                this.accessToken = "";
                this.isLoggedIn = false;
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        },
    },
    persist: {
        enabled: true,
        strategies: [
            {
                storage: localStorage,
                paths: ["accessToken", "isLoggedIn", "userLogin"],
            },
        ],
    },
});
