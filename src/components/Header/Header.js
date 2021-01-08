import { Link } from "react-router-dom";

import headerLogo from "../../assets/img/logo-white.png";
import searchIcon from "../../assets/img/icons.svg";

const Header = (props) => {
    return (
        <header className="header">
            <nav className="nav nav--tours">
                <div className="header__logo">
                    <Link to="/">
                        <img src={headerLogo} alt="Natours logo" />
                    </Link>
                </div>
            </nav>
            <form className="nav__search">
                <button className="nav__search-btn">
                    <svg>
                        <use xlinkHref={`${searchIcon}#icon-search`} />
                    </svg>
                </button>
                <input type="text" placeholder="Search tours" className="nav__search-input" />
            </form>
            <nav className="nav nav--user">
                {/* <a href="#" className="nav__el">
                    My bookings
                </a>
                <a href="#" className="nav__el">
                    <img src="img/user.jpg" alt="User photo" className="nav__user-img" />
                    <span>Jonas</span>
                </a> */}

                <button className="nav__el">Log in</button>
                <button className="nav__el nav__el--cta">Sign up</button>
            </nav>
        </header>
    );
};

export default Header;
