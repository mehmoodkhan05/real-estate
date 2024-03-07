import { Container } from "react-bootstrap";
import "./navbar.css";
import { Link, useNavigate } from "react-router-dom";
// import config from "../../config/index"
import logo from "../../images/logo.png"

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
      <section className="header-section sticky-top">
        <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
          <Container className="">
            <Link className="navbar-brand text-white fw-bold" to="/">
              {/* <img src={config.logo} alt={config.siteName} /> */}
              <img src={logo} alt="" className="header-logo" />
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
            <div
              className="collapse navbar-collapse"
              id="navbarSupportedContent"
            >
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
                    className="btn btn-primary nav-link btn-w-108"
                    type="button"
                    aria-current="page"
                    to="/signin"
                  >
                    Login
                  </Link>
                )}
              </form>
            </div>
          </Container>
        </nav>
      </section>
    </>
  );
}

export default Navbar;
