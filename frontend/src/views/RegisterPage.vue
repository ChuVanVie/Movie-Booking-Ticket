<script setup>

import { ref } from "vue";
// import VueDatePicker from "@vuepic/vue-datepicker";
// import TheLoading from "../components/TheLoading.vue";
import { useAuthStore } from "../store/useAuth";
// import { isValidEmail, isValidPassword } from "../common/validateForm";
import { toast } from "vue3-toastify";
// import { formatDateOfBirth } from "../common/formatDateTime";
import { useRouter } from "vue-router";

//
const authStore = useAuthStore();
const router = useRouter();
// Handle show password
const showPass = ref(false);
const handleClickShowPass = () => {
    showPass.value = !showPass.value;
};
const showConfirmPass = ref(false);
const handleClickShowConfirmPass = () => {
    showConfirmPass.value = !showConfirmPass.value;
};

// const customPosition = () => ({ top: 0 });
// Form Register
const firstName = ref("");
const lastName = ref("");
const email = ref("");
const dateOfBirth = ref("");
const password = ref("");
const cfPassword = ref("");

//Validate

const validateFormRegister = () => {
    if (
        !firstName.value ||
        !lastName.value ||
        !email.value ||
        !password.value ||
        !dateOfBirth.value
    ) {
        toast.error("Please enter all fields!");
        return true;
    }
    // else if (!isValidEmail(email.value)) {
    //     toast.error("Please enter correct email format!");
    //     return true;
    // } else if (!isValidPassword(password.value)) {
    //     toast.error("Password minimum 8 characters!");
    //     return true;
    // } 
    else if (cfPassword.value !== password.value) {
        toast.error("Password does not match!");

        return true;
    }
    return false;
};

const handleSubmitRegister = async () => {
    if (validateFormRegister()) {
        return;
    }
    try {
        await authStore.register({
            name: firstName.value + lastName.value,
            email: email.value,
            password: password.value,
            password_confirmation: cfPassword.value,
            // dob: formatDateOfBirth(dateOfBirth.value),
        });
        if (authStore.isRegister) {
            toast.success("Register successful!");
            setTimeout(() => {
                router.push("/auth/signup");
            }, 2000);
        }
    } catch (error) {
        toast.error("Register error!");
    }
};

</script>
<template>
    <!-- <div v-if="authStore.isLoading">
        <TheLoading />
    </div> -->
    <div id="signup-container">
        <div class="left-container">
            <p>Booking Movie Cinema for Everyone, Everywhere</p>
            <div class="img-container">
                <img src="../assets/cinemaImg.svg" alt="" class="t1">
                <img src="../assets/EllipseSignIn.png" alt="" class="t2">
            </div>
        </div>
        <div class="right-container">
            <img src="../assets/img/teeiv-cinema-logo.png" alt="" width="180" height="60">
            <div class="title">
                <h1>Create account</h1>
                <p>For business, band or celebrity.</p>
            </div>
            <form @submit.prevent="handleSubmitRegister" class="signup-form">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First name..."
                        v-model="firstName" />
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last name..."
                        v-model="lastName" />
                </div>
                <div class="form-group">
                    <label for="email">Email or phone number</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Ex: myanlien14@gmail.com"
                        v-model="email" />
                </div>
                <div class="form-group">
                    <label for="dob">Date of birth (MM/DD/YY)</label>
                    <input type="text" name="dob" id="dob" class="form-control" placeholder="Date of Birth..."
                        v-model="dateOfBirth" />
                </div>
                <!-- <div class="form-group">
                    <label for="dateOfBirth">Date of birth (MM/DD/YY)</label>
                    <VueDatePicker v-model="dateOfBirth" :alt-position="customPosition" placeholder="Date of Birth...">
                    </VueDatePicker>
                </div> -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="show-pass">
                        <input :type="showPass ? 'text' : 'password'" name="password" id="password" class="form-control"
                            placeholder="Password ..." v-model="password" />

                        <font-awesome-icon :icon="showPass ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"
                            @click="handleClickShowPass" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="cfpassword">Confirm password</label>
                    <div class="show-pass">
                        <input :type="showConfirmPass ? 'text' : 'password'" name="cfpassword" id="cfpassword"
                            class="form-control" placeholder="Confirm Password ..." v-model="cfPassword" />

                        <font-awesome-icon :icon="showConfirmPass ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'
                            " @click="handleClickShowConfirmPass" />
                    </div>
                </div>
                <button type="submit" class="signup-btn">Create Account</button>
            </form>
            <p class="no-account">
                Allready have a account?
                <router-link to="/auth/login">Sign Up</router-link>
            </p>
        </div>
    </div>
</template>

<style scoped>
#signup-container {
    background-color: #e6e6e6;
    display: flex;
}

.left-container {
    max-width: 40%;
    overflow: hidden;
    width: 100%;
    height: 100vh;
    padding: 40px 100px;
    background: linear-gradient(90deg, rgb(0, 45, 255) 0%, rgb(0, 188, 212) 47%, rgb(0, 188, 212) 48%, rgb(130, 238, 198) 100%);
}

.left-container p {
    color: #fff;
    text-align: center;
    font-size: 28px;
    font-style: normal;
    font-weight: bold;
    letter-spacing: -0.56px;
    margin-bottom: 40px;
}

.left-container .img-container {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.img-container .t1 {
    position: absolute;
    z-index: 1;
    left: 50%;
    transform: translateX(-50%);
    object-fit: cover;
    width: 400px;
}

.img-container .t2 {
    width: 500px;
    height: 500px;
    object-fit: cover;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border-radius: 50%;
}

.right-container {
    max-width: 60%;
    width: 100%;
    padding: 40px;
}

.right-container .title {
    margin-top: 20px;
    margin-bottom: 40px;
}

.title h1 {
    color: #1d1d1d;
    font-size: 36px;
    font-style: normal;
    font-weight: 700;
    line-height: 140%;
    letter-spacing: -0.56px;
}

.title p {
    color: #2d3748;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 140%;
    letter-spacing: -0.28px;
}

.signup-form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px 50px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.form-group label {
    color: #2d3748;
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: 140%;
    letter-spacing: -0.28px;
}

.form-group input {
    border-radius: 5px;
    padding: 12px 15px;
    font-size: 15px;
    border: 1px solid #d1d1d1;
    outline: none;
    width: 100%;
}


.form-group .show-pass {
    position: relative;
    display: flex;
    align-items: center;
}

.form-group .show-pass svg {
    position: absolute;
    right: 20px;
    font-size: 17px;
    cursor: pointer;
}

.signup-btn {
    max-width: 60%;
    margin-top: 20px;
    color: #fff;
    background: #007aff;
    font-size: 16px;
    font-style: normal;
    font-weight: 700;
    text-transform: capitalize;
    cursor: pointer;
    line-height: normal;
    letter-spacing: -0.28px;
    padding: 20px;
    outline: none;
    border: none;
    border-radius: 5px;
    background: linear-gradient(90deg, rgb(40, 40, 43) 0%, rgb(20, 15, 190) 18%, rgb(50, 127, 137) 59%, rgb(20, 15, 190) 100%);
}

.signup-btn:hover {
    background: linear-gradient(90deg,
            rgba(19, 0, 255, 1) 0%,
            rgba(0, 188, 212, 1) 50%,
            rgba(43, 46, 160, 1) 100%);
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

.no-account {
    display: block;
    width: 100%;
    text-align: center;
    margin-top: 50px;
    font-size: 20px;
    font-weight: 500;
}

.no-account a {
    color: #007aff;
    font-size: 20px;
    font-weight: 500;
    text-decoration: none;
}
</style>