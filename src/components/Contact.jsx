import React, { useState } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faPhone } from "@fortawesome/free-solid-svg-icons";
import { useNavigate } from "react-router-dom";
import axios from "axios";

function Contact() {
  const navigate = useNavigate();
  const [inputs, setInputs] = useState({});

  const handleChange = (e) => {
    const name = e.target.name;
    const value = e.target.value;

    setInputs((values) => ({ ...values, [name]: value }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    axios.post("http://localhost/FYP/api/feedback.php", inputs).then((res) => {
      navigate("/thankyou");
    });
  };

  return (
    <>
      <div className="container-fluid mb-5">
        <div className="row">
          <div className="col-md-6">
            <h1 className="m-5">Finest demo</h1>
            <p className="m-5">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi
              nesciunt omnis excepturi ipsa repellendus aliquid molestiae culpa,
              doloremque harum quisquam illo soluta perferendis maxime quibusdam
              cupiditate optio alias necessitatibus illum!
            </p>
            <div className="contactFA">
              <FontAwesomeIcon icon={faPhone}></FontAwesomeIcon>
            </div>
          </div>

          <div className="col-md-6">
            <div className="wrapper">
              <div className="contactInner mt-5 mb-5">
                <form method="POST">
                  <h3 className="contactHeading text-dark">Contact Us</h3>
                  <p className="contactPrg text-dark">
                    Feel free to drop us a line below!
                  </p>
                  <label className="form-group">
                    <input
                      type="text"
                      className="form-control"
                      name="name"
                      onChange={handleChange}
                      required
                    />
                    <span className="contactTxt text-dark">
                      Enter Your Name
                    </span>
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
                    <span for="" className="contactTxt text-dark">
                      Enter Your E-mail
                    </span>
                    <span className="border"></span>
                  </label>
                  <label className="form-group">
                    <textarea
                      name="message"
                      onChange={handleChange}
                      className="form-control textarea"
                      required
                    ></textarea>
                    <span for="" className="contactTxt text-dark">
                      Enter Your Querry
                    </span>
                    <span className="border"></span>
                  </label>
                  <button onClick={handleSubmit} className="button">
                    Submit
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default Contact;
