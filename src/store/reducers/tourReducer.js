import { updateObject } from "../../utils/utils";
import * as actionTypes from "../actions/actionTypes";

const initialState = {
    tours: [],
    selectedTour: null,
};

const getTours = (state, action) => {
    return updateObject(state, { tours: action.payload });
};

const reducer = (state = initialState, action) => {
    switch (action.type) {
        case actionTypes.GET_TOURS:
            return getTours(state, action);
        default:
            return state;
    }
};

export default reducer;
