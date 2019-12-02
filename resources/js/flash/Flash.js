class Flash {
    static fire(icon, message, flashClass) {
        GlobalBus.$emit("flash-message", message, icon, flashClass);
    }

    static success(message) {
        Flash.fire("fa fa-check", message, "alert-success");
    }

    static error(message) {
        Flash.fire("fa fa-times", message, "alert-danger");

    }

    static info(message) {
        Flash.fire("fa fa-info", message, "alert-info");
    }
}

export default Flash;
