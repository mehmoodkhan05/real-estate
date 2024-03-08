import "./register.css";
// import axios from "axios";
// import { useState } from "react";
import { Link } from "react-router-dom";

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
      {/* <section className="bg-image">
        <div className="mask d-flex align-items-center h-100 gradient-custom-3">
          <div className="container h-100 mt-5 mb-5 ">
            <div className="row d-flex justify-content-center align-items-center h-100">
              <div className="col-12 col-md-9 col-lg-7 col-xl-6">
                <div className="card regInner">
                  <div className="card-body p-5">
                    <h2 className="text-uppercase text-center text-dark mb-5 regHeading">
                      Create an account
                    </h2>

                    <form method="POST">
                      <div className="form-outline mb-4">
                        <input
                          type="text"
                          id="form3Example1cg"
                          name="name"
                          onChange={handleChange}
                          className="form-control form-control-lg regForm"
                          required
                        />
                        <label className="form-label" htmlFor="form3Example1cg">
                          Your Name
                        </label>
                      </div>

                      <div className="form-outline mb-4">
                        <input
                          type="email"
                          name="email"
                          onChange={handleChange}
                          id="form3Example3cg"
                          className="form-control form-control-lg regForm"
                          required
                        />
                        <label className="form-label" htmlFor="form3Example3cg">
                          Your E-mail
                        </label>
                      </div>

                      <div className="form-outline mb-4">
                        <input
                          type="password"
                          id="form3Example4cg"
                          name="password"
                          onChange={handleChange}
                          className="form-control form-control-lg regForm"
                          required
                        />
                        <label className="form-label" htmlFor="form3Example4cg">
                          Password
                        </label>
                      </div>

                      <div className="form-outline mb-4">
                        <input
                          type="number"
                          name="contact"
                          onChange={handleChange}
                          className="form-control form-control-lg regForm"
                          required
                        />
                        <label className="form-label" htmlFor="form3Example4cdg">
                          Phone #
                        </label>
                      </div>

                      <div className="form-outline mb-4">
                        <input
                          type="text"
                          name="address"
                          onChange={handleChange}
                          className="form-control form-control-lg regForm"
                          required
                        />
                        <label className="form-label" htmlFor="form3Example4cdg">
                          Address
                        </label>
                      </div>

                      <div className="d-flex justify-content-center mt-5">
                        <button onClick={handleSubmit} className="button">
                          Submit
                        </button>
                      </div>

                      <div>
                        <p className="mt-5 signPRG text-center">
                          Already Have an Account!
                          <Link
                            to="/signin"
                            className="text-dark fw-bold text-decoration-none customSign"
                          >
                            Sign In
                          </Link>
                        </p>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> */}

      <div className="container signCustomContainer mt-5 mb-5">
        <div className="signFormContainer">
          <div className="overlay-sign">
            <div className="overlay">
              <div className="overlay-panel overlay-right">
                <img src="./images/login.jpeg" alt="" />
                <h1>Welcome Back!</h1>
                <p className="signPRG">
                  To keep connetced with us please login with your personal
                  info.
                </p>
              </div>
            </div>
          </div>

          <form method="POST" className="signForm">
            <div className="main_header">
              <h1 className="signHeading mt-5">Login</h1>
            </div>
            <input
              type="email"
              name="email"
              // onChange={handleChange}
              placeholder="Email"
              className="signInput"
              required
            />
            <input
              type="password"
              // onChange={handleChange}
              name="password"
              placeholder="Password"
              className="signInput"
              required
            />

            <button
              // onClick={handleSubmit}
              type="submit"
              className="signButton Sign-a"
            >
              Login
            </button>
            <div>
              <p className="mt-5 signPRG">
                Don't have Account?{" "}
                <Link
                  to="/register"
                  className="text-dark fw-bold text-decoration-none customSign"
                >
                  Sign Up
                </Link>
              </p>
            </div>
          </form>
        </div>
      </div>
    </>
  );
}

export default Register;
