import "./navbar.css"
import { Link, useNavigate } from "react-router-dom";

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
          <Link className="navbar-brand text-white fw-bold" to="/">
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
            <ul className="navbar-nav me-auto">
              <Link
                className="nav-link active ms-4 fw-bold text-white"
                aria-current="page"
                to="/buy"
              >
                {props.buy}
              </Link>
              <Link
                className="nav-link active ms-4 fw-bold text-white"
                aria-current="page"
                to="/rent"
              >
                {props.rent}
              </Link>
              <Link
                className="nav-link active ms-4 fw-bold text-white"
                aria-current="page"
                to="/about"
              >
                {props.about}
              </Link>
              <Link
                className="nav-link active ms-4 fw-bold text-white"
                aria-current="page"
                to="/contact"
              >
                {props.contact}
              </Link>
            </ul>
            <form className="d-flex">
              {token ? (
                <button
                  className="btn btn-outline-primary nav-link m-2 p-1 px-3 text-light"
                  onClick={onLogOutClick}
                >
                  Logout
                </button>
              ) : (
                <Link
                  className="btn btn-primary nav-link px-4 text-light"
                  type="button"
                  aria-current="page"
                  to="/signin"
                >
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
