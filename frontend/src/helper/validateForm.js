export const isValidEmail = (email) => {
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return emailRegex.test(email);
};

export const isValidPhoneNumber = (phoneNumber) => {

    const phoneRegex = /^(0|\+84)\d{9}$/;

    return phoneRegex.test(phoneNumber);
};

export const isValidPassword = (password) => {
    return password.length >= 8;
};