import React, { useState, useEffect, useCallback } from "react";
import { useParams } from "react-router-dom";

import natours from "../../api/natours";
import { formatDate } from "../../utils/utils";
import icons from "../../assets/img/icons.svg";

const Detail = (props) => {
    const [tour, setTour] = useState(null);
    const { slug } = useParams();
    const fetchTour = useCallback(async () => {
        const response = await natours.get(`/api/v1/tours/${slug}`);
        setTour(response.data.data.data);
    }, [slug]);
    useEffect(() => {
        if (!tour) {
            fetchTour();
        }
    }, [tour, fetchTour]);
    if (tour) {
        return (
            <div>
                <section className="section-header">
                    <div class="header__hero">
                        <div class="header__hero-overlay">&nbsp;</div>
                        <img
                            class="header__hero-img"
                            src={require(`./../../assets/img/tours/${tour.imageCover}`).default}
                            alt={tour.name}
                        />
                    </div>
                    <div className="heading-box">
                        <h1 className="heading-primary">
                            <span>{tour.name}</span>
                        </h1>
                        <div className="heading-box__group">
                            <div className="heading-box__detail">
                                <svg className="heading-box__icon">
                                    <use xlinkHref={`${icons}#icon-clock`}></use>
                                </svg>
                                <span className="heading-box__text">{tour.duration} days</span>
                            </div>
                            <div className="heading-box__detail">
                                <svg className="heading-box__icon">
                                    <use xlinkHref={`${icons}#icon-map-pin`}></use>
                                </svg>
                                <span className="heading-box__text">
                                    {tour.startLocation.description}
                                </span>
                            </div>
                        </div>
                    </div>
                </section>

                <section className="section-description">
                    <div className="overview-box">
                        <div>
                            <div className="overview-box__group">
                                <h2 className="heading-secondary ma-bt-lg">Quick facts</h2>
                                <div className="overview-box__detail">
                                    <svg className="overview-box__icon">
                                        <use xlinkHref={`${icons}#icon-calendar`}></use>
                                    </svg>
                                    <span className="overview-box__label">Next date</span>
                                    <span className="overview-box__text">
                                        {formatDate(new Date(tour.startDates[0]))}
                                    </span>
                                </div>
                                <div className="overview-box__detail">
                                    <svg className="overview-box__icon">
                                        <use xlinkHref={`${icons}#icon-trending-up`}></use>
                                    </svg>
                                    <span className="overview-box__label">Difficulty</span>
                                    <span className="overview-box__text">{tour.difficulty}</span>
                                </div>
                                <div className="overview-box__detail">
                                    <svg className="overview-box__icon">
                                        <use xlinkHref={`${icons}#icon-user`}></use>
                                    </svg>
                                    <span className="overview-box__label">Participants</span>
                                    <span className="overview-box__text">
                                        {tour.maxGroupSize} people
                                    </span>
                                </div>
                                <div className="overview-box__detail">
                                    <svg className="overview-box__icon">
                                        <use xlinkHref={`${icons}#icon-star`}></use>
                                    </svg>
                                    <span className="overview-box__label">Rating</span>
                                    <span className="overview-box__text">
                                        {tour.ratingsAverage} / 5
                                    </span>
                                </div>
                            </div>

                            <div className="overview-box__group">
                                <h2 className="heading-secondary ma-bt-lg">Your tour guides</h2>
                                {tour.guides.map((guide) => (
                                    <div className="overview-box__detail">
                                        <img
                                            src={
                                                require(`./../../assets/img/users/${guide.photo}`)
                                                    .default
                                            }
                                            alt={guide.name}
                                            className="overview-box__img"
                                        />
                                        <span className="overview-box__label">
                                            {guide.role === "lead-guide"
                                                ? "Lead guide"
                                                : "Tour guide"}
                                        </span>
                                        <span className="overview-box__text">{guide.name}</span>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>

                    <div className="description-box">
                        <h2 className="heading-secondary ma-bt-lg">About {tour.name} tour</h2>
                        {tour.description.split("\n").map((p) => (
                            <p className="description__text">{p}</p>
                        ))}
                    </div>
                </section>

                <section className="section-pictures">
                    {tour.images.map((image, i) => (
                        <div className="picture-box">
                            <img
                                className={`picture-box__img picture-box__img--${i + 1}`}
                                src={require(`./../../assets/img/tours/${image}`).default}
                                alt={`${tour.name} tour ${i + 1}`}
                            />
                        </div>
                    ))}
                </section>

                <section className="section-map">
                    <div id="map"></div>
                </section>

                <section className="section-reviews">
                    <div className="reviews">
                        {tour.reviews.map((review) => (
                            <div className="reviews__card">
                                <div className="reviews__avatar">
                                    <img
                                        src={
                                            require(`./../../assets/img/users/${review.user.photo}`)
                                                .default
                                        }
                                        alt={review.user.name}
                                        className="reviews__avatar-img"
                                    />
                                    <h6 className="reviews__user">{review.user.name}</h6>
                                </div>
                                <p className="reviews__text">{review.review}</p>
                                <div className="reviews__rating">
                                    {[1, 2, 3, 4, 5].map((start) => (
                                        <svg
                                            className={`reviews__star reviews__star--${
                                                review.rating >= start ? "active" : "inactive"
                                            }`}
                                        >
                                            <use xlinkHref={`${icons}#icon-star`}></use>
                                        </svg>
                                    ))}
                                </div>
                            </div>
                        ))}
                    </div>
                </section>

                <section className="section-cta">
                    <div className="cta">
                        <div className="cta__img cta__img--logo">
                            <img
                                src={require(`./../../assets/img/logo-white.png`).default}
                                alt="Natours logo"
                                className=""
                            />
                        </div>
                        <img
                            src={require(`./../../assets/img/tours/${tour.images[1]}`).default}
                            alt={tour.name}
                            className="cta__img cta__img--1"
                        />
                        <img
                            src={require(`./../../assets/img/tours/${tour.images[2]}`).default}
                            alt={tour.name}
                            className="cta__img cta__img--2"
                        />

                        <div className="cta__content">
                            <h2 className="heading-secondary">What are you waiting for?</h2>
                            <p className="cta__text">
                                {tour.duration} days. 1 adventure. Infinite memories. Make it yours
                                today!
                            </p>
                            <button className="btn btn--green span-all-rows">Book tour now!</button>
                        </div>
                    </div>
                </section>
            </div>
        );
    }
    return "ok";
};

export default Detail;
