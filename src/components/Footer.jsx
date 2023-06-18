import React from "react";
import { Link } from "react-router-dom";
import {
  FaFacebookSquare,
  FaTwitterSquare,
  FaInstagramSquare,
} from "react-icons/fa";

function Footer() {
  return (
    <>
      <div className="">
        <footer
          className="bg-dark text-center text-white"
          style={{ padding: "60px 0px 0px 0px" }}
        >
          <div className="container p-4 pb-0">
            <section className="mb-4">
              <p>Follow us</p>
              <Link
                className="btn btn-outline-light btn-floating m-1"
                to="https://www.facebook.com/profile.php?id=100086639985212"
                role="button"
              >
                <FaFacebookSquare />
              </Link>

              <Link
                className="btn btn-outline-light btn-floating m-1"
                to="https://twitter.com/real_estate19"
                role="button"
              >
                <FaTwitterSquare />
              </Link>

              <Link
                className="btn btn-outline-light btn-floating m-1"
                to="https://www.instagram.com/therealestateonline8/"
                role="button"
              >
                <FaInstagramSquare />
              </Link>
            </section>
          </div>

          <div
            className="text-center p-3"
            style={{
              backgroundColor: "#000000",
              opacity: "0.2",
              padding: "110px 0px 0px 0px",
            }}
          >
            © 2022 Copyright: &nbsp;
            <Link className="text-white" to="/">
              Real Estate
            </Link>
          </div>
        </footer>
      </div>
    </>
  );
}

export default Footer;
