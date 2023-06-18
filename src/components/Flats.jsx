import axios from "axios";
import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";

function Flats() {
  const [flats, setFlats] = useState([]);
  useEffect(() => {
    getFlats();
  }, []);

  function getFlats() {
    axios.get("http://localhost/FYP/api/flats.php").then((res) => {
      setFlats(res.data);
    });
  }

  const navigate = useNavigate();

  const getFlatInd = (id) => {
    navigate(`/flatrent/${id}`);
  };

  return (
    <>
      <div className="container mt-5 mb-5">
        <h1>Flats</h1>
      </div>
      <div className="container-sm d-flex mt-3 mb-5">
        <div className="row">
          {flats.map((flat, key) => (
            <div className="col-md-4">
              <div
                className="card img-hover-zoom img-hover-zoom--brightness p-2"
                key={key}
              >
                <img
                  src={require(`../images/${flat.g_img}`)}
                  className="card-img-top"
                  alt="flat"
                />
                <div className="card-body">
                  <h5 className="card-title">Owner: {flat.o_name}</h5>
                  <hr />

                  <p>
                    Property For:
                    {
                      // condition ? exprIfTrue : exprIfFalse
                      flat.f_type === "1" ? " Rent" : " Sell"
                    }
                  </p>

                  <p>Location: {flat.loc_name}</p>
                  <p>Price: {flat.f_price} Pkr</p>
                  <div className="text-center">
                    <button
                      type="submit"
                      className="btn btn-outline-primary px-3  rounded-pill"
                      onClick={() => getFlatInd(flat.f_id)}
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

export default Flats;
