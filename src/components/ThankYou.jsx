import React from "react";
import { Link } from "react-router-dom";
import Image from "../images/ty.png";

function ThankYou() {
  return (
    <>
      <div className="container-sm d-flex mt-3 d-block justify-content-center mb-5">
        <div className="row">
          <div className="col-md-12">
            <div
              className="card"
              style={{
                border: "none",
                marginTop: 160,
                marginBottom: 160,
              }}
            >
              <img src={Image} alt="" />

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

export default ThankYou;
