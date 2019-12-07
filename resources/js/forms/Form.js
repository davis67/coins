import Errors from "./Errors";
class Form {
    /**
     * Constructs the object.
     *
     * @param      {fields}  fields
     */
    constructor(fields = {}) {
        this.fields = fields;
        for (let field in fields) {
            this[field] = fields[field];
        }
        this.errors = new Errors();
    }
    /**
     * submits the form
     *
     * @param      {string}    url
     * @param      {string}  method  The method
     * @param      {Object}    data    The data
     * @return     {Promise}
     */
    submit(url, method, data = {}) {
        this.isSubmitting = true;

        return new Promise((resolve = () => {}, reject = () => {}) => {
            axios[method](url, data)
                .then(response => {
                    resolve(response);
                    this.onSuccess();
                })
                .catch(errors => {
                    reject(errors);
                    this.onFail(errors);
                });
        });
    }
    /**
     * triggers this method when the form has been successfully submitted
     */
    onSuccess() {
        this.isSubmitting = false;
        this.reset();
    }
    /**
     * trigger on submission failure
     *
     * @param      {Object}  errors  The errors
     */
    onFail(errors) {
        this.isSubmitting = false;
        errors = errors.response.data;
        if (hasOwnProp(errors, "errors")) {
            errors = errors.errors;
        }
        this.errors.update(errors);
    }
    /**
     * resets the form
     */
    reset() {
        for (const field in this.fields) {
            this[field] = "";
        }
        this.errors.clear();
    }

    post(url) {

        return this.submit(url, "post", this.data());
    }

    put(url, data) {
        return this.submit(url, "put", this.data());
    }
    data() {
        let data = Object.assign({}, this);
        delete data["errors"];
        delete data["fields"];
        delete data["isSubmitting"];
        return data;
    }

    delete(url) {
        return this.submit(url, "delete");
    }
    updateField(field, value) {
        this.fields[field] = value;
        this[field] = value;
        // console.log("fields", this.fields)
        return this;
    }
}

export default Form;
