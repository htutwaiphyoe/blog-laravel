import axios from "axios";

let instance;

if (process.env.NODE_ENV === "development") {
    instance = axios.create({
        baseURL: "http://localhost:8000",
    });
}

export default instance;
