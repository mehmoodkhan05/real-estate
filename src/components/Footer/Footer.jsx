import { Col, Container, Row } from "react-bootstrap";
import "./footer.css";
// import config from "../../config";
import logo from "../../images/logo.png";
import { Link } from "react-router-dom";
import { FaPhone, FaLocationDot } from "react-icons/fa6";
import { IoLogoWhatsapp } from "react-icons/io";
import { FaFacebookSquare, FaTwitter, FaInstagramSquare } from "react-icons/fa";

function Footer() {
  return (
    <>
      <section className="footer-section p-lg-5">
        <Container className="">
          <Row className="">
            <Col lg={4} className="">
              <div className="footer-logo">
                {/* <img src={config.logo} className="w-100" alt={config.siteName} /> */}
                <img src={logo} alt="" className="footer_logo" />
              </div>
            </Col>

            <Col lg={4} className="lh-3">
              <h4>Quick Links</h4>
              <div>
                <Link to="#" className="text-decoration-none footer_links">
                  Find your Dream House
                </Link>
              </div>

              <div>
                <Link to="#" className="text-decoration-none footer_links">
                  Explore our Listings
                </Link>
              </div>

              <div>
                <Link to="#" className="text-decoration-none footer_links">
                  Rent Houses
                </Link>
                &nbsp;{"/"}&nbsp;
                <Link to="#" className="text-decoration-none footer_links">
                  Rent Rooms
                </Link>
              </div>

              <div>
                <Link to="#" className="text-decoration-none footer_links">
                  Flats
                </Link>
                &nbsp;{"/"}&nbsp;
                <Link to="#" className="text-decoration-none footer_links">
                  Plots
                </Link>
              </div>
            </Col>

            <Col lg={4} className="lh-3">
              <h4>Contact Us</h4>
              <div>
                <FaPhone /> Call us at: &nbsp;&nbsp;
                <Link to="#" className="text-decoration-none footer_links">
                  +92 320-933 79 39
                </Link>
              </div>

              <div>
                <IoLogoWhatsapp /> Contact us at: &nbsp;&nbsp;
                <Link to="#" className="text-decoration-none footer_links">
                  +92 320-933 79 39
                </Link>
              </div>

              <div>
                <FaLocationDot /> Location: &nbsp;&nbsp;
                <Link to="#" className="text-decoration-none footer_links word-break">
                  Saidu Sharif Swat, KP, Pakistan
                </Link>
              </div>
            </Col>
          </Row>

          <div className="footer_contact-icons text-center">
            Follow us: &nbsp;&nbsp;
            <Link
              to="#"
              className="text-decoration-none word-break ms-2 icons facebook"
            >
              <FaFacebookSquare />
            </Link>
            <Link
              to="#"
              className="text-decoration-none word-break ms-3 icons twitter"
            >
              <FaTwitter />
            </Link>
            <Link
              to="#"
              className="text-decoration-none word-break ms-3 icons instagram"
            >
              <FaInstagramSquare />
            </Link>
          </div>
        </Container>
      </section>
    </>
  );
}

export default Footer;
