import React from "react";
import mdImage from "../images/md.jpg";
import adilImage from "../images/adil.jpeg";
import kashifImage from "../images/kashif.jpg";
import bg_img from "../images/about7.jpg";

function About() {
  return (
    <>
      <div className="abtBackground">
        <img src={bg_img} alt="" className="img-fluid" />
        <div className="container text-center">
          <div className="row">
            <div className="col">
              <h1 className="aboutUsHeading text-center">About Us</h1>
            </div>
          </div>
        </div>
      </div>

      <div className="bg-white">
        <div className="container subtitle">
          <h6>A Bit About Our Team</h6>
          <div className="row m-0 justify-content-center">
            <hr className="col-lg-2 col-3 hr" />
          </div>
          <h1>Meet The Team</h1>
        </div>

        <div className="container mt-5">
          <div className="row align-items-center">
            <div className="col-md-6 col-12">
              <img src={mdImage} className="img-fluid" alt="Mehmood" />
            </div>

            <div className="col-md-6 col-12 text-center pt-4 pt-md-0">
              <h3>Frontend Developer</h3>
              <h4 className="pt-5">Name: Mehmood Khan</h4>
              <h4 className="pt-3">Email: mehmadk05@gmail.com</h4>
              <h4 className="pt-3">Contact: 0320-933 79 39</h4>
            </div>
          </div>

          <div className="row align-items-center pt-5 pt-md-0">
            <div className="col-md-6 col-12 text-center order-2 order-md-1 pt-4 pt-md-0">
              <h3>Thesis Maker</h3>
              <h4 className="pt-5">Name: Adil Khan</h4>
              <h4 className="pt-3">Email: adilkhanbnr7@gmail.com</h4>
              <h4 className="pt-3">Contact: 0348-921 48 21</h4>
            </div>
            <div className="col-md-6 col-12 order-1 order-md-2">
              <img src={adilImage} className="img-fluid" alt="Adil" />
            </div>
          </div>

          <div className="row pb-5 align-items-center pt-5 pt-md-0">
            <div className="col-md-6 col-12">
              <img src={kashifImage} className="img-fluid" alt="Kashif" />
            </div>

            <div className="col-md-6 col-12 text-center pt-4 pt-md-0">
              <h3>Backend Developer</h3>
              <h4 className="pt-5">Name: Kashif Ullah</h4>
              <h4 className="pt-3 text-break">
                Email: kashifullah982@gmail.com
              </h4>
              <h4 className="pt-3">Contact: 0342-093 55 01</h4>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default About;
