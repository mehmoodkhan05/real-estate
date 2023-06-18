import axios from "axios";
import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";

function Houses() {
  const [houses, setHouses] = useState([]);
  useEffect(() => {
    getHomes();
  }, []);

  function getHomes() {
    axios.get("http://localhost/FYP/api/homes.php").then((res) => {
      setHouses(res.data);
    });
  }

  const navigate = useNavigate();

  const getHouse = (id) => {
    navigate(`/housebuy/${id}`);
  };
  return (
    <>
      <div className="container mt-5 mb-5">
        <h1 className="fw-bold">Houses</h1>
      </div>

      <div className="container-sm d-flex mt-3 mb-5">
        <div className="row">
          {houses.map((house, key) => (
            <div className="col-md-4">
              <div
                className="card img-hover-zoom img-hover-zoom--brightness p-2"
                key={key}
              >
                <img
                  src={require(`../images/${house.g_img}`)}
                  className="card-img-top"
                  alt="House"
                />
                <div className="card-body">
                  <h5 className="card-title">Owner: {house.o_name}</h5>
                  <hr />
                  <p>
                    Property For:
                    {
                      // condition ? exprIfTrue : exprIfFalse
                      house.h_type === "1" ? " Rent" : " Sell"
                    }
                  </p>

                  <p>Location: {house.loc_name}</p>
                  <p>Price: {house.h_price} Pkr</p>
                  <div className="text-center">
                    <button
                      type="submit"
                      className="btn btn-outline-primary px-3  rounded-pill"
                      onClick={() => getHouse(house.h_id)}
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

export default Houses;
