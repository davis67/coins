import swal from "sweetalert2";

class Confirmation {
    confirm(text, title = "Are you sure?") {
        return new Promise((resolve = () => {}, reject = () => {}) => {
            swal.fire(
                    this.props({
                        text,
                        title,
                        type: "warning",
                        showCancelButton: true
                    })
                )
                .then(result => (result.value ? resolve() : null))
                .catch(error => reject(error));
        });
    }
    props(additions) {
        return {
            type: "info",
            confirmButtonText: "Yes",
            cancelButtonText: "No, cancel!",
            confirmButtonClass: "inline-block leading-tight bg-red-800 border border-red-800 hover:bg-red-700 focus:outline-none px-3 py-2 text-white no-underline shadow-md",
            cancelButtonClass: "ml-3 inline-block leading-tight bg-white border border-red-700 hover:text-red-600 px-3 py-2 text-red-800 no-underline shadow-md",
            buttonsStyling: false,
            ...additions
        };
    }
}

export {
    Confirmation
};
