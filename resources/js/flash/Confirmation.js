import swal from "sweetalert2";

class Confirmation {
    confirm(text, title = "Are you sure?") {
        return new Promise((resolve = () => {}, reject = (error) = {}) => {
            swal.fire(this.props({
                    text,
                    title,
                    type: "warning",
                    showCancelButton: true
                })
                .then(result => (result.value ? resolve() : null))
                .catch(error => reject(error))
            )
        });
    }

    props(additions) {
        return {
            type: "info",
            confirmationText: "Okay",
            cancelButtonText: "No, cancel!",
            cancelButtonClass: "btn btn-danger",
            confirmButtonClass: "btn btn-primary",
            buttonsStyling: false,
            ...additions
        };
    }
}

export {
    Confirmation
};
