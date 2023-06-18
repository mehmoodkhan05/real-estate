import axios from "axios";
import React, { useEffect, useState } from "react";
import { Link, useNavigate, useParams } from "react-router-dom";

function FlatRent() {
  const { id } = useParams();

  const [flats, setFlats] = useState([]);
  useEffect(() => {
    getFlats();
  }, []);

  function getFlats() {
    axios
      .get(`http://localhost/FYP/api/flatIndividual.php?id=${id}`)
      .then((res) => {
        setFlats(res.data);
      });
  }

  const navigate = useNavigate();

  const getFlatInd = (id) => {
    navigate(`/bookingflat/${id}`);
  };

  const getFlatIndBuy = (id) => {
    navigate(`/buyflat/${id}`);
  };

  const token = localStorage.getItem("email");

  return (
    <div className="container">
      {flats.map((flat, key) => (
        <>
          <div className="row mt-5 ">
            <div className="col-md-6">
              <img
                className="buyImg mt-5 mb-5"
                src={require(`../images/${flat.g_img}`)}
                alt=""
              />
            </div>

            <div className="col-3">
              <h3 className="mt-5">Features</h3>
              <ul className="mt-3">
                <li className="pt-3">
                  AC: {flat.f_ac === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">
                  Car Parking: {flat.f_parking === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">
                  Telephone Connection:
                  {flat.f_internet === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">
                  Gas Facility: {flat.f_gas === "1" ? " Yes" : " No"}
                </li>

                <li className="pt-3">
                  Kitchen Facility: {flat.f_kitchen === "1" ? " Yes" : " No"}
                </li>

                <li className="pt-3">Price: {flat.f_price} PKR </li>
              </ul>
            </div>

            <div className="col-3 mt-5">
              <h3 className="mt-5"></h3>
              <ul>
                <li className="pt-3">Area: {flat.f_area} SQFT</li>
                <li className="pt-3">Rooms: {flat.f_room}</li>
                <li className="pt-3">Floor No: {flat.f_floor}</li>
                <li className="pt-3">Attached Bathrooms: {flat.f_bathroom}</li>
                <li className="pt-3">Location: {flat.loc_name}</li>
                <li className="pt-3">Address: {flat.f_address}</li>
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
              ) : flat.f_type === "1" ? (
                <button
                  type="submit"
                  className="btn btn-outline-primary px-3"
                  onClick={() => getFlatInd(flat.f_id)}
                >
                  Proceed to Booking
                </button>
              ) : (
                <button
                  type="submit"
                  className="btn btn-outline-primary px-3"
                  onClick={() => getFlatIndBuy(flat.f_id)}
                >
                  Proceed to Booking (Buy)
                </button>
              )}
            </div>
          </div>
        </>
      ))}
    </div>
  );
}

export default FlatRent;
