import "./signIn.css";
import axios from "axios";
import { useEffect, useState } from "react";
import { Container } from "react-bootstrap";
import { Link, useNavigate } from "react-router-dom";

function Signin() {
  const navigate = useNavigate();
  const [inputs, setInputs] = useState({});

  const handleChange = (e) => {
    const name = e.target.name;
    const value = e.target.value;

    setInputs((values) => ({ ...values, [name]: value }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    axios.post("http://localhost/FYP/api/login.php", inputs).then((res) => {
      if (res.status === "200") {
        // let user = res.config.data.split(",")[0].split(":")[1];
        let user = res.config.data.split(",")[0].split(":")[1].split('"')[1];
        let password = res.config.data
          .split(",")[1]
          .split(":")[1]
          .split("}")[0]
          .split('"')[1];
        try {
          window.localStorage.setItem("email", user);
          window.localStorage.setItem("password", password);
          navigate("/");
        } catch (error) {
          console.log(error);
        }
      } else {
        alert("Invalid Credentials");
      }
    });
  };

  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <>
      <Container className="signCustomContainer mt-5 mb-5">
        <div className="signFormContainer">
          <form method="POST" className="signForm">
            <div className="main_header">
              <h1 className="">Login</h1>
            </div>
            <label className="form-group">
              <input
                type="text"
                className="form-control"
                name="name"
                onChange={handleChange}
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
                onChange={handleChange}
                required
              />
              <span htmlFor="" className="contactTxt">
                Enter Your E-mail
              </span>
              <span className="border"></span>
            </label>

            <button
              onClick={handleSubmit}
              type="submit"
              className="btn btn-w-108"
            >
              Login
            </button>
            <div>
              <p className="mt-5 signPRG">
                Don't have an Account?{" "}
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
        <div className="overlay-sign">
          <div className="overlay">
            <div className="overlay-panel">
              <img src="./images/login.jpeg" alt="" />
              <h1>Welcome Back!</h1>
              <p className="signPRG">
                To keep connetced with us please login with your personal info.
              </p>
            </div>
          </div>
        </div>
      </Container>
    </>
  );
}

export default Signin;
