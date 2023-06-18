import axios from "axios";
import React, { useEffect, useState } from "react";
import { Link, useNavigate, useParams } from "react-router-dom";

function Housebuy() {
  const { id } = useParams();
  const [houses, setHouses] = useState([]);
  useEffect(() => {
    getHomes();
  }, []);

  function getHomes() {
    axios
      .get(`http://localhost/FYP/api/homesIndividual.php?id=${id}`)
      .then((res) => {
        setHouses(res.data);
      });
  }

  const navigate = useNavigate();

  const getHouse = (id) => {
    navigate(`/bookinghouse/${id}`);
  };

  const getHouseSell = (id) => {
    navigate(`/buyhouse/${id}`);
  };

  //   useEffect(() => {
  //   const token = localStorage.getItem('token');
  //   if(!token) {
  //     history.push('/login');
  //   }
  // }
  const token = localStorage.getItem("email");
  return (
    <div className="container">
      {houses.map((house, key) => (
        <>
          <div className="row mt-5 ">
            <div className="col-md-6">
              <img
                className="buyImg mt-5 mb-5"
                src={require(`../images/${house.g_img}`)}
                alt=""
              />
            </div>

            <div className="col-3">
              <h3 className="mt-5">Features</h3>
              <ul className="mt-3">
                <li className="pt-3">
                  AC: {house.h_ac === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">
                  Car Parking: {house.h_car_park === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">
                  TelePhone Facility:{" "}
                  {house.h_telephone === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">
                  Water Facility: {house.h_water === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">Rent Price: {house.h_price} PKR </li>
                <li className="pt-3">Rooms: {house.h_rooms}</li>
                <li className="pt-3">Floors: {house.h_floors}</li>
              </ul>
            </div>

            <div className="col-3 mt-5">
              <h3 className="mt-5"></h3>
              <ul>
                <li className="pt-3">Area: {house.h_area} SQFT</li>
                <li className="pt-3">
                  Balcony: {house.h_balcony === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">
                  Gas facility: {house.h_gas === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">
                  Electricity Facility:{" "}
                  {house.h_electricity === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">
                  Guest Room: {house.h_g_room === "1" ? " Yes" : " No"}
                </li>
                <li className="pt-3">Location: {house.loc_name}</li>
                <li className="pt-3">Address: {house.h_address}</li>
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
              ) : house.h_type === "1" ? (
                <button
                  type="submit"
                  className="btn btn-outline-primary px-3 "
                  onClick={() => getHouse(house.h_id)}
                >
                  Proceed to Booking
                </button>
              ) : (
                <button
                  type="submit"
                  className="btn btn-outline-primary px-3 "
                  onClick={() => getHouseSell(house.h_id)}
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

export default Housebuy;
