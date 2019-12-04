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
            confirmButtonClass: "inline-block leading-tight bg-blue-700 border border-blue-700 hover:bg-blue-700 px-3 py-2 text-white no-underline shadow-md",
            cancelButtonClass: "ml-3 inline-block leading-tight bg-red-700 border border-red-700 hover:bg-red-500 px-3 py-2 text-white no-underline shadow-md",
            buttonsStyling: false,
            ...additions
        };
    }
}

export {
    Confirmation
};
