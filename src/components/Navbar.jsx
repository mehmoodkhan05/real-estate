import React from "react";
import { Link, useNavigate } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faSignIn, faSignOut } from "@fortawesome/free-solid-svg-icons";

function Navbar(props) {
  const token = localStorage.getItem("email");
  const navigate = useNavigate();

  function onLogOutClick() {
    window.localStorage.setItem("email", "");
    window.localStorage.setItem("password", "");
    window.localStorage.clear();
    navigate("/");
  }

  return (
    <>
      <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
        <div className="container">
          <Link className="navbar-brand" to="/">
            Real Estate
          </Link>
          <button
            className="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span className="navbar-toggler-icon"></span>
          </button>
          <div className="collapse navbar-collapse" id="navbarSupportedContent">
            <ul className="navbar-nav me-auto mb-2 mb-lg-0">
              <Link
                className="nav-link active ms-3"
                aria-current="page"
                to="/buy"
              >
                {props.buy}
              </Link>
              <Link
                className="nav-link active ms-3"
                aria-current="page"
                to="/rent"
              >
                {props.rent}
              </Link>
              <Link
                className="nav-link active ms-3"
                aria-current="page"
                to="/about"
              >
                {props.about}
              </Link>
              <Link
                className="nav-link active ms-3"
                aria-current="page"
                to="/contact"
              >
                {props.contact}
              </Link>
              {token ? (
                <Link
                  className="nav-link active"
                  aria-current="page"
                  to="/bookings"
                >
                  My Bookings
                </Link>
              ) : (
                "a"
              )}
            </ul>
            <form className="d-flex">
              {token ? (
                <button
                  className="btn btn-outline-primary nav-link m-2 p-1 px-3 text-light"
                  onClick={onLogOutClick}
                >
                  <FontAwesomeIcon
                    icon={faSignOut}
                    className="me-2"
                  ></FontAwesomeIcon>
                  Logout
                </button>
              ) : (
                <Link
                  className="btn btn-outline-primary nav-link m-2 p-1 px-3 text-light"
                  type="button"
                  aria-current="page"
                  to="/signin"
                >
                  <FontAwesomeIcon
                    icon={faSignIn}
                    className="me-2"
                  ></FontAwesomeIcon>
                  Login
                </Link>
              )}
            </form>
          </div>
        </div>
      </nav>
    </>
  );
}

export default Navbar;
