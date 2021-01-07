import React from "react";

import Header from "../../components/Header/Header";
import Footer from "../../components/Footer/Footer";

const Layout = (props) => {
    return (
        <React.Fragment>
            <Header />
            <main className="main">{props.children}</main>
            <Footer />
        </React.Fragment>
    );
};

export default Layout;
