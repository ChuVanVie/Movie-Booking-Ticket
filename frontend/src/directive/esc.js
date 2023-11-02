const esc = {
    mounted: (el, binding) => {
        el.escEvent = event => {
            // here I check that click was outside the el and his children
            if (!(el == event.target || el.contains(event.target))) {
                // and if it did, call method provided in attribute value
                binding.value();
            }
        };
        document.addEventListener("keydown", el.escEvent, true);
    },
    unmounted: el => {
        document.removeEventListener("keydown", el.escEvent, true);
    },
};

export default esc;