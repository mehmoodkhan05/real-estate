import "./signIn.css"
import axios from "axios";
import { useState } from "react";
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

  return (
    <>
      <div className="container signCustomContainer mt-5 mb-5">
        <div className="signFormContainer">
          <form method="POST" className="signForm">
            <div className="main_header">
              <h1 className="signHeading mt-5">Login</h1>
            </div>
            <input
              type="email"
              name="email"
              onChange={handleChange}
              placeholder="Email"
              className="signInput"
              required
            />
            <input
              type="password"
              onChange={handleChange}
              name="password"
              placeholder="Password"
              className="signInput"
              required
            />

            <button
              onClick={handleSubmit}
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
        <div className="overlay-sign">
          <div className="overlay">
            <div className="overlay-panel overlay-right">
              <img src="./images/login.jpeg" alt="" />
              <h1>Welcome Back!</h1>
              <p className="signPRG">
                To keep connetced with us please login with your personal info.
              </p>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default Signin;
