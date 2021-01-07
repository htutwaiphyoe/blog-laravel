export const formatDate = (date) => {
    return date.toLocaleString("en-us", { month: "long", year: "numeric" });
};
