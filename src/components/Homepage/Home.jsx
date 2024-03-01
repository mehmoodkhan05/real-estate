import "./home.css";
import { Link } from "react-router-dom";
import axios from "axios";
import { useEffect, useState } from "react";
import CarouselBackground from "./Carousel";

function Home() {
  const [locations, setLocations] = useState([]);
  useEffect(() => {
    getLocations();
  }, [locations]);

  function getLocations() {
    axios.get("http://localhost/FYP/api/locations").then(function (response) {
      setLocations(response.data);
    });
  }

  return (
    <>
      <section className="carousel-section">
        <CarouselBackground />
      </section>

      <section className="houses-section whiteBackground pt-5">
        <div className="container mb-5">
          <div className="row align-items-center">
            <h1 className="mt-5 fw-bold text-center">Houses</h1>
            <div className="col-lg-6 col-12 pt-5 order-2 order-lg-1">
              <p className="mt-4" style={{ textAlign: "justify" }}>
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
                  className="btn btn-outline-warning text-dark rounded px-5 py-2 mt-4 text-uppercase"
                >
                  View All Houses
                </Link>
              </div>
            </div>
            <div className="col-lg-6 col-12 img-hover-zoom img-hover-zoom--brightness pt-5 order-1 order-lg-2">
              <img
                src="./images/5.jpg"
                className="rounded imgShadow img-fluid"
                alt=""
              />
            </div>
          </div>
        </div>
      </section>

      <section className="plots-section greyBackground py-5">
        <div className="container mb-5">
          <div className="row align-items-center">
            <h1 className="pt-5 fw-bold text-center">Plots</h1>
            <div className="col-lg-6 img-hover-zoom img-hover-zoom--brightness d-flex align-content-center pt-5">
              <img
                src="./images/a.jpg"
                className="rounded imgShadow img-fluid"
                alt=""
              />
            </div>
            <div className="col-lg-6 pt-5">
              <p className="mt-4" style={{ textAlign: "justify" }}>
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
                  className="btn btn-outline-warning text-dark rounded px-5 py-2 mt-5 text-uppercase"
                >
                  View All Plots
                </Link>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="rooms-section whiteBackground pt-5">
        <div className="container mb-5">
          <div className="row align-items-center">
            <h1 className="pt-5 fw-bold text-center">Rooms</h1>
            <div className="col-lg-6 pt-5 order-2 order-lg-1">
              <p className="mt-4" style={{ textAlign: "justify" }}>
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
                  className="btn btn-outline-warning text-dark rounded px-5 py-2 mt-5 text-uppercase"
                >
                  View All Rooms
                </Link>
              </div>
            </div>
            <div className="col-lg-6 img-hover-zoom img-hover-zoom--brightness d-flex align-content-center pt-5 order-1 order-lg-2">
              <img
                src="./images/room3.jpg"
                className="rounded imgShadow img-fluid"
                alt=""
              />
            </div>
          </div>
        </div>
      </section>

      <section className="flats-section greyBackground py-5">
        <div className="container mb-5">
          <div className="row align-items-center">
            <h1 className="mt-5 fw-bold text-center">Flats</h1>
            <div className="col-lg-6 img-hover-zoom img-hover-zoom--brightness pt-5">
              <img
                src="./images/flat1.jpg"
                className="rounded imgShadow img-fluid"
                alt=""
              />
            </div>
            <div className="col-lg-6 pt-5">
              <p className="" style={{ textAlign: "justify" }}>
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
                  className="btn btn-outline-warning text-dark rounded px-5 py-2 mt-5 text-uppercase"
                >
                  View All Flats
                </Link>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}

export default Home;
