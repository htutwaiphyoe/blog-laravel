import React, { useState, useEffect, useCallback } from "react";

import natours from "../../api/natours";
import TourCard from "../../components/TourCard/TourCard";
const Overview = (props) => {
    const [tours, setTours] = useState([]);

    const fetchTours = useCallback(async () => {
        const response = await natours.get("/api/v1/tours");
        setTours(response.data.data.data);
    }, []);

    useEffect(() => {
        if (tours.length === 0) {
            fetchTours();
        }
    }, [tours.length, fetchTours]);

    return (
        <section className="card-container">
            {tours.map((tour) => (
                <TourCard tour={tour} key={tour.id} />
            ))}
        </section>
    );
};
export default Overview;
