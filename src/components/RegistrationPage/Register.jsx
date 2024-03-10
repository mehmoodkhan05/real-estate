import { Container } from "react-bootstrap";
import "./register.css";
import { Link } from "react-router-dom";
// import axios from "axios";
// import { useState } from "react";

function Register() {
  // const navigate = useNavigate();
  // const [inputs, setInputs] = useState({});

  // const handleChange = (e) => {
  //   const name = e.target.name;
  //   const value = e.target.value;

  //   setInputs((values) => ({ ...values, [name]: value }));
  // };

  // const handleSubmit = (e) => {
  //   e.preventDefault();

  //   axios.post("http://localhost/FYP/api/register.php", inputs).then((res) => {
  //     navigate("/signin");
  //   });
  // };
  return (
    <>
      <Container className="d-flex justify-content-center mt-5 mb-5">
        <div className="registration-page">
          <div className="reg_overlay">
            <div className="reg_overlay-image"></div>
            <div className="reg_overlay-panel text-center">
              <h1>Welcome Back!</h1>
              <p className="reg_PRG">
                To keep connetced with us please login with your personal info.
              </p>
              <Link to="/signin" className="btn btn-w-108 mt-3">
                Login
              </Link>
            </div>
          </div>

          <form method="POST" className="reg_form">
            <div className="reg_heading">
              <h1 className="mt-5">Create Account</h1>
            </div>
            <label className="form-group">
              <input
                type="text"
                className="form-control"
                name="name"
                // onChange={handleChange}
                required
              />
              <span className="contactTxt">Enter Your Name</span>
              <span className="border"></span>
            </label>

            <label className="form-group">
              <input
                type="text"
                className="form-control"
                name="email"
                // onChange={handleChange}
                required
              />
              <span htmlFor="" className="contactTxt">
                Enter Your E-mail
              </span>
              <span className="border"></span>
            </label>

            <label className="form-group">
              <input
                type="password"
                className="form-control"
                name="password"
                // onChange={handleChange}
                required
              />
              <span htmlFor="" className="contactTxt">
                Enter Your Password
              </span>
              <span className="border"></span>
            </label>

            <label className="form-group">
              <input
                type="password"
                className="form-control"
                name="password"
                // onChange={handleChange}
                required
              />
              <span htmlFor="" className="contactTxt">
                Confirm Your E-mail
              </span>
              <span className="border"></span>
            </label>

            <button
              // onClick={handleSubmit}
              type="submit"
              className="btn btn-w-108 text-uppercase mt-5"
            >
              Sign up
            </button>
          </form>
        </div>
      </Container>
    </>
  );
}

export default Register;
