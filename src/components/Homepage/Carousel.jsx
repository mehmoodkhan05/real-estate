import React from "react";
import { Carousel } from "react-bootstrap";

const CarouselBackground = () => {
  return (
    <Carousel fade controls={false} interval={3000}>
      <Carousel.Item>
        <img
          src="./images/1.jpg"
          className="d-block w-100 img-fluid"
          alt="..."
        />
      </Carousel.Item>
      <Carousel.Item>
        <img
          src="./images/2.jpeg"
          className="d-block w-100 img-fluid"
          alt="..."
        />
      </Carousel.Item>
      <Carousel.Item>
        <img
          src="./images/3.jpg"
          className="d-block w-100 img-fluid"
          alt="..."
        />
      </Carousel.Item>
    </Carousel>
  );
};

export default CarouselBackground;
