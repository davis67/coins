class Flash {
    static fire(message, flashClass) {
        GlobalBus.$emit("flash-message", message, flashClass);
    }
    static success(message) {
        Flash.fire(message, "bg-green-100 border border-green-400 text-green-700");
    }

    static error(message) {
        Flash.fire(message, "bg-red-100 border border-red-400 text-red-700");
    }

    static info(message) 
    {
        Flash.fire(message, "alert-info");
    }
}

export default Flash;
