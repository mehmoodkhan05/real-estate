import "./home.css";
import { Link } from "react-router-dom";
// import axios from "axios";
import { useEffect } from "react";
import image from "../../images/hero-bg2.jpg";
import { TypeAnimation } from "react-type-animation";
import { Col, Container, Row } from "react-bootstrap";

function Home() {
  // const [locations, setLocations] = useState([]);
  // useEffect(() => {
  //   getLocations();
  // }, [locations]);

  // function getLocations() {
  //   axios.get("http://localhost/FYP/api/locations").then(function (response) {
  //     setLocations(response.data);
  //   });
  // }

  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <>
      <section className="hero-section">
        <div className="overlay-image">
          <img src={image} alt="" className="img-fluid" />
        </div>
        <div className="typed-text-container text-center">
          <TypeAnimation
            className="hero_type-animation"
            sequence={[
              "Welcome to Real Estate",
              1000,
              "Explore our Listings",
              1000,
              "Find your Dream Home",
              1000,
            ]}
            wrapper="span"
            speed={50}
            repeat={Infinity}
          />
        </div>
      </section>

      <section className="houses-section whiteBackground p-lg-5">
        <Container className="pt-5">
          <Row className="align-items-center">
            <Col lg={6} className="">
              <h1 className="fw-bold text-center">Houses</h1>
              <p className="mt-lg-5" style={{ textAlign: "justify" }}>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae
                laboriosam error a voluptatem voluptatum consequatur, porro
                delectus iste pariatur quos illo numquam exercitationem tempora
                animi est laudantium quis quaerat laborum accusantium accusamus
                distinctio adipisci libero omnis minima. Laboriosam, quas,
                voluptatem sed dolore temporibus aut iure optio, atque ipsum
                corrupti amet voluptate vitae id ratione possimus. Esse et rem
                accusamus maxime consectetur at, dolor porro impedit beatae qui
                animi debitis repellendus quo, omnis doloremque corrupti,
                similique fuga possimus inventore neque ea.
              </p>
              <div align="center">
                <Link
                  to="/houses"
                  className="btn rounded btn-w-180 mt-4 text-uppercase"
                >
                  View All Houses
                </Link>
              </div>
            </Col>
            <Col lg={6} className="img-hover-zoom img-hover-zoom--brightness">
              <img
                src="./images/5.jpg"
                className="rounded imgShadow img-fluid"
                alt=""
              />
            </Col>
          </Row>
        </Container>
      </section>

      <section className="plots-section greyBackground p-lg-5">
        <Container className="">
          <Row className="align-items-center">
            <Col lg={6} className="img-hover-zoom img-hover-zoom--brightness">
              <img
                src="./images/a.jpg"
                className="rounded imgShadow img-fluid"
                alt=""
              />
            </Col>
            <Col lg={6} className="">
              <h1 className="fw-bold text-center">Plots</h1>
              <p className="mt-lg-5" style={{ textAlign: "justify" }}>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae
                laboriosam error a voluptatem voluptatum consequatur, porro
                delectus iste pariatur quos illo numquam exercitationem tempora
                animi est laudantium quis quaerat laborum accusantium accusamus
                distinctio adipisci libero omnis minima. Laboriosam, quas,
                voluptatem sed dolore temporibus aut iure optio, atque ipsum
                corrupti amet voluptate vitae id ratione possimus. Esse et rem
                accusamus maxime consectetur at, dolor porro impedit beatae qui
                animi debitis repellendus quo, omnis doloremque corrupti,
                similique fuga possimus inventore neque ea.
              </p>
              <div align="center">
                <Link
                  to="/plots"
                  className="btn rounded btn-w-180 mt-4 text-uppercase"
                >
                  View All Plots
                </Link>
              </div>
            </Col>
          </Row>
        </Container>
      </section>

      <section className="rooms-section whiteBackground p-lg-5">
        <Container className="">
          <Row className="align-items-center">
            <Col lg={6} className="">
              <h1 className="fw-bold text-center">Rooms</h1>
              <p className="mt-lg-5" style={{ textAlign: "justify" }}>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae
                laboriosam error a voluptatem voluptatum consequatur, porro
                delectus iste pariatur quos illo numquam exercitationem tempora
                animi est laudantium quis quaerat laborum accusantium accusamus
                distinctio adipisci libero omnis minima. Laboriosam, quas,
                voluptatem sed dolore temporibus aut iure optio, atque ipsum
                corrupti amet voluptate vitae id ratione possimus. Esse et rem
                accusamus maxime consectetur at, dolor porro impedit beatae qui
                animi debitis repellendus quo, omnis doloremque corrupti,
                similique fuga possimus inventore neque ea.
              </p>
              <div align="center">
                <Link
                  to="/rooms"
                  className="btn rounded btn-w-180 mt-4 text-uppercase"
                >
                  View All Rooms
                </Link>
              </div>
            </Col>
            <Col lg={6} className="img-hover-zoom img-hover-zoom--brightness">
              <img
                src="./images/room3.jpg"
                className="rounded imgShadow img-fluid"
                alt=""
              />
            </Col>
          </Row>
        </Container>
      </section>

      <section className="flats-section greyBackground p-lg-5">
        <Container className="">
          <Row className="align-items-center">
            <Col lg={6} className="img-hover-zoom img-hover-zoom--brightness">
              <img
                src="./images/flat1.jpg"
                className="rounded imgShadow img-fluid"
                alt=""
              />
            </Col>
            <Col lg={6} className="">
              <h1 className="fw-bold text-center">Flats</h1>
              <p className="mt-lg-5" style={{ textAlign: "justify" }}>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae
                laboriosam error a voluptatem voluptatum consequatur, porro
                delectus iste pariatur quos illo numquam exercitationem tempora
                animi est laudantium quis quaerat laborum accusantium accusamus
                distinctio adipisci libero omnis minima. Laboriosam, quas,
                voluptatem sed dolore temporibus aut iure optio, atque ipsum
                corrupti amet voluptate vitae id ratione possimus. Esse et rem
                accusamus maxime consectetur at, dolor porro impedit beatae qui
                animi debitis repellendus quo, omnis doloremque corrupti,
                similique fuga possimus inventore neque ea.
              </p>
              <div className="text-center">
                <Link
                  to="/flats"
                  className="btn rounded btn-w-180 mt-4 text-uppercase"
                >
                  View All Flats
                </Link>
              </div>
            </Col>
          </Row>
        </Container>
      </section>
    </>
  );
}

export default Home;
