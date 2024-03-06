import "./contact.css";
import { useState } from "react";
// import { useNavigate } from "react-router-dom";
// import axios from "axios";
import { Col, Container, Row } from "react-bootstrap";
import emailjs from "emailjs-com";

function Contact() {
  // const navigate = useNavigate();
  // const [inputs, setInputs] = useState({});
  const initialFormData = {
    name: "",
    email: "",
    message: "",
  };
  const [formData, setFormData] = useState(initialFormData);
  const [submitted, setSubmitted] = useState(false);

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await emailjs.sendForm(
        "service_3s5e6am",
        "template_wxa21x9",
        e.target,
        "BAtCspIQN7KtQparw"
      );
      setSubmitted(true);
    } catch (error) {
      console.error("Error sending email:", error);
    }
  };

  const handleGetBack = () => {
    setSubmitted(false);
    setFormData(initialFormData); // Reset form data
  };

  // const handleChange = (e) => {
  //   const name = e.target.name;
  //   const value = e.target.value;

  // setInputs((values) => ({ ...values, [name]: value }));
  // };

  // const handleSubmit = (e) => {
  //   e.preventDefault();

  //   axios.post("http://localhost/FYP/api/feedback.php", inputs).then((res) => {
  //     navigate("/thankyou");
  //   });
  // };

  return (
    <>
      <section className="">
        <Container fluid className="">
          <Row>
            <Col lg={6} className="contact-left_side">
              <h1 className="text-center">Contact US</h1>
              
              <div className="contactFA">
                {/* <FontAwesomeIcon icon={faPhone}></FontAwesomeIcon> */}
              </div>
            </Col>

            <Col lg={6} className="form_contact">
              <div className="wrapper">
                <div className="contactInner mt-5 mb-5">
                  {submitted ? (
                    <p>
                      Thank you for contacting us! We will get in touch with you
                      soon.
                      <button
                        className="button"
                        onClick={handleGetBack}
                      >
                        Get Back
                      </button>
                    </p>
                  ) : (
                    <form onSubmit={handleSubmit} method="POST">
                      <h3 className="contactHeading text-warning">
                        Get in Touch
                      </h3>
                      <p className="contactPrg text-warning">
                        Feel free to drop us a line below!
                      </p>
                      <label className="form-group">
                        <input
                          type="text"
                          className="form-control"
                          name="name"
                          value={formData.name}
                          onChange={handleChange}
                          required
                        />
                        <span className="contactTxt text-warning">
                          Enter Your Name
                        </span>
                        <span className="border"></span>
                      </label>
                      <label className="form-group">
                        <input
                          type="text"
                          className="form-control"
                          name="email"
                          value={formData.email}
                          onChange={handleChange}
                          required
                        />
                        <span htmlFor="" className="contactTxt text-warning">
                          Enter Your E-mail
                        </span>
                        <span className="border"></span>
                      </label>
                      <label className="form-group">
                        <textarea
                          name="message"
                          className="form-control textarea"
                          value={formData.message}
                          onChange={handleChange}
                          required
                        ></textarea>
                        <span htmlFor="" className="contactTxt text-warning">
                          Enter Your Querry
                        </span>
                        <span className="border"></span>
                      </label>
                      <button type="submit" className="button">
                        Submit
                      </button>
                    </form>
                  )}
                </div>
              </div>
            </Col>
          </Row>
        </Container>
      </section>
    </>
  );
}

export default Contact;
