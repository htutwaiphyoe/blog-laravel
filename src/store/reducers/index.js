import { combineReducers } from "redux";

import tourReducer from "./tourReducer";

export default combineReducers({
    tourState: tourReducer,
});
