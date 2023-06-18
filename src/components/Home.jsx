import React from "react";
import { Link } from "react-router-dom";
import axios from "axios";
import { useEffect, useState } from "react";

function Home() {
  const [locations, setLocations] = useState([]);
  useEffect(() => {
    getLocations();
  }, []);

  function getLocations() {
    axios.get("http://localhost/FYP/api/locations").then(function (response) {
      setLocations(response.data);
    });
  }

  return (
    <>
      <div
        id="carouselExampleCaptions"
        className="carousel slide"
        data-bs-ride="carousel"
      >
        <div className="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="0"
            className="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div className="carousel-inner">
          <div className="carousel-item active">
            <img src="./images/1.jpg" className="d-block w-100" alt="..." />
          </div>

          <div className="carousel-item">
            <img src="./images/2.jpeg" className="d-block w-100" alt="..." />
          </div>

          <div className="carousel-item">
            <img src="./images/3.jpg" className="d-block w-100" alt="..." />
          </div>
        </div>
        <button
          className="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev"
        >
          <span
            className="carousel-control-prev-icon"
            aria-hidden="true"
          ></span>
          <span className="visually-hidden">Previous</span>
        </button>
        <button
          className="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next"
        >
          <span
            className="carousel-control-next-icon"
            aria-hidden="true"
          ></span>
          <span className="visually-hidden">Next</span>
        </button>
      </div>

      {/* <form method="POST">
        <div className="container filter d-md-flex rounded">
          <select
            className="ms-3 col-4 captionDesg rounded"
            name="loc_id"
            onChange={handleChange}
          >
            {locations.map((location, key) => (
              <option value={location.loc_id} key={key}>
                {location.loc_name}
              </option>
            ))}
          </select>
          <select
            className="ms-3 col-3 captionDesg rounded "
            name="type"
            onChange={handleChange}
          >
            <option value="1">Rent</option>
            <option value="2">Buy</option>
          </select>
          <select
            className="ms-3 col-3 captionDesg rounded "
            name="property_type"
            onChange={handleChange}
          >
            <option value="1">House</option>
            <option value="2">Room</option>
            <option value="3">Flat</option>
            <option value="4">Plot</option>
          </select>

          <button
            onClick={handleSubmit}
            className="btn btn-info btn-outline-dark ms-3 text-light py-2"
          >
            Filter Search
          </button>
        </div>
      </form> */}

      <div className="container-fluid mb-5 p-5 whiteBackground">
        <div className="row">
          <div className="col-sm-6">
            <h1 className="mx-5 mt-5 fw-bold text-center">Houses</h1>
            <p className="mt-4 ms-5" style={{ textAlign: "justify" }}>
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
                className="btn btn-outline-primary rounded-pill px-3 py-2 mt-5"
              >
                View All Houses
              </Link>
            </div>
          </div>
          <div className="col-sm-6 img-hover-zoom img-hover-zoom--brightness">
            <img
              src="./images/5.jpg"
              className="rounded w-100 ms-4 mt-5 imgShadow"
              alt=""
            />
          </div>
        </div>
      </div>

      <div className="container-fluid p-5 greyBackground">
        <div className="row">
          <div className="col-sm-6 img-hover-zoom img-hover-zoom--brightness">
            <img
              src="./images/a.jpg"
              className="rounded w-100 ms-4 mt-5 imgShadow"
              alt=""
            />
          </div>
          <div className="col-sm-6">
            <h1 className="mx-5 mt-5 fw-bold text-center">Plots</h1>
            <p className="mt-4 ms-5" style={{ textAlign: "justify" }}>
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
                className="btn btn-outline-primary rounded-pill px-3 py-2 mt-5"
              >
                View All Plots
              </Link>
            </div>
          </div>
        </div>
      </div>

      <div className="container-fluid mb-5 p-5 whiteBackground">
        <div className="row">
          <div className="col-sm-6">
            <h1 className="mx-5 mt-5 fw-bold text-center">Rooms</h1>
            <p className="mt-4 ms-5" style={{ textAlign: "justify" }}>
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
                className="btn btn-outline-primary rounded-pill px-3 py-2 mt-5"
              >
                View All Rooms
              </Link>
            </div>
          </div>
          <div className="col-sm-6 img-hover-zoom img-hover-zoom--brightness">
            <img
              src="./images/room3.jpg"
              className="rounded w-100 ms-4 mt-5 imgShadow"
              alt=""
            />
          </div>
        </div>
      </div>

      <div className="container-fluid p-5 greyBackground">
        <div className="row">
          <div className="col-sm-6 img-hover-zoom img-hover-zoom--brightness">
            <img
              src="./images/flat1.jpg"
              className="rounded w-100 ms-4 mt-5 imgShadow"
              alt=""
            />
          </div>
          <div className="col-sm-6">
            <h1 className="mx-5 mt-5 fw-bold text-center">Flats</h1>
            <p className="mt-4 ms-5" style={{ textAlign: "justify" }}>
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
                to="/flats"
                className="btn btn-outline-primary rounded-pill px-3 py-2 mt-5"
              >
                View All Flats
              </Link>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default Home;
