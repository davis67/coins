export default Vue.mixin({
    filters: {
        currency(value) {
            const number = +value;
            return number ? Number(number).toLocaleString() : value;
        }
    }
});
