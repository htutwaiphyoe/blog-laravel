import * as actionTypes from "./actionTypes";
import natours from "../../api/natours";

const getToursSync = (payload) => {
    return {
        type: actionTypes.GET_TOURS,
        payload,
    };
};

export const getTours = () => async (dispatch) => {
    try {
        const response = await natours.get("/api/v1/tours");
        dispatch(getToursSync(response.data.data.data));
    } catch (e) {
        console.log(e.response);
    }
};

export const getTourSync = (payload) => {
    return {
        type: actionTypes.GET_TOUR,
        payload,
    };
};

export const getTour = (slug) => async (dispatch) => {
    try {
        const response = await natours.get(`/api/v1/tours/${slug}`);
        dispatch(getTourSync(response.data.data.data));
    } catch (e) {
        console.log(e.response);
    }
};

export const clearTour = () => {
    return {
        type: actionTypes.CLEAR_TOUR,
    };
};
