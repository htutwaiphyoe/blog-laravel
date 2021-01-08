export const formatDate = (date) => {
    return date.toLocaleString("en-us", { month: "long", year: "numeric" });
};

export const updateObject = (oldObject, newObject) => {
    return {
        ...oldObject,
        ...newObject,
    };
};
