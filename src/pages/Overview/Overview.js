import React, { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";

import TourCard from "../../components/TourCard/TourCard";
import * as actionCreators from "../../store/actions";
const Overview = (props) => {
    const tours = useSelector((state) => state.tourState.tours);
    const dispatch = useDispatch();

    useEffect(() => {
        document.title = "Natours | Exciting tours for adventurous people";
    }, []);

    useEffect(() => {
        if (tours.length === 0) {
            dispatch(actionCreators.getTours());
        }
    }, [tours.length, dispatch]);

    return (
        <main className="main">
            <section className="card-container">
                {tours.map((tour) => (
                    <TourCard tour={tour} key={tour.id} />
                ))}
            </section>
        </main>
    );
};
export default Overview;
