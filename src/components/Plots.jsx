import axios from "axios";
import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";

function Plots() {
  const [plots, setPlots] = useState([]);

  useEffect(() => {
    getPlots();
  }, []);

  function getPlots() {
    axios.get("http://localhost/FYP/api/plots.php").then((res) => {
      setPlots(res.data);
    });
  }

  const navigate = useNavigate();

  const getPlotInd = (id) => {
    navigate(`/plotbuy/${id}`);
  };

  return (
    <>
      <div className="container mt-5 mb-5">
        <h1>Plots</h1>
      </div>
      <div className="container-sm d-flex mt-3 mb-5">
        <div className="row">
          {plots.map((plot, key) => (
            <div className="col-md-4">
              <div
                className="card img-hover-zoom img-hover-zoom--brightness p-2"
                key={key}
              >
                <img
                  src={require(`../images/${plot.g_img}`)}
                  className="card-img-top"
                  alt="Plot"
                />
                <div className="card-body">
                  <h5 className="card-title">Owner: {plot.o_name}</h5>
                  <hr />

                  <p>Location: {plot.loc_name}</p>
                  <p>Price: {plot.p_price} Pkr</p>
                  <div className="text-center">
                    <button
                      type="submit"
                      className="btn btn-outline-primary px-3  rounded-pill"
                      onClick={() => getPlotInd(plot.p_id)}
                    >
                      View Details
                    </button>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </>
  );
}

export default Plots;
