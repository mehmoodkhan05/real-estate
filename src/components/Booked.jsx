import React from "react";
import { Link } from "react-router-dom";
import Image from "../images/booking.png";
function Booked() {
  return (
    <>
      <div className="container-sm d-flex mt-3 d-block justify-content-center mb-5">
        <div className="row">
          <div className="col-md-12">
            <div
              className="card"
              style={{
                border: "none",
                marginTop: "5%",
                marginBottom: "10%",
              }}
            >
              <img src={Image} alt="" style={{ width: "100%" }} />

              <br />
              <div className="card-body text-center">
                <Link to="/" className="btn btn-light btn-lg">
                  Return to Main Page
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default Booked;
