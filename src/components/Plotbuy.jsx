import axios from "axios";
import React, { useEffect, useState } from "react";
import { useParams, Link, useNavigate } from "react-router-dom";

function Plotbuy() {
  const { id } = useParams();

  const [plots, setPlots] = useState([]);

  useEffect(() => {
    getPlots();
  }, []);

  function getPlots() {
    axios
      .get(`http://localhost/FYP/api/plotIndividual.php?id=${id}`)
      .then((res) => {
        setPlots(res.data);
      });
  }

  const navigate = useNavigate();

  const getPlotInd = (id) => {
    navigate(`/buyplot/${id}`);
  };

  const token = localStorage.getItem("email");

  return (
    <div className="container">
      {plots.map((plot, key) => (
        <>
          <div className="row mt-5 ">
            <div className="col-md-6">
              <img
                className="buyImg mt-5 mb-5"
                src={require(`../images/${plot.g_img}`)}
                alt=""
              />
            </div>

            <div className="col-6">
              <h3 className="mt-5">Features</h3>
              <ul className="mt-3">
                <li className="pt-3">Area: {plot.p_area} SQFT</li>
                <li className="pt-3">
                  Plot Allocate:
                  {plot.p_allocate === "1" ? " On Road" : " Away Road"}
                </li>
                <li className="pt-3">Location: {plot.loc_name}</li>
                <li className="pt-3">Address: {plot.p_address}</li>
                <li className="pt-3">Price: {plot.p_price} Pkr</li>
              </ul>
            </div>
          </div>

          <div className="row">
            <div className="col-md-9"></div>
            <div className="col-md-3 mb-5">
              {!token ? (
                <Link to="/signin" className="btn btn-outline-primary mt-4">
                  Proceed Sign-In
                </Link>
              ) : (
                <button
                  type="submit"
                  className="btn btn-outline-primary px-3"
                  onClick={() => getPlotInd(plot.p_id)}
                >
                  Proceed to Booking
                </button>
              )}
            </div>
          </div>
        </>
      ))}
    </div>
  );
}

export default Plotbuy;
