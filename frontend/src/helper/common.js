const commonJS = {

    formatNumber: function (number) {
        try {
            return `${number},00`;
        } catch (error) {
            return "";
        }
    },
}
export default commonJS