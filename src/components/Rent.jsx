import axios from "axios";
import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";

function Rent() {
  const [houses, setHouses] = useState([]);
  useEffect(() => {
    getHomes();
  }, []);

  function getHomes() {
    axios.get("http://localhost/FYP/api/rentHouse.php").then((res) => {
      setHouses(res.data);
    });
  }

  const [rooms, setRooms] = useState([]);
  useEffect(() => {
    getRooms();
  }, []);

  function getRooms() {
    axios.get("http://localhost/FYP/api/rentRooms.php").then((res) => {
      setRooms(res.data);
    });
  }

  const [flats, setFlats] = useState([]);
  useEffect(() => {
    getFlats();
  }, []);

  function getFlats() {
    axios.get("http://localhost/FYP/api/rentFlat.php").then((res) => {
      setFlats(res.data);
    });
  }

  const navigate = useNavigate();

  const getHouseInd = (id) => {
    navigate(`/housebuy/${id}`);
  };

  const getRoomsInd = (id) => {
    navigate(`/roomrent/${id}`);
  };

  const getFlatInd = (id) => {
    navigate(`/flatrent/${id}`);
  };
  return (
    <>
      <div className="container mt-5 mb-5">
        <h1 className="fw-bold">Rent Houses</h1>
      </div>
      <div className="container-sm d-flex mt-3">
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

                  <p>Location: {house.loc_name}</p>
                  <p>Price: {house.h_price} Pkr</p>

                  <div className="text-center">
                    <button
                      type="submit"
                      className="btn btn-outline-primary px-3  rounded-pill"
                      onClick={() => getHouseInd(house.h_id)}
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

      <br />
      <br />

      <div className="container mt-5 mb-5">
        <h1>Rent Rooms</h1>
      </div>

      <div className="container-sm d-flex mt-3 ">
        <div className="row">
          {rooms.map((room, key) => (
            <div className="col-md-4">
              <div
                className="card img-hover-zoom img-hover-zoom--brightness p-2"
                key={key}
              >
                <img
                  src={require(`../images/${room.g_img}`)}
                  className="card-img-top"
                  alt="House"
                />
                <div className="card-body">
                  <h5 className="card-title">Owner: {room.o_name}</h5>
                  <hr />

                  <p>Location: {room.loc_name}</p>
                  <p>Price: {room.r_price} Pkr</p>

                  <div className="text-center">
                    <button
                      type="submit"
                      className="btn btn-outline-primary px-3  rounded-pill"
                      onClick={() => getRoomsInd(room.r_id)}
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

      <div className="container mb-5" style={{ marginTop: "6%" }}>
        <h1>Rent Flats</h1>
      </div>

      <div className="container-sm d-flex mt-3">
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

export default Rent;
