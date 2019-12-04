class Errors {
    /**
     * Constructs the object.
     */
    constructor() {
        this.errors = {};
    }
    /**
     * clears the error fields
     *
     * @param      {string}  field   The field
     * @return     {boolean}
     */
    clear(field) {
        return field ? Vue.delete(this.errors, field) : (this.errors = {});
    }
    /**
     *  updates the errors
     *
     * @param      {Object}  errors
     * @return     {Object}  self
     */
    update(errors) {
        Vue.set(this, "errors", errors);
        Flash.error("Something went wrong! please try again")
        return this;
    }
    /**
     * determines if the errors object has a specific field
     *
     * @param      {string}  field   The field
     * @return     {boolean}
     */
    has(field) {
        return hasOwnProp(this.errors, field);
    }

    /**
     * first error of a given field
     *
     * @param      {string}  field
     * @return     {mixed}
     */
    first(field) {
        const error = this.get(field);

        if (Array.isArray(error) && error.length > 0) {
            return error[0];
        }
        if (typeof error == "object") {
            return error[0];
        }
        return error;
    }

    /**
     * gets the errors of a specid field
     *
     * @param      {string}  field
     * @return     {mixed}
     */
    get(field) {
        return this.has(field) ? this.errors[field] : null;
    }

    /**
     * determines if there are any errors
     *
     * @return     {boolean}
     */
    any() {
        return Object.keys(this.errors).length > 0;
    }
}

export default Errors;
