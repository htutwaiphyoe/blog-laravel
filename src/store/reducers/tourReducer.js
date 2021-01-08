import { updateObject } from "../../utils/utils";
import * as actionTypes from "../actions/actionTypes";

const initialState = {
    tours: [],
    selectedTour: null,
};

const getTours = (state, action) => {
    return updateObject(state, { tours: action.payload });
};

const getTour = (state, action) => {
    return updateObject(state, { selectedTour: action.payload });
};

const clearTour = (state, action) => {
    return updateObject(state, { selectedTour: null });
};

const reducer = (state = initialState, action) => {
    switch (action.type) {
        case actionTypes.GET_TOURS:
            return getTours(state, action);
        case actionTypes.GET_TOUR:
            return getTour(state, action);
        case actionTypes.CLEAR_TOUR:
            return clearTour(state, action);
        default:
            return state;
    }
};

export default reducer;
